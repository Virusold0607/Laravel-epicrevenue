@extends('shared.layout')

@section('body')

    <div class="hero hero-dashboard">
        <div class="container">
            <h1 class="hero-heading">Promoting</h1>
                <p class="hero-p">
                    Click an approved account to see the content advertisers have submitted for you to promote.
                </p>
            <div class="clearfix"></div>
        </div>
    </div>

    <div class="clearfix"></div>

    <div class="page-container no-border">
        <div class="container">
            @if(session()->has('success'))
                <div class="alert alert-success">You have successfully added your Social account and it is now pending review.</div>
            @endif
            <h4 class="text">We allow advertisers to offer specific content to promote per account select one to see whats available.</h4>
            <hr>
            <div class="row">
                <?php $count = 1; ?>
                @foreach($accounts as $account)
                    <div class="col-sm-3">
                        <a class="thumbnail" href="{!! url('/promotions', [$account->id]) !!}">
                            <img class="img-responsive" src="{!! $account->profile_picture !!}" alt="{!! $account->username !!}">
                            <div class="caption">
                                <h3>{!! $account->username !!}</h3>
                                {{--<p><a href="#" class="btn btn-primary" role="button">Button</a> <a href="#" class="btn btn-default" role="button">Button</a></p>--}}
                            </div>
                        </a>

                        {{--<div class="container-fluid social-account-container">--}}
                            {{--<a href="{!! url('/promotions', [$account->id]) !!}">--}}
                                {{--<h5>{!! $account->username !!}</h5>--}}
                                {{--<hr>--}}
                                {{--<div><img src="{!! $account->profile_picture !!}" /></div>--}}
                            {{--</a>--}}
                        {{--</div>--}}
                    </div>
                    <?php $count++ ?>
                    @if(($count % 4) == 1)
                        <div class="clearfix"></div>
                    @endif
                @endforeach

                <div class="col-sm-3">
                    <a class="thumbnail text-center" href="{!! url('/promotions', [$account->id]) !!}">
                        <i class="fa fa-database" aria-hidden="true" style="font-size: 100px; padding: 10px;"></i>
{{--                        <img class="img-responsive" src="{!! $account->profile_picture !!}" alt="Add Account">--}}
                        <div class="caption">
                            <hr>
                            <h3>Add Account</h3>
                            {{--<p><a href="#" class="btn btn-primary" role="button">Button</a> <a href="#" class="btn btn-default" role="button">Button</a></p>--}}
                        </div>
                    </a>
                    {{--<div class="container-fluid social-account-container add-account">--}}
                        {{--<a href="{!! url('/networks') !!}">--}}
                            {{--<h5>Add Account</h5>--}}
                            {{--<hr>--}}
                            {{--<i class="fa fa-database" aria-hidden="true"></i>--}}
                        {{--</a>--}}
                    {{--</div>--}}
                </div>
            </div>
        </div>
    </div>
@endsection