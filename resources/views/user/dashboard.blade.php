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
                    <h5 class="font-dark-gray">Today Calculate CR</h5>
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

    <div class="page-container dashboard">
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
                        borderColor: "rgba(75,192,192,1)",
                        borderCapStyle: 'butt',
                        borderDash: [],
                        borderDashOffset: 0.0,
                        borderJoinStyle: 'miter',
                        pointBorderColor: "rgba(75,192,192,1)",
                        pointBackgroundColor: "#fff",
                        pointBorderWidth: 1,
                        pointHoverRadius: 5,
                        pointHoverBackgroundColor: "rgba(75,192,192,1)",
                        pointHoverBorderColor: "rgba(220,220,220,1)",
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
        {{--var chart = AmCharts.makeChart("earningsActivity", {--}}
        {{--"type": "serial",--}}
        {{--"theme": "light",--}}
        {{--"marginRight": 10,--}}
        {{--"autoMarginOffset": 10,--}}
        {{--"dataDateFormat": "YYYY-MM-DD",--}}
        {{--"valueAxes": [{--}}
        {{--"id": "v1",--}}
        {{--"axisAlpha": 0,--}}
        {{--"position": "left"--}}
        {{--}],--}}
        {{--"balloon": {--}}
        {{--"borderThickness": 1,--}}
        {{--"shadowAlpha": 0--}}
        {{--},--}}
        {{--"graphs": [{--}}
        {{--"id": "g1",--}}
        {{--"bullet": "round",--}}
        {{--"bulletBorderAlpha": 1,--}}
        {{--"bulletColor": "#FFFFFF",--}}
        {{--"bulletSize": 5,--}}
        {{--"hideBulletsCount": 50,--}}
        {{--"lineThickness": 2,--}}
        {{--"title": "red line",--}}
        {{--"useLineColorForBulletBorder": true,--}}
        {{--"valueField": "value",--}}
        {{--"balloonText": "<div style='margin:5px; font-size:19px;'><span style='font-size:13px;'>[[category]]</span><br>[[value]]</div>"--}}
        {{--}],--}}
        {{--"chartScrollbar": {--}}
        {{--"graph": "g1",--}}
        {{--"oppositeAxis":false,--}}
        {{--"offset":30,--}}
        {{--"scrollbarHeight": 50,--}}
        {{--"backgroundAlpha": 0,--}}
        {{--"selectedBackgroundAlpha": 0.1,--}}
        {{--"selectedBackgroundColor": "#888888",--}}
        {{--"graphFillAlpha": 0,--}}
        {{--"graphLineAlpha": 0.5,--}}
        {{--"selectedGraphFillAlpha": 0,--}}
        {{--"selectedGraphLineAlpha": 1,--}}
        {{--"autoGridCount":true,--}}
        {{--"color":"#AAAAAA"--}}
        {{--},--}}
        {{--"chartCursor": {--}}
        {{--"pan": true,--}}
        {{--"valueLineEnabled": true,--}}
        {{--"valueLineBalloonEnabled": true,--}}
        {{--"cursorAlpha":0,--}}
        {{--"valueLineAlpha":0.2--}}
        {{--},--}}
        {{--"categoryField": "date",--}}
        {{--"categoryAxis": {--}}
        {{--"parseDates": true,--}}
        {{--"dashLength": 1,--}}
        {{--"minorGridEnabled": true--}}
        {{--},--}}
        {{--"export": {--}}
        {{--"enabled": true--}}
        {{--},--}}
        {{--"dataProvider": {!! json_encode(\App\Http\Helper::earnings_chart()) !!}--}}
        {{--});--}}

        {{--chart.addListener("rendered", zoomChart);--}}

        {{--zoomChart();--}}

        {{--function zoomChart() {--}}
        {{--chart.zoomToIndexes(chart.dataProvider.length - 40, chart.dataProvider.length - 1);--}}
        {{--}--}}
    </script>
@endsection