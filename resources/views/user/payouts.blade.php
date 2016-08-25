@extends('shared.layout')

@section('body')
    <div class="dash-stats">
        <div class="container_12">
            <div class="grid_3 h_grid_12">
                <div class="sbox">
                    <div class="title">Unpaid Earnings</div>
                    <div class="amount">$ {!! number_format($unpaid,2)  !!}</div>
                </div>
            </div>
            <div class="grid_3 h_grid_12">
                <div class="sbox">
                    <div class="title">Cleared for Payment</div>
                    <div class="amountg">$ {!! number_format(($cleared),2) !!}</div>
                </div>
            </div>
            <div class="grid_3 h_grid_12">
                <div class="sbox">
                    <div class="title">Paid Earnings</div>
                    <div class="amountg">$ {!! number_format(($paid),2) !!}</div>
                </div>
            </div>
            <div class="grid_3 h_grid_12">
                <div class="sbox">
                    <div class="title">Lifetime Earnings</div>
                    <div class="amount">$ {!! number_format($lifetime,2) !!}</div>
                </div>
            </div>
        </div>
    </div>


    <div class="page wide">
        <div class="container_12">
            @if(is_null($tax_details))
                <a href="{!! url('/taxdetails') !!}" class="text-danger"><div class="alert alert-danger" role="alert">Our records show you haven’t submitted your tax information, Please submit it in order to be paid.</div></a>
            @endif
            <div class="alert alert-info" role="alert"><strong>Heads up!</strong> Payments are sent out weekly to your selected payment method if the amount "CLEARED FOR PAYMENT" is above your set payment threshold.</div>
            <div class="grid_8 h_grid_12">
                <div class="panel panel-default">
                    <div class="panel-heading">Payouts</div>
                    <div class="panel-body">
                        <table class="table table-striped table-bordered">
                            <tr>
                                <th>Amount</th>
                                <th>Method</th>
                                <th>Date</th>
                            </tr>
                            @if(count($withdraws))
                                @foreach($withdraws as $w)
                                <tr>
                                    <td>{!! $w->amount !!}</td>
                                    <td>{!! $w->method !!}</td>
                                    <td>{!! $w->created_at !!}</td>
                                </tr>
                                @endforeach
                            @else
                                <tr>
                                    <td colspan="3">No payments have been sent to you yet, Keep promoting.</td>
                                </tr>
                            @endif
                        </table>
                    </div>
                </div>
            </div><!--end grid_8-->
            <div class="grid_4 h_grid_12">
                <div class="panel panel-default">
                    <div class="panel-heading">Update payment information</div>
                    <div class="panel-body">
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
                            <div class="form-group">
                                {!! Form::label('method', 'Payment Method') !!}
                                {!! Form::select('method', array('paypal' => 'PayPal', 'gift_card' => 'Gift Card', 'check' => 'Check'), null, array('class' => 'form-control')) !!}
                            </div>
                            <div class="form-group">
                                {!! Form::label('send_to', 'Pay to') !!}
                                {!! Form::text('send_to', null, array('class' => 'form-control')) !!}
                                <p class="help-block">PayPal email, Payee name, or BTC Address.</p>
                            </div>
                            <div class="form-group">
                                {!! Form::label('threshold', 'Payment Threshold') !!}
                                {!! Form::select('threshold', array(50 => '$50.00', 100 => '$100.00', 500 => '$500.00'), null, array('class' => 'form-control')) !!}
                            </div>
                            {!! Form::submit("Update payment info", array('class' => 'btn btn-default')) !!}
                        {!! Form::close() !!}
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection