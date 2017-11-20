@extends('shared.layout')

@section('body')

    <div class="main dashboard">
        <div class="container">
            <div class="grap">
                <canvas id="myChart" width="400" height="400"></canvas>
                {{--<img src="images/grap.png" class="img-responsive">--}}
            </div>
        </div>
        <div class="gray-background">
            <div class="container">
                <div class="dashboard-statistics desktop-display">
                    <div class="row">
                        <div class="col-lg-2 col-sm-4">
                            <div class="dashboard-box box-shadow">
                                <span>TODAY CLICKS</span>
                                <strong>{!! $today_clicks !!}</strong>
                            </div>
                        </div>
                        <div class="col-lg-2 col-sm-4">
                            <div class="dashboard-box box-shadow">
                                <span>TODAY LEADS</span>
                                <strong>{!! $today_leads !!}</strong>
                            </div>
                        </div>
                        <div class="col-lg-2 col-sm-4">
                            <div class="dashboard-box box-shadow">
                                <span>TODAY EPC</span>
                                <strong>
                                    @if($today_clicks === 0)
                                        n/a
                                    @else
                                        {!! "$".number_format($earnings_today / $today_clicks, 2)."" !!}
                                    @endif</strong>
                            </div>
                        </div>
                        <div class="col-lg-2 col-sm-4">
                            <div class="dashboard-box box-shadow">
                                <span>TODAY CR</span>
                                <strong>@if($today_leads + $today_clicks >= 0)
                                        {!! "n/a" !!}
                                    @else
                                        {!! number_format( ($today_leads / ($today_clicks)) * 100, 0)."%" !!}
                                    @endif</strong>
                            </div>
                        </div>
                        <div class="col-lg-2 col-sm-4">
                            <div class="dashboard-box box-shadow">
                                <span>TODAY EARNINGS</span>
                                <strong>${!! number_format($earnings_today, 2) !!}</strong>
                            </div>
                        </div>
                        <div class="col-lg-2 col-sm-4">
                            <div class="dashboard-box box-shadow">
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
                                <strong>
                                    @if($today_clicks === 0)
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
                                        {!! number_format(($today_leads / ($today_clicks)) * 100, 2)."%" !!}
                                    @endif</strong>
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

                <div class="dashboard-tabs">

                    <ul class="nav nav-tabs row no-padding" style="list-style: none;">
                        <li class="col-sm-4 active"><a data-toggle="tab" href="#home"><span>Latest</span>Promotions <img src="/images/tabs1.png" class="img-responsive"></a></li>
                        <li class="col-sm-4"><a data-toggle="tab" href="#menu1"><span>Highest	Converting</span>Promotions <img src="/images/tabs2.png" class="img-responsive"></a></li>
                        <li class="col-sm-4"><a data-toggle="tab" href="#menu2"><span>Highest	EPC</span>Promotions <img src="/images/tabs3.png" class="img-responsive"></a></li>
                    </ul>

                    <div class="tab-content row no-padding">
                        <div id="home" class="tab-pane fade in active">
                            <table class="table">
                                <thead>
                                <tr>
                                    <th class="empty-cell"></th>
                                    <th>OFFERS</th>
                                    <th>PAYOUT</th>
                                    <th>CR</th>
                                </tr>
                                </thead>
                                <tbody>
                                @foreach(\App\Models\Campaign::orderBy('created_at', 'desc')->take(10)->get() as $c)
                                <tr>
                                    <td><span></span></td>
                                    <td>{!! $c->name !!}</td>
                                    <td class="color-blue">{!! $c->rate !!}</td>
                                    <td class="color-gray">{!! number_format( ($c->reports()->lead()->count() / ($c->reports()->count() == 0 ? 1 : $c->reports()->count())) * 100,2)  !!}</td>
                                </tr>
                                @endforeach
                                </tbody>
                            </table>
                        </div>
                        <div id="menu1" class="tab-pane fade">
                            <table class="table">
                                <thead>
                                <tr>
                                    <th class="empty-cell"></th>
                                    <th>OFFERS</th>
                                    <th>PAYOUT</th>
                                    <th>CR</th>
                                </tr>
                                </thead>
                                <tbody>
                                @foreach($top_campaigns as $c)
                                    <tr>
                                        <td><span></span></td>
                                        <td>{!! $c->name !!}</td>
                                        <td class="color-blue">{!! $c->rate !!}</td>
                                        <td class="color-gray">{!! $cr  !!}</td>
                                    </tr>
                                @endforeach
                                </tbody>
                            </table>
                        </div>
                        <div id="menu2" class="tab-pane fade">
                            <table class="table">
                                <thead>
                                <tr>
                                    <th class="empty-cell"></th>
                                    <th>OFFERS</th>
                                    <th>PAYOUT</th>
                                    <th>CR</th>
                                </tr>
                                </thead>
                                <tbody>
                                @foreach($top_campaigns as $c)
                                    <tr>
                                        <td><span></span></td>
                                        <td>{!! $c->name !!}</td>
                                        <td class="color-blue">{!! $c->rate !!}</td>
                                        <td class="color-gray">{!! $cr  !!}</td>
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
    <div class="clearfix"></div>
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
@endsection