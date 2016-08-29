@extends('shared.layout')

@section('body')

    <div class="hero hero-dashboard">
        <div class="container">
            <h1 class="hero-heading">Promoting</h1>
            <div class="row">
                <div class="col-sm-8 col-sm-offset-2">
                    <h4>Click an approved account to see the content available to promote on it.</h4>
                </div>
            </div>
            <div class="clearfix"></div>
        </div>
    </div>

    <div class="clearfix"></div>

    <div class="container">
        <div class="page-container">
            @if(Session::has('success'))
                <div class="alert alert-success">You have successfully added your Instagram account and it is now pending review.</div>
            @endif
            <div class="text">Below are all Social account(s) added to your account.</div>
            <hr>
            <div class="row">
                <?php $count = 1; ?>
                @foreach($accounts as $account)
                    <div class="col-sm-3">
                        <div class="container-fluid social-account-container">
                            <a href="{!! url('/promote', [$account->id]) !!}">
                                <h5>{!! $account->username !!}</h5>
                                <hr>
                                <div><img src="{!! $account->profile_picture !!}" /></div>
                            </a>
                        </div>
                    </div>
                    <?php $count++ ?>
                    @if(($count % 4) == 1)
                        <div class="clearfix"></div>
                    @endif
                @endforeach

                <div class="col-sm-3">
                    <div class="container-fluid social-account-container add-account">
                        <a href="{!! url('/networks') !!}">
                            <h5>Add Account</h5>
                            <hr>
                            <i class="fa fa-database" aria-hidden="true"></i>
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection