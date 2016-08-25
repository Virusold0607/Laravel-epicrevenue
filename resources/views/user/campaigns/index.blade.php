@extends('shared.layout')
@section('body')

    <div class="hero heading campaigns-page">
        <div class="container_12">
            @if(auth()->check())
                <h1 class="semibold hero_heading">Campaigns</h1>
                <p>Search this page for a campaign to promote on your account.</p>
            @else
                <div class="campaigns-join">
                    <div class="grid_8 h_grid_12">
                        <span class="title">Influencers Reach is the best way to monetize your social accounts</span>
                        <p>Find services, products, apps and more you think will appeal to your following and make money everytime you promote.</p>
                    </div>
                    <div class="grid_1">
                        <div style="display;block;width:1px;">&nbsp;</div>
                    </div>
                    <div class="grid_3 h_grid_12">
                        <a href="{{ url('/register') }}" class="bttn">Create your Free Account</a>
                        <span class="bttn-t">and get started in minutes</span>
                    </div>
                </div>
            @endif
        </div>
    </div>

    <div class="page wide">
        <div class="container_12">
        <!-- search -->
            <div class="grid_5 h_grid_12">
                {!! Form::open(array('url' => '/campaigns/', 'method' => 'get')) !!}
                    <div class="input-group" style="margin-bottom:5px;">
                          <input type="text" class="form-control" name="search" placeholder="Search... Ex product name">
                          <span class="input-group-btn">
                              <input class="btn btn-default" type="submit" value="Search" />
                          </span>
                    </div>
                {!! Form::close() !!}
            </div>

            <div class="grid_4 h_grid_12">
                {!! Form::open(array('url' => '/campaigns/', 'method' => 'get')) !!}
                    <div class="grid_9 alpha">
                        {!! Form::select('country', $countries, \Request::input('country'), array('id' => 'country', 'class' => 'dropdown form-control')) !!}
                    </div>
                    <div class="grid_3 alpha">
                        <input class="btn btn-default" type="submit" value="Sort" />
                    </div>
                {!! Form::close() !!}
            </div>

            <div class="campaigns-and-category">
                <div class="grid_3 h_grid_12">
                    <div class="category_panel_div">
                        <a href="{{ url('/campaigns/') }}"><div class="category_item_div @if($category_selected === 0) category_selected @endif">All categories <span class="num">{!! count(\App\Models\Campaign::active()->get()) !!}</span></div></a>
                        @foreach($categories as $category)
                            @if(count($category->campaigns()->active()->get()))
                                <a href="{{ url('/campaigns?category='.$category->id) }}"><div class="category_item_div @if($category_selected === $category->id) category_selected @endif">{{ $category->name }}<span class="num">{!! count($category->campaigns()->active()->get()) !!}</span></div></a>
                            @endif
                        @endforeach
                    </div>
                </div>
                <div class="grid_9 h_grid_12">
                    <div class="campaigns">
                        @if(is_null($campaigns))
                            <div class="alert alert-danger" role="alert">
                                <span class="glyphicon glyphicon-exclamation-sign" aria-hidden="true"></span>
                                <span class="sr-only">Error:</span>
                                No Campaigns Found!
                            </div>
                        @else
                            @if($campaigns->isEmpty())
                                <div class="alert alert-danger" role="alert">
                                    <span class="glyphicon glyphicon-exclamation-sign" aria-hidden="true"></span>
                                    <span class="sr-only">Error:</span>
                                    No Campaigns Found!
                                </div>
                            @endif
                            @foreach($campaigns as $campaign)
                                <div class="camp-box">
                                    <div class="grid_2 alpha">
                                        <img src="{{ url('/campaign/image/'. $campaign->id) }}" />
                                    </div>
                                    <div class="grid_10 alpha">
                                        <div class="camp-title">
                                            <a href="{{ url('/campaign/' . $campaign->id) }}">{{ $campaign->name }}</a>
                                        </div>
                                        <p>{{ $campaign->description }}</p>
                                    </div>
                                    @if(Auth::check())
                                        <div class="camp-info">
                                            <div class="grid_6" data-toggle="tooltip" data-placement="bottom" title="Amount you are paid for each valid conversion"><b>Payment?</b>${{ $campaign->rate }}<small>/per lead</small></div>
                                            <div class="grid_6"><a href="{{ url('/campaign/' . $campaign->id) }}" class="bttn">Promote Now</a></div>
                                        </div>
                                    @endif
                                </div>
                                <div class="grid_12">

                                </div>
                            @endforeach
                        @endif
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection