@extends('shared.layout')

@section('body')

    <div class="main dashboard">

        <div class="gray-background reports">
            <div class="container">
                <div class="dashboard-statistics desktop-display">
                    <div class="row">
                        <div class="col-lg-2 col-md-4 col-sm-4">
                            <div class="dashboard-box box-shadow no-mar-bottom">
                                <span>TODAY CLICKS</span>
                                <strong>{!! $today_clicks !!}</strong>
                            </div>
                        </div>
                        <div class="col-lg-2 col-md-4 col-sm-4">
                            <div class="dashboard-box box-shadow no-mar-bottom">
                                <span>TODAY LEADS</span>
                                <strong>{!! $today_leads !!}</strong>
                            </div>
                        </div>
                        <div class="col-lg-2 col-md-4 col-sm-4">
                            <div class="dashboard-box box-shadow no-mar-bottom">
                                <span>TODAY EPC</span>
                                <strong>
                                    @if($today_clicks === 0)
                                        n/a
                                    @else
                                        {!! "$".number_format($earnings_today / $today_clicks, 2)."" !!}
                                    @endif</strong>
                            </div>
                        </div>
                        <div class="col-lg-2 col-md-4 col-sm-4">
                            <div class="dashboard-box box-shadow no-mar-bottom">
                                <span>TODAY CR</span>
                                <strong>@if($today_leads + $today_clicks >= 0)
                                        {!! "n/a" !!}
                                    @else
                                        {!! number_format($today_leads / ($today_leads + $today_clicks) * 100, 2)."%" !!}
                                    @endif</strong>
                            </div>
                        </div>
                        <div class="col-lg-2 col-md-4 col-sm-4">
                            <div class="dashboard-box box-shadow no-mar-bottom">
                                <span>TODAY EARNINGS</span>
                                <strong>${!! number_format($earnings_today, 2) !!}</strong>
                            </div>
                        </div>
                        <div class="col-lg-2 col-md-4 col-sm-4">
                            <div class="dashboard-box box-shadow no-mar-bottom">
                                <span>MONTH EARNINGS</span>
                                <strong>${!! number_format($earnings_month, 2) !!}</strong>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="dashboard-statistics mobile-only">
                    <div class="row dashboard-slider">
                        <div class="dashboard-slider-items">
                            <div class="dashboard-box box-shadow">
                                <span>TODAY CLICKS</span>
                                <strong>{!! $today_clicks !!}</strong>
                            </div>
                        </div>
                        <div class="dashboard-slider-items">
                            <div class="dashboard-box box-shadow">
                                <span>TODAY LEADS</span>
                                <strong>{!! $today_leads !!}</strong>
                            </div>
                        </div>
                        <div class="dashboard-slider-items">
                            <div class="dashboard-box box-shadow">
                                <span>TODAY EPC</span>
                                <strong>@if($today_clicks === 0)
                                        n/a
                                    @else
                                        {!! "$".number_format($earnings_today / $today_clicks, 2)."" !!}
                                    @endif</strong>
                            </div>
                        </div>
                        <div class="dashboard-slider-items">
                            <div class="dashboard-box box-shadow">
                                <span>TODAY CR</span>
                                <strong>@if($today_leads + $today_clicks >= 0)
                                        {!! "n/a" !!}
                                    @else
                                        {!! number_format($today_leads / ($today_leads + $today_clicks) * 100, 2)."%" !!}
                                    @endif</strong></strong>
                            </div>
                        </div>
                        <div class="dashboard-slider-items">
                            <div class="dashboard-box box-shadow">
                                <span>TODAY EARNINGS</span>
                                <strong>${!! number_format($earnings_today, 2) !!}</strong>
                            </div>
                        </div>
                        <div class="dashboard-slider-items">
                            <div class="dashboard-box box-shadow">
                                <span>MONTH EARNINGS</span>
                                <strong>${!! number_format($earnings_month, 2) !!}</strong>
                            </div>
                        </div>

                    </div>
                </div>

            </div>
        </div>

        <div class="container">
            <div class="grap">
                <canvas id="myChart" width="400" height="400"></canvas>
                {{--<img src="images/grap.png" class="img-responsive">--}}
            </div>

            <div class="payment-method small-form-container ">
                <div class="payment-method-content">
                    <h3 class="text-center margin-bottom-30">SORT REPORTS</h3>
                    {!! Form::open(array('url' => 'reports', 'method' => 'get')) !!}
                    <ul class="form-style">
                        <li>
                            <label>Start Date</label>
                            <div class="custom-select">
                                {!! Form::date('startDate',request()->input('startDate', null), array('min' => "2015-01-01", 'max' => \Carbon\Carbon::now()->toDateString())) !!}
                                {{--<span><i class="fa fa-angle-down"></i></span>--}}
                            </div>
                        </li>
                        <li>
                            <label>End	Date</label>
                            <div class="custom-select">
                                {!! Form::date('endDate', request()->input('endDate', null), array('min' => "2015-01-01", 'max' => \Carbon\Carbon::now()->toDateString())) !!}

                                {{--<span><i class="fa fa-angle-down"></i></span>--}}
                            </div>
                        </li>
                        <li>
                            <label>Show	all	by</label>
                            <div class="custom-select">
                                {!! Form::select('showBy', ['all' => 'All Reports', 1 => 'Clicks', 2 => 'Leads', 3 => 'Reversals'], $request->has('showBy') ? $request->showBy : 'all') !!}
                                <span><i class="fa fa-angle-down"></i></span>
                            </div>
                        </li>
                        <li class="action-button">
                            <button class="btn default-btn black-button small-round">SORT</button>
                        </li>
                    </ul>
                    {!! Form::close() !!}
                </div>
            </div>

        </div>

        <div class="gray-background no-shadow no-pad-top">
            <div class="container">
                <div class="payout-table">
                    <div class="small-container">
                        <h3 class="table-title text-center margin-bottom-30">SORT	REPORTS</h3>
                    </div>
                    <div class="box-shadow">
                        <div class="table-responsive">
                            <table class="table">
                                <thead>
                                <tr>
                                    <th class="empty-cell"></th>
                                    <th>ID</th>
                                    <th>DATE</th>
                                    <th>ACTIONS</th>
                                </tr>
                                </thead>
                                <tbody>
                                @foreach($reports as $report)
                                    <tr>
                                        <td><span>.</span></td>
                                        <td>{!! $report->campaign->name !!}</td>
                                        <td>{!! $report->created_at !!}</td>
                                        <td><a href="{!! url('/report/' . $report->id) !!}">View</a></td>
                                    </tr>
                                @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

@section('scripts')

    <script src="//cdnjs.cloudflare.com/ajax/libs/Chart.js/2.2.1/Chart.min.js" type='text/javascript'></script>
    <script>
        var ctx = document.getElementById("myChart");
        var myChart = new Chart(ctx, {
            type: 'bar',
            data: {
                labels: {!! json_encode($earnings_graph->pluck('date')) !!},
                datasets: [
                    {
                        label: "Earnings",
                        fill: false,
                        lineTension: 0.1,
                        backgroundColor: "rgba(75,192,192,0.4)",
                        borderColor: "#3b76ed",
                        borderCapStyle: 'butt',
                        borderDash: [],
                        borderDashOffset: 0.0,
                        borderJoinStyle: 'miter',
                        pointBorderColor: "#3b76ed",
                        pointBackgroundColor: "#3b76ed",
                        pointBorderWidth: 1,
                        pointHoverRadius: 5,
                        pointHoverBackgroundColor: "#3b76ed",
                        pointHoverBorderColor: "#3b76ed",
                        pointHoverBorderWidth: 2,
                        pointRadius: 1,
                        pointHitRadius: 10,
                        data: {{ json_encode($earnings_graph->pluck('value')) }},
                        spanGaps: false,
                    }
                ]
            },
            options: {
                responsive: true,
                maintainAspectRatio: false,
                scales: {
                    yAxes: [{
                        ticks: {
                            beginAtZero:true
                        }
                    }]
                }
            }
        });
    </script>

    <script>
        function load() {
            var colors = ["transparent"];
            var rand = Math.floor(Math.random()*colors.length);
            $.getJSON("../includes/livestats/dashboard.php", { get:"stats" },function(data) {
                $("#today_visits_top").fadeOut().fadeIn().html(data.todayVisits).css("background-color", colors[rand]);
                /*$("#today_visits_top").html(data.todayVisits);*/
                $("#today_visits").fadeOut().fadeIn().html(data.todayVisits).css("background-color", colors[rand]);
                $("#today_clicks").fadeOut().fadeIn().html(data.todayClicks).css("background-color", colors[rand]);
                $("#today_leads_top").fadeOut().fadeIn().html(data.todayLeads).css("background-color", colors[rand]);
                $("#today_leads").fadeOut().fadeIn().html(data.todayLeads).css("background-color", colors[rand]);
                $("#today_earnings_top").fadeOut().fadeIn().html(data.todayEarnings).css("background-color", colors[rand]);
                $("#today_earnings").fadeOut().fadeIn().html(data.todayEarnings).css("background-color", colors[rand]);
                $("#today_cr").fadeOut().fadeIn().html(data.todayCalculateCR).css("background-color", colors[rand]);
                $("#today_epc").fadeOut().fadeIn().html(data.todayEPC).css("background-color", colors[rand]);
                $("#today_ctr").fadeOut().fadeIn().html(data.todayCTR).css("background-color", colors[rand]);

                $("#month_visits_top").html(data.monthVisits);
                $("#month_visits").html(data.monthVisits);
                $("#month_clicks").html(data.monthClicks);
                $("#month_leads").html(data.monthLeads);
                $("#month_earnings").html(data.monthEarnings);
                $("#month_cr").html(data.monthCalculateCR);
                $("#month_epc").html(data.monthEPC);
                $("#month_ctr").html(data.monthCTR);
            });
        }
        $(function() {
            load();//on the page load.
            setInterval(load,30000);
        });
    </script>

@endsection