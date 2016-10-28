@extends('shared.layout')

@section('body')

    <div class="hero hero-dashboard">
        <div class="container">
            <div class="hero-stats">
                <div class="hero-stat">
                    <h3>{!! $today_clicks !!}</h3>
                    <h5 class="font-dark-gray">Today Clicks</h5>
                </div>
                <div class="hero-stat-border"></div>
                <div class="hero-stat">
                    <h3>{!! $today_leads !!}</h3>
                    <h5 class="font-dark-gray">Today Leads</h5>
                </div>
                <div class="hero-stat-border"></div>
                <div class="hero-stat">
                    <h3>
                        @if($today_clicks === 0)
                            n/a
                        @else
                            {!! "$".number_format($earnings_today / $today_clicks, 2)."" !!}
                        @endif
                    </h3>
                    <h5 class="font-dark-gray">Today EPC</h5>
                </div>
                <div class="hero-stat-border"></div>
                <div class="hero-stat">
                    <h3>
                        @if($today_leads + $today_clicks >= 0)
                            {!! "n/a" !!}
                        @else
                            {!! number_format($today_leads / ($today_leads + $today_clicks) * 100, 2)."%" !!}
                        @endif
                    </h3>
                    <h5 class="font-dark-gray">Today CR</h5>
                </div>
                <div class="hero-stat-border"></div>
                <div class="hero-stat">
                    <h3>${!! number_format($earnings_today, 2) !!}</h3>
                    <h5 class="font-dark-gray">Today Earnings</h5>
                </div>
                <div class="hero-stat-border"></div>
                <div class="hero-stat">
                    <h3>${!! number_format($earnings_month, 2) !!}</h3>
                    <h5 class="font-dark-gray">Month Earnings</h5>
                </div>
            </div>
        </div>
    </div>

    <div class="clearfix"></div>

    <div class="page-container dashboard no-border">
        <div class="container">
            <h2>Earning Activity</h2>

            <div>
                <canvas id="myChart" width="400" height="400"></canvas>
            </div>
        </div>
    </div>

@endsection

@section('scripts')
    <script src="//cdnjs.cloudflare.com/ajax/libs/Chart.js/2.2.1/Chart.min.js" type='text/javascript'></script>
    <script>
        var ctx = document.getElementById("myChart");
        var myChart = new Chart(ctx, {
            type: 'line',
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