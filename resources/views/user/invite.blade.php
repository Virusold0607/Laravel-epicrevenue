@extends('shared.layout')

@section('body')

  
<div class="hero hero-dashboard py-6">
    <div class="container">
        <div class="row">
            <div class="col-lg-3 col-md-4 col-sm-6 col-xs-6 col-6">
                <div class="card">
                    <div class="card-body">
                        <h3 class="card-subtitle">Active Referrals</h3>
                        <h2 class="card-title text-inherit">{!! $active !!}</h2>
                    </div>
                </div>
            </div>
            <div class="col-lg-3 col-md-4 col-sm-6 col-xs-6 col-6">
                <div class="card">
                    <div class="card-body">
                        <h3 class="card-subtitle">Earned from Referrals</h3>
                        <h2 class="card-title text-inherit">${!! number_format( $earn , 2 ) !!}</h2>
                    </div>
                </div>
            </div>
            <div class="col-lg-3 col-md-4 col-sm-6 col-xs-6 col-6">
                <div class="card">
                    <div class="card-body">
                        <h3 class="card-subtitle">Inactive Referrals</h3>
                        <h2 class="card-title text-inherit">{!! $inactive !!}</h2>
                    </div>
                </div>
            </div>
            <div class="col-lg-3 col-md-4 col-sm-6 col-xs-6 col-6">
                <div class="card">
                    <div class="card-body">
                        <h3 class="card-subtitle">Total Referrals</h3>
                        <h2 class="card-title text-inherit">{!! $inactive + $active !!}</h2>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<div class="page-container py-6">
    <div class="container">
        <p>For every user you refer you earn 5% off every lead they get, this is a real great way to get your friends or others invloved while earning money when they join. Below you can find your referral link and a list of all the users you refered.</p>

        <div class="form-custom mb-2">
            <h3>Your referral link: </h3>
            <input class="form-control" value="{!! url('/invite/' . auth()->user()->id) !!}"  />
        </div>
        <div class="card">
            <div class="card-body">
                <table class="table table-striped table-bordered table-hover table-responsive mb-0">
                    <thead>
                    <tr>
                        <th>ID</th>
                        <!--<th>Email</th>-->
                        <th>Date Joined</th>
                    </tr>
                    </thead>
                    <tbody>
                    @if(count($referrals) >0)
                        @foreach($referrals as $r)
                            <tr>
                                <td>{!! $r->id !!} </td>
                                <!--<td>'.$row->email_address.'</td>-->
                                <td>{!! $r->created_at !!}</td>
                            </tr>
                        @endforeach
                    @else
                        <tr>
                            <td colspan="2">You have no referrals.</td>
                        </tr>
                    @endif
                    </tbody>
                </table>
            </div>
        </div><!-- end .card -->

    </div>
</div>

@endsection
