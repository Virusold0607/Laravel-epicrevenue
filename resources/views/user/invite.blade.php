@extends('shared.layout')

@section('body')

    <div class="hero hero-dashboard">
        <div class="container">
            <div class="hero-stats">
                <div class="hero-stat">
                    <h3>{!! $active !!}</h3>
                    <h5 class="font-dark-gray">Active Referrals</h5>
                </div>
                <div class="hero-stat-border"></div>
                <div class="hero-stat">
                    <h3>${!! number_format( $earn , 2 ) !!}</h3>
                    <h5 class="font-dark-gray">Earned from Referrals</h5>
                </div>
                <div class="hero-stat-border"></div>
                <div class="hero-stat">
                    <h3>{!! $inactive !!}</h3>
                    <h5 class="font-dark-gray">Inactive Referrals</h5>
                </div>
            </div>
        </div>
    </div>
    <div class="clearfix"></div>
    <div class="page-container no-shadow">
        <div class="container">
            <div class="text">For every user you refer you earn 5% off every lead they get, this is a real great way to get your friends or others invloved while earning money when they join. Below you can find your referral link and a list of all the users you refered.</div>
            <hr>
            <div class="container" style="height: 15px;"></div>

            <div class="form-custom">
                <h3>Your referral link: </h3>
                <input class="form-control" value="{!! url('/invite/' . auth()->user()->id) !!}" style="width: 600px; " />
            </div>
            <br /><br />
            <div class="table-responsive">
                <table class="table table-striped table-bordered table-hover">
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
            </div><!-- end .table-responsive -->

        </div>
    </div>

    <div class="container">
        <hr>
    </div>

@endsection