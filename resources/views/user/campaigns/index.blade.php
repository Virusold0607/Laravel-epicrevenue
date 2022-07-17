@extends('shared.layout')
@section('body')

<div class="hero py-4">
    <div class="container">
        @if(auth()->check())
            <h1 class="hero-heading fw-700">Campaigns</h1>
            <p class="hero-p">Search this page for a campaign to promote on your account.</p>
        @else
            <div class="campaigns-join row">
                <div class="col-sm-8">
                    <span class="title">Influencers Reach is the best way to monetize your social accounts</span>
                    <p>Find services, products, apps and more you think will appeal to your following and make money everytime you promote.</p>
                </div>
                <div class="col-sm-1">
                    <div style="display:block;width:1px;">&nbsp;</div>
                </div>
                <div class="col-sm-3">
                    <a href="{{ url('/register') }}" class="btn btn-primary">Create your Free Account</a>
                    <span class="bttn-t">and get started in minutes</span>
                </div>
            </div>
        @endif
    </div>
</div>


    <div class="page-container no-shadow no-border">
        <div class="container mobile-adjustment">
            <!-- search -->

            {!! Form::open(array('url' => '/campaigns/', 'method' => 'get')) !!}
            <div class="row">
                <div class="col-sm-4">
                    <div class="" style="margin-bottom:5px;">
                        <input type="text" class="form-control" name="search" placeholder="Search... Ex product name" value="{{ request()->input('search', '') }}">
                    </div>
                </div>

                <div class="col-sm-4">
                    <div class="">
                        {!! Form::select('country', $countries, request()->input('country'), array('id' => 'country', 'class' => 'dropdown form-control')) !!}
                    </div>
                </div>

                <div class="col-sm-4 campaign_categories_mobile">
                    <div class="">
                        {!! Form::select('category', $categories->pluck('name', 'id'), request()->input('category', 0), array('id' => 'category', 'class' => 'dropdown form-control')) !!}
                    </div>
                </div>

                <div class="col-xs-4">
                    <input class="btn btn-primary" type="submit" value="Sort" />
                </div>
            </div>
            {!! Form::close() !!}



            <div class="col-sm-12 row">
                <div class="col-md-3 col-sm-4 campaign_categories_desktop">
                    <div class="category_panel_div">
                        @foreach($categories as $category)
                            <a href="{{ url('/campaigns?category='.$category->id) }}">
                                <h4>
                                    <div class="category_item_div @if($category_selected === $category->id) category_selected @endif">{{ $category->name }}<span class="num">@if($category->id !== 0){!! $category->campaigns()->incentAndMobile(false)->active()->count() !!} @else {!! \App\Models\Campaign::incentAndMobile(false)->active()->count() !!}@endif</span>
                                    </div>
                                </h4>
                            </a>
                        @endforeach
                    </div>
                </div>
                <div class="col-md-9 col-sm-8" style="padding:0;">
                    <div class="campaigns">
                        @if(is_null($campaigns))
                            <div class="container" style="height: 20px; clear: both"></div>
                            <div class="alert alert-danger" role="alert">
                                <span class="glyphicon glyphicon-exclamation-sign" aria-hidden="true"></span>
                                <span class="sr-only">Error:</span>
                                No Campaigns Found!
                            </div>
                        @else
                            @if($campaigns->isEmpty())
                                <div class="container" style="height: 20px; clear: both"></div>
                                <div class="alert alert-danger" role="alert">
                                    <span class="glyphicon glyphicon-exclamation-sign" aria-hidden="true"></span>
                                    <span class="sr-only">Error:</span>
                                    No Campaigns Found!
                                </div>
                            @endif
                            @foreach($campaigns as $campaign)
                                <div class="camp-box row">
                                    <div class="col-sm-3">
                                        <img class="img-responsive" src="{{ url('/campaign/image/'. $campaign->id) }}" alt="{{ $campaign->name }}" />
                                    </div>
                                    <div class="col-sm-9">
                                        <h4 class="camp-title">
                                            <a href="{{ url('/campaign/' . $campaign->id) }}">{{ $campaign->name }}</a>
                                        </h4>
                                        <p>{{ $campaign->description }}</p>
                                    </div>
                                    <div class="clearfix"></div>
                                    @if(auth()->check())
                                        <hr>
                                        <div class="camp-info row">
                                            <h5 class="col-sm-6 pull-left text-left" data-toggle="tooltip" data-placement="bottom" title="Amount you are paid for each valid conversion"><b>Payment? </b>${{ $campaign->rate }}<small>/per lead</small></h5>
                                            <div class="col-sm-6 pull-right text-right"><a href="{{ url('/campaign/' . $campaign->id) }}" class="btn btn-primary btn-md">Promote Now</a></div>
                                        </div>
                                    @endif
                                </div>
                            @endforeach
                        @endif
                    </div>
                </div>
            </div>
        </div>
    </div>


@endsection
