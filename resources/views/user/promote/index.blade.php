@extends('shared.layout')

@section('body')
    <div class="hero hero-dashboard">
        <div class="container">
            <h1 class="hero-heading">Promote Page</h1>
                <p class="hero-p">
                    Select One option
                </p>
            <div class="clearfix"></div>
        </div>
    </div>

    <div class="clearfix"></div>

    <div class="page-container no-border">
        <div class="container" style="margin-top: 20px;">
            <div class="row">
                <div class="col-sm-3">
                    <a class="thumbnail text-center" href="{!! url('/promotions') !!}">
                        <i class="fa fa-user-secret" aria-hidden="true" style="font-size: 100px; padding: 10px;"></i>
                        {{--                        <img class="img-responsive" src="{!! $account->profile_picture !!}" alt="Add Account">--}}
                        <div class="caption">
                            <hr>
                            <h3>Promotions</h3>
                        </div>
                    </a>
                </div>
                <div class="col-sm-3">
                    <a class="thumbnail text-center" href="{!! url('/campaigns') !!}">
                        <i class="fa fa-area-chart" aria-hidden="true" style="font-size: 100px; padding: 10px;"></i>
                        {{--                        <img class="img-responsive" src="{!! $account->profile_picture !!}" alt="Add Account">--}}
                        <div class="caption">
                            <hr>
                            <h3>Campaigns</h3>
                        </div>
                    </a>
                </div>
            </div>
        </div>
    </div>
@endsection