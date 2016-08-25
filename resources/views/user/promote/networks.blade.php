@extends('shared.layout')

@section('body')
    <div class="hero small">
        <div class="container_12">
            <h1 class="semibold hero_heading">Become a Influencer</h1>
        </div>
    </div>
    <div class="page wide">
        <div class="container_12 regular">

            <form action="/networks" method="post" class="form-register networks">
                {{-- Was there an error? --}}
                @if (count($errors) > 0)
                    <div class="alert alert-danger">
                        <ul>
                            @foreach ($errors->all() as $error)
                                <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                    </div>
                @endif
                @if (isset($error))
                    <div class="alert alert-danger">
                        <ul>
                            @foreach ($error as $e)
                                <li>{!! $e !!}</li>
                            @endforeach
                        </ul>
                    </div>
                @endif
                <div class="grid_12">
                    <div class="panel panel-default networks">
                        <div class="panel-heading">Add Networks</div>
                        <div class="panel-body">
                            <div class="alert alert-info">Influencersreach does <b>NOT</b> collect any passwords associated with your social media accounts.</div>
                            <ul class="add-networks">
                                <li>
                                    @if(empty(session('instagram_name')))
                                        <a data-popup="true" class="network_tile instagram" href="{{ $instagram->getLoginUrl() }}">
                                            <span class="fa fa-instagram"></span>
                                            <span class="title">Instagram</span>
                                            <!--<span class="niche-icon size-25 add" data-gravity="s" data-offset="20" data-toggle="tooltip" original-title="Add another account?"></span>-->
                                        </a>
                                    @else
                                        <p>Connected as {{ session('instagram_name') }}</p>
                                    @endif
                                </li>
                                <li>
                                    <a data-popup="true" class="network_tile facebook disabled" href="#">
                                        <span class="fa fa-facebook"></span>
                                        <span class="title">Facebook</span>
                                        <!--<span class="niche-icon size-25 add" data-gravity="s" data-offset="20" data-toggle="tooltip" original-title="Add another account?"></span>-->
                                    </a>
                                </li>
                                <li>
                                    <a data-popup="true" class="network_tile twitter disabled" href="#">
                                        <span class="fa fa-twitter"></span>
                                        <span class="title">Twitter</span>
                                        <!--<span class="niche-icon size-25 add" data-gravity="s" data-offset="20" data-toggle="tooltip" original-title="Add another account?"></span>-->
                                    </a>
                                </li>
                                <li>
                                    <a data-popup="true" class="network_tile twitter disabled" href="#">
                                        <span class="fa fa-youtube"></span>
                                        <span class="title">Youtube</span>
                                        <!--<span class="niche-icon size-25 add" data-gravity="s" data-offset="20" data-toggle="tooltip" original-title="Add another account?"></span>-->
                                    </a>
                                </li>
                                <li>
                                    <a data-popup="true" class="network_tile twitter disabled" href="#">
                                        <span class="fa fa-tumblr"></span>
                                        <span class="title">Tumblr</span>
                                        <!--<span class="niche-icon size-25 add" data-gravity="s" data-offset="20" data-toggle="tooltip" original-title="Add another account?"></span>-->
                                    </a>
                                </li>
                                <li>
                                    <a data-popup="true" class="network_tile twitter disabled" href="#">
                                        <span class="fa fa-vine"></span>
                                        <span class="title">Vine</span>
                                        <!--<span class="niche-icon size-25 add" data-gravity="s" data-offset="20" data-toggle="tooltip" original-title="Add another account?"></span>-->
                                    </a>
                                </li>
                            </ul>
                        </div>
                    </div>
                    <hr>
                    {{--<a href="{{ url('/register/payment') }}" class="btn btn-default">Skip</a>--}}
                </div>
            </form>
        </div>
    </div>
@endsection