@extends('shared.layout')

@section('body')
    <div class="hero small">
        <div class="container">
            <h1 class="hero-heading">Become an Influencer</h1>
        </div>
    </div>

    <div class="page wide">
        <div class="container">

            <ul id='timeline'>
                <div id='timeline2' style="width:90%"></div>
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
                        <span class='date checked'>Payment Method</span>
                        <span class='circle checked'>3</span>
                    </div>
                </li>
            </ul>
            <div class="col-sm-10 col-sm-offset-1 col-md-8 col-md-offset-2">
                {!! Form::open(array('url' => '/influencers/apply/payment', 'method' => 'post', 'class' => 'form-register')) !!}
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
                    <div class="panel panel-default networks">
                        <div class="panel-heading">How do you want to be paid?</div>
                        <div class="panel-body">
                            <div class="">
                                <div id="pay_option_panel">
                                    <div class="pay_option_div">
                                        {!! Form::radio('payment_method', 'paypal') !!}
                                        <img src="{{ url('/images/register/paypal.png') }}" alt="Paypal" class="pay_option_img"> Paypal
                                    </div>
                                    <div class="pay_option_div">
                                        {!! Form::radio('payment_method', 'check') !!}
                                        <img src="{{ url('/images/register/cheque-icon.png') }}" alt="Cheque" class="pay_option_img"> Check
                                    </div>
                                    <div class="pay_option_div">
                                        {!! Form::radio('payment_method', 'gift_card') !!}
                                        <img src="{{ url('/images/register/gift-card.jpg') }}" alt="Gift Card" class="pay_option_img"> Gift Card
                                    </div>
                                </div>
                                <span id="description_txt">Details</span><span style="color: red">*</span>
                                <br />
                                {!! Form::text('payment_method_detail', null, array('class' => 'form-control', 'maxlength' => '255')) !!}
                                <br />
                            </div>
                        </div>
                    </div>
                    <div class="grid_12">
                        {!! Form::submit('Submit', array('class' => 'btn btn-primary btn-lg pull-right')) !!}
                    </div>
                {!! Form::close() !!}
            </div>
        </div>
    </div>
@endsection

@section('scripts')
    <script>
        function updateDetails() {
            str = $('input[name=payment_method]:checked', '#pay_option_panel').val();
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
        });

        $('#pay_option_panel input').on('change', function() {
            updateDetails();
        });
    </script>
@endsection