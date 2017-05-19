@extends('shared.layout')

@section('body')

    <div class="main dashboard payouts">
        <div class="signup-bg">
            <div class="container">
                <div class="signup-content">
                    <h1 class="text-center">Apply	to	InfluencersReach</h1>

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
                    <div class="small-container">
                        <h2>ADD	PAYMENT	METHODS</h2>
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
                            @if (isset($middleware_error))
                                <div class="alert alert-danger">
                                    <ul>
                                        <li>{!! $middleware_error !!}</li>
                                    </ul>
                                </div>
                            @endif

                            <div class="row">
                                <div class="col-sm-4">
                                    <div class="payments-box box-shadow2" id="giftBox">
                                        <div class="payment-thumbnail">
                                            <img src="/images/payment-options1.png" />
                                        </div>
                                        <span>GIFT	CARDS</span>
                                    </div>
                                </div>
                                <div class="col-sm-4">
                                    <div class="payments-box box-shadow2 selected" id="paypalBox">
                                        <div class="payment-thumbnail">
                                            <img src="/images/payment-options2.png" />
                                        </div>
                                        <span>PAY	WITH	PAYPAL</span>
                                    </div>
                                </div>
                                <div class="col-sm-4">
                                    <div class="payments-box box-shadow2" id="checkBox">
                                        <div class="payment-thumbnail">
                                            <img src="/images/payment-options3.png" />
                                        </div>
                                        <span>CHEQUE</span>
                                    </div>
                                </div>
                            </div>
                    </div>

                    <div class="signup-small-container small-container payments-box-terms">
                        <h2 id="description_txt">Please type in your Paypal email</h2>

                        {!! Form::open(array('url' => '/influencers/apply/payment', 'method' => 'post', 'class' => 'form-register')) !!}

                        <input type="hidden" name="payment_method" id="payment_method" value="" />

                        <ul class="signup-form">
                            <li class="input-text">
                                {!! Form::text('payment_method_detail') !!}
                            </li>
                            {{--<li>--}}
                                {{--<div class="terms">--}}
                                    {{--Lorem	ipsum	dolor	sit	amet,	consectetur	adipiscing	elit.	Vestibulum	id	semper	mi.	Donec	tincidunt	lectus	id	nisi	maximus,	quis	cursus	orci	mattis.	Ut	sollicitudin	dui	eget	nulla	semper,	sit	amet	commodo	nunc	maximus.	Cras	fermentum	ipsum	sit	amet	commodo	nunc	maximus.	Cras	fermentum	ipsum	ut	mi	accumsan.--}}
                                {{--</div>--}}
                            {{--</li>--}}

                            <li class="text-center">
                                <button type="submit" class="btn default-btn black-button small-round font-large">SUBMIT</button>
                            </li>

                        </ul>

                        {!! Form::close() !!}
                    </div>
                </div>
            </div>
        </div>
    </div>

@endsection

@section('scripts')
    <script>
        function updateDetails(str) {
//            str = $('input[name=payment_method]:checked', '#pay_option_panel').val();
            //myele = $('input[name=payment_method_detail]');
            myele = $('#description_txt');
            if (str=="paypal")
            {
                myele.html("Please type in your Paypal email");
            }
            else if (str=="check")
            {
                myele.html("Name check should be written to?");
            }
            else if (str=="gift_card")
            {
                myele.html("Which brand Gift Card do you want?");
            }
            else if (str=="bitcoins")
            {
                myele.html("Enter your Bitcoins Address");
            }
            else
            {
                myele.html("Please type in your address");
            }


        }

        $(document).ready(function () {
            $('img').click(function(){
                //$('input:radio[name=payment_method]').attr("checked", false);
                $(this).prev().click();
            });

            $('#checkBox').click(function(){
                $('#checkBox').removeClass('selected');
                $('#paypalBox').removeClass('selected');
                $('#giftBox').removeClass('selected');

                $('#payment_method').val("check");
                $('#checkBox').addClass('selected');
                updateDetails('check');
            });
            $('#paypalBox').click(function(){
                $('#checkBox').removeClass('selected');
                $('#paypalBox').removeClass('selected');
                $('#giftBox').removeClass('selected');

                $('#payment_method').val("paypal");
                $('#paypalBox').addClass('selected');
                updateDetails('paypal');
            });
            $('#giftBox').click(function(){
                $('#checkBox').removeClass('selected');
                $('#paypalBox').removeClass('selected');
                $('#giftBox').removeClass('selected');

                $('#payment_method').val("gift_card");
                $('#giftBox').addClass('selected');
                updateDetails('gift_card');
            });
        });

        $('#pay_option_panel input').on('change', function() {
            updateDetails();
        });
    </script>
@endsection