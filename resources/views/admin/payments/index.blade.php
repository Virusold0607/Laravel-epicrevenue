@extends('admin.shared.layout')

@section('body')
    <b>Name color chart:</b><br />
    <i><font color="green">Green = Reached threshold</font></i><br />
    <i><font color="red">Red = Did not reach minimum</font></i><br /><br />
    {!! Form::open(array('url' => '/admin/payments', 'method' => 'post')) !!}
        <table class="table reports">
            <tr>
                <th>Select</th>
                <th>User ID</th>
                <th>Name</th>
                <th>Payment Method</th>
                <th>Payment Name/Email</th>
                <th>Payment Threshold</th>
                <th>Payment Amount</th>
                <th>Paid Amount</th>
                <th>Options</th>
            </tr>
            @if($users->isEmpty())
                <tr>
                    <td colspan="3" style="text-align:center;">There are no payments or earnings for your search.</td>
                </tr>
            @else
                @foreach($users as $u)
                    <?php
                        $cleared = $u->balance->histories()->operationOf('add')->cleared()->sum('amount') - $u->balance->histories()->operationOf('withdraw')->sum('amount');
                        if(is_null($u->paymentDetail))
                            $threshold = 50;
                        else
                            $threshold = $u->paymentDetail->threshold;
                    ?>
                    @if( $cleared >= $threshold )
                        <tr>
                            <td>
                                {!! Form::checkbox('users[]', $u->id) !!}
                            </td>
                            <td>{!! $u->id !!}</td>
                            <td>
                                <i><font color="@if($cleared <= (float) $threshold) red @else green @endif">
                                    {!! $u->firstname . ' ' . $u->lastname !!}
                                </font></i>
                            </td>
                            <td>{!! $u->paymentDetail->method !!}</td>
                            <td>{!! $u->paymentDetail->send_to !!}</td>
                            <td>{!! number_format($threshold, 2) !!}</td>
                            <td>$ {!! $cleared !!}</td>
                            <td>$ {!! $u->balance->histories()->operationOf('withdraw')->sum('amount') !!}</td>
                            <td><a href="{!! url( '/admin/#/publishers/edit/' . $u->id ) !!}" target="_blank">View Account</a></td>
                        </tr>
                    @endif
                @endforeach
            @endif
        </table><br />
    {!! Form::submit('Generate') !!}
@endsection