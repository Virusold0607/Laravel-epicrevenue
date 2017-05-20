@extends('shared.layout')

@section('body')

    <div class="main dashboard payouts">
        <div class="gray-background">
            <div class="container">
                <div class="dashboard-statistics small-container desktop-display">
                    <div class="row">
                        <div class="col-md-3 col-sm-6">
                            <div class="dashboard-box box-shadow">
                                <span>ACTIVE </br>REFERRALS</span>
                                <strong>{!! $active !!}</strong>
                            </div>
                        </div>
                        <div class="col-md-3 col-sm-6">
                            <div class="dashboard-box box-shadow">
                                <span>EARNED FROM </br>REFERRALS</span>
                                <strong>${!! number_format( $earn , 2 ) !!}</strong>
                            </div>
                        </div>
                        <div class="col-md-3 col-sm-6">
                            <div class="dashboard-box box-shadow">
                                <span>INACTIVE </br>REFERRALS</span>
                                <strong>{!! $inactive !!}</strong>
                            </div>
                        </div>
                        <div class="col-md-3 col-sm-6">
                            <div class="dashboard-box box-shadow">
                                <span>TOTAL </br>REFERRALS</span>
                                <strong>{!! $inactive + $active !!}</strong>
                            </div>
                        </div>


                    </div>
                </div>

                <div class="dashboard-statistics mobile-only">

                    <div class="dashboard-slider">
                        <div class="dashboard-slider-items">
                            <div class="dashboard-box box-shadow">
                                <span>ACTIVE </br>REFERRALS</span>
                                <strong>{!! $active !!}</strong>
                            </div>
                        </div>
                        <div class="dashboard-slider-items">
                            <div class="dashboard-box box-shadow">
                                <span>EARNED FROM </br>REFERRALS</span>
                                <strong>${!! number_format( $earn , 2 ) !!}</strong>
                            </div>
                        </div>
                        <div class="dashboard-slider-items">
                            <div class="dashboard-box box-shadow">
                                <span>INACTIVE </br>REFERRALS</span>
                                <strong>{!! $inactive !!}</strong>
                            </div>
                        </div>
                        <div class="dashboard-slider-items">
                            <div class="dashboard-box box-shadow">
                                <span>TOTAL </br>REFERRALS</span>
                                <strong>{!! $inactive + $active !!}</strong>
                            </div>
                        </div>

                    </div>
                </div>
            </div>
            <div class="white-background">
                <div class="container">
                    <div class="small-container default-padding">
                        <div class="small-container referral-box">
                            <div class="referral-text">
                                For	every	user	you	refer	you	earn	5%	off	every	lead	they	get,	this	is	a	real	great	way	to	get	your	friends	or	others	invloved	while	earning	money	when	they	join.	Below	you	can	find	your	referral	link	and	a	list	of	all	the	users	you	refered.
                            </div>
                            <div class="small-container">
                                <label>Your	Referral	Link	:</label>
                                <div class="referral-form">
                                    <input type="text" value="https://influencersreach.com/invite/{{auth()->id()}}">
                                    <button>COPY</button>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="container">
                <div class="payout-table">
                    <div class="box-shadow">
                        @if(count($referrals) >0)
                            <div class="table-responsive">
                                <table class="table">
                                    <thead>
                                    <tr>
                                        <th class="empty-cell"></th>
                                        <th>ID</th>
                                        <th>DATE JOINED</th>
                                        <th>AMOUNT</th>
                                    </tr>
                                    </thead>
                                    <tbody>
                                    @foreach($referrals as $r)
                                        <tr>
                                            <td><span>.</span></td>
                                            <td>{!! $r->id !!} </td>
                                            <td>{!! $r->created_at->format('jS F Y') !!}</td>
                                            <td>${!! number_format( $r->balance->histories()->where('type', 'referral')->sum('amount') , 2 ) !!}</td>
                                        </tr>
                                    @endforeach
                                    </tbody>
                                </table>
                            </div>
                        @else
                            <div class="alert alert-danger">You not have any referrals.</div>
                        @endif
                    </div>
                </div>

            </div>
        </div>
    </div>

@endsection