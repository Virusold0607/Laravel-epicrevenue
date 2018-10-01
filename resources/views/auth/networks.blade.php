@extends('shared.layout')

@section('body')
    <div class="main dashboard payouts">
        <div class="signup-bg">
            <div class="container">
                <div class="signup-content">
                    <h1 class="text-center">Apply to Epic Revenue</h1>
                    <div class="small-container sub-heading"><h2>REMINDERS</h2></div>
                    <div class="payment-steps">
                        <ul>
                            <li class="active">
                                <span class="payment-label">Account	Details</span>
                                <div class="graphic">
                                    <span>2</span>
                                    <i class="fa fa-check" aria-hidden="true"></i>
                                </div>
                            </li>
                            <li>
                                <div class="dots step1"><i class="fa fa-ellipsis-h" aria-hidden="true"></i></div>
                            </li>
                            <li class="active">
                                <span class="payment-label">Networks</span>
                                <div class="graphic">
                                    <span>2</span>
                                    <i class="fa fa-check" aria-hidden="true"></i>
                                </div>
                            </li>
                            <li>
                                <div class="dots step2"><i class="fa fa-ellipsis-h" aria-hidden="true"></i></div>
                            </li>
                            <li>
                                <span class="payment-label">Payment	Methods</span>
                                <div class="graphic">
                                    <span>3</span>
                                    <i class="fa fa-check" aria-hidden="true"></i>
                                </div>
                            </li>
                        </ul>
                    </div>
                    <div class="small-container add-networks">
                        <h2>ADD	NETWORKS</h2>

                        <div class="alert-box text-center">
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

                            <div class="alert-text text-left">
                                Heads up! Payments are sent out weekly to your selected payment method if the amount <br>"CLEARED FOR PAYMENT" is above your set payment threshold.
                            </div>

                        </div>

                        <div class="row">
                            <div class="col-sm-2 col-xs-6">
                                <div class="payments-box box-shadow2" id="instagram">
                                    <div id="instagram_btn" data-popup="true" class="payment-thumbnail @if(!empty(session('instagram_name')))selected @endif">
                                        <img src="/images/social-media1.png" />
                                        @if(!empty(session('instagram_name')))
                                            {{ session('instagram_name') }}
                                        @endif
                                    </div>
                                    {{--<p>Connected as {{ session('instagram_name') }}</p>--}}
                                </div>
                            </div>
                            <div class="col-sm-2 col-xs-6">
                                <div class="payments-box box-shadow2" id="facebook">
                                    <div class="payment-thumbnail">
                                        <img src="/images/social-media2.png" />
                                    </div>
                                </div>
                            </div>
                            <div class="col-sm-2 col-xs-6">
                                <div class="payments-box box-shadow2" id="twitter">
                                    <div class="payment-thumbnail">
                                        <img src="/images/social-media3.png" />
                                    </div>
                                </div>
                            </div>
                            <div class="col-sm-2 col-xs-6">
                                <div class="payments-box box-shadow2" id="youtube">
                                    <div class="payment-thumbnail">
                                        <img src="/images/social-media4.png" />
                                    </div>
                                </div>
                            </div>
                            <div class="col-sm-2 col-xs-6">
                                <div class="payments-box box-shadow2" id="tumblr">
                                    <div class="payment-thumbnail">
                                        <img src="/images/social-media5.png" />
                                    </div>
                                </div>
                            </div>
                            <div class="col-sm-2 col-xs-6">
                                <div class="payments-box box-shadow2" id="vibe">
                                    <div class="payment-thumbnail">
                                        <img src="/images/social-media6.png" />
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>


                    <div class="setting-form singup-section" id="notAvailable" style="display: none;">
                        <div class="netwrok-action">
                            <div class="alert alert-info">
                                This option is not available yet. We are working on it.
                            </div>
                        </div>
                    </div>

                    <div class="setting-form singup-section" id="igPanel" style="display: none;">
                        <div class="netwrok-action">
                            <div class="row">
                                <div class="col-sm-12">

                                    <h2>ADD	INSTAGRAM	ACCOUNT</h2>
                                    <p>Please	set	your	BIO	url	to <a href="http://reachurl.com/verify/ig/{{ auth()->id() }}">http://reachurl.com/verify/ig/{{ auth()->id() }}</a> and	click	verify	so we	can	confirm	account	ownership,	You	may	remove	or	change	it	back	afterwards.</p>
                                    <div class="input-text">
                                        {!! Form::text('ig_username', null, array('id' => 'ig_username','class' => '' ,'placeholder' => 'Instagram username')) !!}
                                    </div>
                                </div>

                                <div class="col-sm-12 text-center">
                                    <a class="btn default-btn black-button small-round font-large" id ="instagram_verify" href="#next">VERIFY</a>
                                </div>

                                <div id="ig_result"></div>
                            </div>
                        </div>
                    </div>

                    <div class="col-sm-12 text-right" id ="next" style="display: none;">
                        <a href="/influencers/apply/payment" class="btn default-btn black-button small-round font-large">NEXT</a>
                    </div>

                </div>
            </div>
        </div>
    </div>
@endsection

@section('scripts')
    <script type="text/javascript">
        $(document).ready(function () {
            $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                }
            });

            $('#instagram').click(function(){
                $('#instagram').removeClass('selected');
                $('#facebook').removeClass('selected');
                $('#twitter').removeClass('selected');
                $('#youtube').removeClass('selected');
                $('#tumblr').removeClass('selected');
                $('#vibe').removeClass('selected');

                $('#instagram').addClass('selected');
                $('#igPanel').slideDown('slow');
                $('#notAvailable').slideUp('slow');
            });
            $('#facebook').click(function(){
                $('#instagram').removeClass('selected');
                $('#facebook').removeClass('selected');
                $('#twitter').removeClass('selected');
                $('#youtube').removeClass('selected');
                $('#tumblr').removeClass('selected');
                $('#vibe').removeClass('selected');

                $('#facebook').addClass('selected');
                $('#igPanel').slideUp('slow');
                $('#notAvailable').slideDown('slow');
            });
            $('#twitter').click(function(){
                $('#instagram').removeClass('selected');
                $('#facebook').removeClass('selected');
                $('#twitter').removeClass('selected');
                $('#youtube').removeClass('selected');
                $('#tumblr').removeClass('selected');
                $('#vibe').removeClass('selected');

                $('#twitter').addClass('selected');
                $('#igPanel').slideUp('slow');
                $('#notAvailable').slideDown('slow');
            });
            $('#youtube').click(function(){
                $('#instagram').removeClass('selected');
                $('#facebook').removeClass('selected');
                $('#twitter').removeClass('selected');
                $('#youtube').removeClass('selected');
                $('#tumblr').removeClass('selected');
                $('#vibe').removeClass('selected');

                $('#youtube').addClass('selected');
                $('#igPanel').slideUp('slow');
                $('#notAvailable').slideDown('slow');
            });
            $('#tumblr').click(function(){
                $('#instagram').removeClass('selected');
                $('#facebook').removeClass('selected');
                $('#twitter').removeClass('selected');
                $('#youtube').removeClass('selected');
                $('#tumblr').removeClass('selected');
                $('#vibe').removeClass('selected');

                $('#tumblr').addClass('selected');
                $('#igPanel').slideUp('slow');
                $('#notAvailable').slideDown('slow');
            });
            $('#vibe').click(function(){
                $('#instagram').removeClass('selected');
                $('#facebook').removeClass('selected');
                $('#twitter').removeClass('selected');
                $('#youtube').removeClass('selected');
                $('#tumblr').removeClass('selected');
                $('#vibe').removeClass('selected');

                $('#vibe').addClass('selected');
                $('#igPanel').slideUp('slow');
                $('#notAvailable').slideDown('slow');
            });


            $('#instagram_verify').click(function(){
                $( "#ig_result" ).html( "Verifying..." );

                var username = $('#ig_username').val();
                $.post( "/influencers/apply/networks/instagram/" + username , function( data )  {
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