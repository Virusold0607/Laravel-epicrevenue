@extends('shared.layout')

@section('body')

<div class="dash-stats">
    <div class="container_12">
    	<div class="grid_4 h_grid_12">
            <div class="sbox">
                <div class="title">Active Referrals</div>
                <div class="amount">{!! $active !!}</div>
            </div>
        </div>
        <div class="grid_4 h_grid_12">
            <div class="sbox">
                <div class="title">Earned from Referrals</div>
                <div class="amountg">{!! $earn !!}</div>
            </div>
        </div>
        <div class="grid_4 h_grid_12">
            <div class="sbox">
                <div class="title">Inactive Referrals</div>
                <div class="amount">{!! $inactive !!}</div>
            </div>
        </div>
    </div>
</div>
<div class="page">
    <div class="container_12">
		<p>For every user you refer you earn 5% off every lead they get, this is a real great way to get your friends or others invloved while earning money when they join. Below you can find your referral link and a list of all the users you refered.</p>
		<br />
		Your referral link: <br />
		<input class="form-control" value="{!! url('/invite/' . auth()->user()->id) !!}" style="width: 600px; " />
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

@endsection