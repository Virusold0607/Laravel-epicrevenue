@extends('shared.layout')

@section('body')
    <div class="main dashboard payouts">
        <div class="gray-background">
            <div class="container">
                <div class="dashboard-statistics small-container desktop-display">
                    <div class="row">
                        <div class="col-md-3 col-sm-6">
                            <div class="dashboard-box box-shadow">
                                <span>UNPAID CLICKS </br>EARNINGS</span>
                                <strong>${!! number_format($unpaid,2)  !!}</strong>
                            </div>
                        </div>
                        <div class="col-md-3 col-sm-6">
                            <div class="dashboard-box box-shadow">
                                <span>CLEARED FOR </br>PAYMENT</span>
                                <strong>${!! number_format(($cleared),2) !!}</strong>
                            </div>
                        </div>
                        <div class="col-md-3 col-sm-6">
                            <div class="dashboard-box box-shadow">
                                <span>PAID </br>EARNING</span>
                                <strong>${!! number_format(($paid),2) !!}</strong>
                            </div>
                        </div>
                        <div class="col-md-3 col-sm-6">
                            <div class="dashboard-box box-shadow">
                                <span>LIFETIME </br>EARNINGS</span>
                                <strong>${!! number_format($lifetime,2) !!}</strong>
                            </div>
                        </div>


                    </div>
                </div>

                <div class="dashboard-statistics mobile-only">

                    <div class="dashboard-slider">
                        <div class="dashboard-slider-items">
                            <div class="dashboard-box box-shadow">
                                <span>UNPAID CLICKS </br>EARNINGS</span>
                                <strong>${!! number_format($unpaid,2)  !!}</strong>
                            </div>
                        </div>
                        <div class="dashboard-slider-items">
                            <div class="dashboard-box box-shadow">
                                <span>CLEARED FOR </br>PAYMENT</span>
                                <strong>${!! number_format(($cleared),2) !!}</strong>
                            </div>
                        </div>
                        <div class="dashboard-slider-items">
                            <div class="dashboard-box box-shadow">
                                <span>PAID </br>EARNING</span>
                                <strong>${!! number_format(($paid),2) !!}</strong>
                            </div>
                        </div>
                        <div class="dashboard-slider-items">
                            <div class="dashboard-box box-shadow">
                                <span>LIFETIME </br>EARNINGS</span>
                                <strong>${!! number_format($lifetime,2) !!}</strong>
                            </div>
                        </div>


                    </div>
                </div>
            </div>
            <div class="white-background">
                <div class="container">
                    <div class="small-container default-padding">
                        <div class="alert-box">
                            @if(is_null($tax_details))
                            <div class="alert alert-danger">
                                <ul>
                                    <li><a href="{!! url('/taxdetails') !!}" style="color: #fff;">Our records show you haven’t submitted your tax information, Please submit it in order to be paid.</a></li>
                                </ul>
                            </div>
                            @endif
                            <div class="alert-text">
                                Heads up! Payments are sent out weekly to your selected payment method if the amount </br>"CLEARED FOR PAYMENT" is above your set payment threshold.
                            </div>

                        </div>
                    </div>
                </div>
            </div>
            <div class="container">
                <div class="payout-table">
                    <div class="small-container">
                        <h3 class="table-title">PAYOUTS</h3>
                    </div>
                    <div class="box-shadow">
                        @if(count($withdraws) >0)
                            <div class="table-responsive">
                                <table class="table">
                                    <thead>
                                    <tr>
                                        <th class="empty-cell"></th>
                                        <th>AMOUNT</th>
                                        <th>METHOD</th>
                                        <th>DATE	JOINED</th>
                                    </tr>
                                    </thead>
                                    <tbody>
                                    @foreach($withdraws as $w)
                                        <tr>
                                            <td><span>.</span></td>
                                            <td>{!! $w->amount !!}</td>
                                            <td>{!! $w->method !!}</td>
                                            <td>{!! $w->created_at !!}</td>
                                        </tr>
                                    @endforeach
                                    </tbody>
                                </table>
                            </div>
                        @else
                            <div class="alert alert-danger">No payments have been sent to you yet, Keep promoting.</div>
                        @endif
                    </div>
                </div>

                <div class="payment-method small-form-container box-shadow">
                    <div class="payment-method-content">
                        {{--Was there an error?--}}
                        @if(count($errors))
                            @foreach ($errors->all() as $error)
                                <div class="notification-error">{!! $error !!}</div><br />
                            @endforeach
                        @elseif (isset($success))
                            <div class="notification-notice">{{ $success }}</div><br />
                        @endif
                        {!! Form::model(\App\Models\PaymentDetail::where('user_id', \Illuminate\Support\Facades\Auth::user()->id)->first(),
                        array('url' => 'payouts', 'method' => 'post')) !!}
                        <ul class="form-style">
                            <li>
                                {!! Form::label('method', 'Payment Method') !!}
                                <div class="custom-select">
                                    {!! Form::select('method', array('paypal' => 'PayPal', 'gift_card' => 'Gift Card', 'check' => 'Check'), null, array('class' => '')) !!}
                                    <span><i class="fa fa-angle-down"></i></span>
                                </div>
                            </li>
                            <li>
                                {!! Form::label('send_to', 'Pay to') !!}
                                <div class="custom-select">
                                    {!! Form::text('send_to', null, array('class' => '')) !!}
                                </div>
                            </li>
                            <li>
                                {!! Form::label('threshold', 'Payment Threshold') !!}
                                <div class="custom-select">
                                    {!! Form::select('threshold', array(50 => '$50.00', 100 => '$100.00', 500 => '$500.00'), null, array('class' => 'form-control')) !!}
                                    <span><i class="fa fa-angle-down"></i></span>
                                </div>
                            </li>
                            <li class="action-button">
                                {!! Form::submit("UPDATE INFO", array('class' => 'btn default-btn black-button small-round')) !!}
                            </li>
                        </ul>
                        {!! Form::close() !!}
                    </div>
                </div>

            </div>
        </div>
    </div>

@endsection