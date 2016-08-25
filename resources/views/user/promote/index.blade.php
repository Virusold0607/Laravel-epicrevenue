@extends('shared.layout')

@section('body')
    <div class="hero heading promote-page">
        <div class="container_12">
            <h1 class="semibold hero_heading">Promoting</h1>
            <p>Click an approved account to see the content available to promote on it.</p> 
        </div>
    </div>
  
    <div class="page">
        <div class="container_12">
            <div class="panel panel-default">
                <div class="panel-body">
                @if(Session::has('success'))
                    <div class="alert alert-success">You have successfully added your Instagram account and it is now pending review.</div>
                @endif
                    <div class="alert alert-info">Below are all Instagram account(s) added to your account.</div><br />
                    @foreach($accounts as $account)
                        <div class="grid_3 h_grid_12">
                            <a class="tool-i" href="{!! url('/promote', [$account->id]) !!}">
                                <div class="tool-i-title">{!! $account->username !!}</div>
                                <div class="ig-profile"><img src="{!! $account->profile_picture !!}" /></div>
                            </a>
                        </div>
                    @endforeach
                    <div class="grid_2 h_grid_6">
                        <a class="tool-i" href="{!! url('/networks') !!}">
                            <div class="glyphicon glyphicon-user"></div>
                            <div class="tool-i-titl">Add IG Account</div>
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection