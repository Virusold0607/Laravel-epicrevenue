@extends('shared.layout')

@section('body')
    <div class="hero small">
        <div class="container">
            <h1 class="hero_heading">Become a Influencer</h1>
        </div>
    </div>
    <div class="page">
        <div class="container">
            <ul id='timeline'>
                <div id='timeline2' style="width:60%"></div>
                <li class='work'>
                    <input class='radio' id='work5' name='works' type='radio' checked>
                    <div class="relative">
                        <span class='date checked'>Account Details</span>
                        <span class='circle checked'>1</span>
                    </div>
                </li>
                <li class='work'>
                    <input class='radio' id='work4' name='works' type='radio'>
                    <div class="relative">
                        <span class='date checked'>Networks</span>
                        <span class='circle checked'>2</span>
                    </div>
                </li>
                <li class='work'>
                    <input class='radio' id='work3' name='works' type='radio'>
                    <div class="relative">
                        <span class='date'>Payment Method</span>
                        <span class='circle'>3</span>
                    </div>
                </li>
            </ul>

            <div class="page-container">
                <form action="/networks" method="post" class="form-register networks">

                    <div class="">
                        <h3>Add Networks</h3>
                        <p>Influencersreach does <b>NOT</b> collect any passwords associated with your social media accounts.</p>

                        <hr>

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
                    </div>

                    <div class="row">
                        <ul class="add-networks col-sm-10 col-sm-offset-1">
                            <li>
                                @if(empty(session('instagram_name')))
                                    <a id="instagram_btn" data-popup="true" class="network_tile instagram">
                                        <i class="fa fa-instagram"></i>
                                        <span class="title">Instagram</span>
                                        <!--<span class="niche-icon size-25 add" data-gravity="s" data-offset="20" data-toggle="tooltip" original-title="Add another account?"></span>-->
                                    </a>
                                @else
                                    <p>Connected as {{ session('instagram_name') }}</p>
                                @endif
                            </li>
                            <li>
                                <a id="facebook_btn" data-popup="true" class="network_tile facebook disabled" href="#">
                                    <i class="fa fa-facebook"></i>
                                    <span class="title">Facebook</span>
                                    <!--<span class="niche-icon size-25 add" data-gravity="s" data-offset="20" data-toggle="tooltip" original-title="Add another account?"></span>-->
                                </a>
                            </li>
                            <li>
                                <a id="twitter_btn" data-popup="true" class="network_tile twitter disabled" href="#">
                                    <i class="fa fa-twitter"></i>
                                    <span class="title">Twitter</span>
                                    <!--<span class="niche-icon size-25 add" data-gravity="s" data-offset="20" data-toggle="tooltip" original-title="Add another account?"></span>-->
                                </a>
                            </li>
                            <li>
                                <a data-popup="true" class="network_tile twitter disabled" href="#">
                                    <i class="fa fa-youtube"></i>
                                    <span class="title">Youtube</span>
                                    <!--<span class="niche-icon size-25 add" data-gravity="s" data-offset="20" data-toggle="tooltip" original-title="Add another account?"></span>-->
                                </a>
                            </li>
                            <li>
                                <a data-popup="true" class="network_tile twitter disabled" href="#">
                                    <i class="fa fa-tumblr"></i>
                                    <span class="title">Tumblr</span>
                                    <!--<span class="niche-icon size-25 add" data-gravity="s" data-offset="20" data-toggle="tooltip" original-title="Add another account?"></span>-->
                                </a>
                            </li>
                            <li>
                                <a data-popup="true" class="network_tile twitter disabled" href="#">
                                    <i class="fa fa-vine"></i>
                                    <span class="title">Vine</span>
                                    <!--<span class="niche-icon size-25 add" data-gravity="s" data-offset="20" data-toggle="tooltip" original-title="Add another account?"></span>-->
                                </a>
                            </li>
                        </ul>
                    </div>
                    <hr>
                    {{--<a href="{{ url('/register/payment') }}" class="btn btn-default">Skip</a>--}}
                </form>


                <div class="clearfix"></div>

                <div class="col-sm-10 col-sm-offset-1 col-md-8 col-md-offset-2" id="igPanel" style="display: none;">
                    <h3>Add Instagram Account</h3>
                    <p>Influencersreach does <b>NOT</b> collect any passwords associated with your social media accounts.</p>

                    <hr>
                    <p>Please set your BIO url to “http://reachurl.com/verify/ig/{!! auth()->user()->id !!}” and click verify so we can confirm account ownership, You may remove or change it back afterwards.</p>
                    <div class="form-stacked">
                        <div class="form-group">
                            {!! Form::text('ig_username', null, array('id' => 'ig_username','class' => 'form-control' ,'placeholder' => 'Instagram username')) !!}
                        </div>
                        <div class="form-group" style="margin-top: 10px;">
                            <button class="btn btn-primary" id ="instagram_verify">Verify</button>
                        </div>
                    </div>
                    <div id="ig_result"></div>
                </div>


                <div class="clearfix"></div>

                <div id="next" class="col-sm-10 col-sm-offset-1 col-md-8 col-md-offset-2" style="display: none;">
                    <a class="btn btn-primary pull-right" href="/register/payment">Next</a>
                </div>

                <div class="clearfix"></div>
            </div>
        </div>
    </div>
@endsection


@section('scripts')
    <script type="text/javascript">
        $(document).ready(function () {
            $('#instagram_btn').click(function () {
                console.log('click');
                $('#igPanel').slideDown('slow');
            });

            $('#instagram_verify').click(function(){
                $( "#ig_result" ).html( "Verifying..." );

                var username = $('#ig_username').val();
                console.log('username: '+username);
                $.post( "/register/networks/instagram/" + username , function( data )  {
                    if(data == 'success') {
                        $( "#ig_result" ).removeClass("alert alert-danger");
                        $( "#ig_result" ).addClass("alert alert-success");
                        $( "#ig_result" ).html( "Your instagram account("+ username +") is added and verified successfully." );
                        $('#next').slideDown('slow');
                    } else {
                        $( "#ig_result" ).removeClass("alert alert-success");
                        $( "#ig_result" ).addClass("alert alert-danger");
                        $( "#ig_result" ).html( "We are unable to verify your account " + username + "." );
                    }
                });

            });
        });
    </script>
@endsection