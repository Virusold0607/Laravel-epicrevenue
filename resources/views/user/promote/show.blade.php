@extends('shared.layout')

@section('body')
    <div class="hero heading promote-page">
        <div class="container_12">
            <h1 class="semibold promote">
                @<span class="upper">{!! $account->username !!}</span>
                Total Reach <span class="highlight">{!! number_format($account->followed_by) !!} </span>
            </h1>
            <p>Available below are graphics and text provided by us or our Advertisers for you to promote on this account.</p>
        </div>
    </div>
    <div class="page">
        <div class="container_12">
            <div class="panel panel-default">
                <div class="panel-heading">
                    <h3 class="panel-title">Available Promotions</h3>
                </div>
                <div class="panel-body">
                    <div class="alert alert-info">Unsure of how to post promo?
                        <a target="_blank" href="http://blog.influencersreach.com/2015/07/27/how-to-post-a-promo-from-mobile-device/">
                            Click here to view this tutorial.
                        </a>
                    </div>
                    @if(count($promotions) > 0)
                        @foreach($promotions as $p)
                            <div class="grid_3 h_grid_12">
                                <div class="ig-post" style="text-align:left;">
                                    {!! Html::image('/promote/image/' . $p->id, 'picture')!!}
                                    <div class="ig-post-title"><b>BIO url:</b>
                                        <?php
                                            $url = $p->url;
                                            if( str_contains($url, '{pubid}') )
                                                $url = str_replace("{pubid}", auth()->user()->id, $url);
                                        ?>
                                        <input onClick="this.setSelectionRange(0, this.value.length)" class="form-control" type="text" value="{!! $url !!}" />
                                    </div>
                                    <div class="ig-post-title"><b>Optional Caption:</b>
                                        <textarea onClick="this.setSelectionRange(0, this.value.length)" class="form-control" rows="4" id="comment">{!! $p->description !!}</textarea>
                                    </div>
                                </div>
                            </div>
                        @endforeach
                    @else
                        <div class="alert alert-danger">There is no content available to post on this account yet.</div>
                    @endif
                </div>
            </div>
        </div>
    </div>
@endsection