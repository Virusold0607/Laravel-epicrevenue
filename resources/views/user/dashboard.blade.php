@extends('shared.layout')

@section('body')


        <div class="hero hero-dashboard">
            <div class="container">
                <div class="row hero-stats">

                   <div class="col-sm-4 col-md-3">
                    <div class="hero-stat">
                        <h3>${!! number_format($earnings_today, 2) !!}</h3>
                        <h5 class="font-dark-gray">Today Earnings</h5>
                    </div>
                    </div>
                    
                    <div class="col-sm-4 col-md-3">
                        <div class="hero-stat">
                            <h3>{!! $today_clicks !!}</h3>
                            <h5 class="font-dark-gray">Today Clicks</h5>
                        </div>
                   </div>
                   <div class="col-sm-4 col-md-3">
                    <div class="hero-stat">
                        <h3>{!! $today_leads !!}</h3>
                        <h5 class="font-dark-gray">Today Leads</h5>
                    </div>
                    </div>
                    
                    <div class="col-sm-4 col-md-3">
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
                    </div>
                    
                    <!--
                    <div class="col-sm-4 col-md-3">
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
                    </div>
                    -->
                    
                    <div class="col-sm-4 col-md-3">
                        <div class="hero-stat">
                            <h3>${!! number_format($earnings_month, 2) !!}</h3>
                            <h5 class="font-dark-gray">Month Earnings</h5>
                        </div>
                    </div>
                    <div class="col-sm-4 col-md-3">
                        <div class="hero-stat">
                            <h3>{!! $today_clicks !!}</h3>
                            <h5 class="font-dark-gray">Month Clicks</h5>
                        </div>
                   </div>
                   <div class="col-sm-4 col-md-3">
                    <div class="hero-stat">
                        <h3>{!! $today_leads !!}</h3>
                        <h5 class="font-dark-gray">Month Leads</h5>
                    </div>
                    </div>
                    
                    <div class="col-sm-4 col-md-3">
                    <div class="hero-stat">
                        <h3>
                            @if($today_clicks === 0)
                                n/a
                            @else
                                {!! "$".number_format($earnings_month / $today_clicks, 2)."" !!}
                            @endif
                        </h3>
                        <h5 class="font-dark-gray">Month EPC</h5>
                    </div>
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

        <div class="clearfix"></div>

        @if($is_mobile)
            <div class="container" style="height: 50px;"></div>

            <div class="panel panel-default">
                <div class="panel-heading">
                    <h3 class="panel-title"><strong>Top campaigns</strong></h3>
                </div>
                <div class="panel-body">
                    <div class="row">
                        @foreach($top_campaigns as $campaign)
                        <div class="col-sm-6 col-md-4">
                            <div class="thumbnail">
                                <div class="caption">
                                    <a href="/campaign/{!! $campaign->id !!}"><h4>{{ $campaign->name }}</h4></a>
                                    <!--<p><a href="#" class="btn btn-primary" role="button">Button</a> <a href="#" class="btn btn-default" role="button">Button</a></p>-->
                                </div>
                            </div>
                        </div>
                        @endforeach
                    </div>

                </div>
            </div>
        @endif
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
                        backgroundColor: "#ca6e6e",
                        borderColor: "#960000",
                        borderCapStyle: 'butt',
                        borderDash: [],
                        borderDashOffset: 0.0,
                        borderJoinStyle: 'miter',
                        pointBorderColor: "#960000",
                        pointBackgroundColor: "#960000",
                        pointBorderWidth: 1,
                        pointHoverRadius: 5,
                        pointHoverBackgroundColor: "#960000",
                        pointHoverBorderColor: "#960000",
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