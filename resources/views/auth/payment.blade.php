@extends('shared.layout')

@section('body')
    <div class="hero hero-transparent">
        <div class="container">
            <h1 class="hero-heading">Become a Influencer</h1>
        </div>
    </div><!-- End .hero -->
    <div class="clearfix"></div>
    <div class="container" style="height:60px;"></div>

    <div class="page wide">
        <div class="">

        </div>
        <div class="container">
                <div class="row" id="timeline">
                    <div class="col-xs-4">
                        <h4 class="text-center" style="height: 40px;">Account Details</h4>
                        <div>
                            <img src="/images/register/tick.png" alt="Step 1" style="margin: 0 auto; display: block;">
                        </div>
                    </div>
                    <div class="col-xs-4">
                        <h4 class="text-center" style="height: 40px;">Networks</h4>
                        <div>
                            <img src="/images/register/tick.png" alt="Step 2" style="margin: 0 auto; display: block;">
                        </div>
                    </div>
                    <div class="col-xs-4">
                        <h4 class="text-center" style="height: 40px;">Payment Methods</h4>
                        <div>
                            <img src="/images/register/3.png" alt="Step 3" style="margin: 0 auto; display: block;">
                        </div>
                    </div>
                </div>
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
                                        <img src="{{ url('/images/register/paypal.png') }}" alt="Paypal" class="pay_option_img img-responsive"> Paypal
                                    </div>
                                    <div class="pay_option_div">
                                        {!! Form::radio('payment_method', 'check') !!}
                                        <img src="{{ url('/images/register/cheque-icon.png') }}" alt="Cheque" class="pay_option_img img-responsive"> Check
                                    </div>
                                    <div class="pay_option_div">
                                        {!! Form::radio('payment_method', 'gift_card') !!}
                                        <img src="{{ url('/images/register/gift-card.jpg') }}" alt="Gift Card" class="pay_option_img "> Gift Card
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