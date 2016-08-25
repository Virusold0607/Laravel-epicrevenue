@extends('shared.layout')

@section('body')
    @if(\Auth::check())

    @endif
    <div class="dash-stats">
        <div class="container_12">
            <div class="grid_2 h_grid_6">
                <div class="sbox">
                    <div class="title">Today Clicks</div>
                    <div class="amount"><span id="today_clicks"></span>{!! $today_clicks !!}</div>
                </div>
            </div>
            <div class="grid_2 h_grid_6">
                <div class="sbox">
                    <div class="title">Today Leads</div>
                    <div class="amountg"><span id="today_leads"></span>{!! $today_leads !!}</div>
                </div>
            </div>
            <div class="grid_2 h_grid_6">
                <div class="sbox">
                    <div class="title">Today EPC</div>
                    <div class="amount"><span id="today_epc"></span>
                        @if($today_clicks === 0)
                            n/a
                        @else
                            {!! "$".number_format($earnings_today / $today_clicks, 2)."" !!}
                        @endif
                    </div>
                </div>
            </div>
            <div class="grid_2 h_grid_6">
                <div class="sbox">
                    <div class="title">Today Calculate CR</div>
                    <div class="amount"><span id="today_cr"></span>
                        @if($today_leads + $today_clicks >= 0)
                            {!! "n/a" !!}
                        @else
                            {!! number_format($today_leads / ($today_leads + $today_clicks) * 100, 2)."%" !!}
                        @endif
                    </div>
                </div>
            </div>
            <div class="grid_2 h_grid_6">
                <div class="sbox">
                    <div class="title">Today Earnings</div>
                    <div class="amountg">$<span id="today_earnings"></span>{!! number_format($earnings_today, 2) !!}</div>
                </div>
            </div>
            <div class="grid_2 h_grid_6">
                <div class="sbox">
                    <div class="title">Month Earnings</div>
                    <div class="amount">$<span id="month_earnings"></span>{!! number_format($earnings_month, 2) !!}</div>
                </div>
            </div>
        </div>
    </div>
    
  
    <div class="page wide loggedin_pub">
        <div class="container_12">
            <div class="grid_12">
                <div class="panel panel-default">
                    <div class="panel-heading">Earning Activity</div>
                    <div class="panel-body">
                        <div id="earningsActivity" style="width: 100%; height: 300px;"> </div>
                    </div>
                </div>
            </div>
        </div>
    </div><!--end page-->

@endsection

@section('scripts')
    <script src="{!! url('/assets/amcharts/amcharts.js') !!}" type='text/javascript'></script>
    <script src="{!! url('/assets/amcharts/serial.js') !!}" type='text/javascript'></script>
    <script src="{!! url('/assets/amcharts/themes/light.js') !!}" type='text/javascript'></script>
    <script>
        var chart = AmCharts.makeChart("earningsActivity", {
            "type": "serial",
            "theme": "light",
            "marginRight": 10,
            "autoMarginOffset": 10,
            "dataDateFormat": "YYYY-MM-DD",
            "valueAxes": [{
                "id": "v1",
                "axisAlpha": 0,
                "position": "left"
            }],
            "balloon": {
                "borderThickness": 1,
                "shadowAlpha": 0
            },
            "graphs": [{
                "id": "g1",
                "bullet": "round",
                "bulletBorderAlpha": 1,
                "bulletColor": "#FFFFFF",
                "bulletSize": 5,
                "hideBulletsCount": 50,
                "lineThickness": 2,
                "title": "red line",
                "useLineColorForBulletBorder": true,
                "valueField": "value",
                "balloonText": "<div style='margin:5px; font-size:19px;'><span style='font-size:13px;'>[[category]]</span><br>[[value]]</div>"
            }],
            "chartScrollbar": {
                "graph": "g1",
                "oppositeAxis":false,
                "offset":30,
                "scrollbarHeight": 50,
                "backgroundAlpha": 0,
                "selectedBackgroundAlpha": 0.1,
                "selectedBackgroundColor": "#888888",
                "graphFillAlpha": 0,
                "graphLineAlpha": 0.5,
                "selectedGraphFillAlpha": 0,
                "selectedGraphLineAlpha": 1,
                "autoGridCount":true,
                "color":"#AAAAAA"
            },
            "chartCursor": {
                "pan": true,
                "valueLineEnabled": true,
                "valueLineBalloonEnabled": true,
                "cursorAlpha":0,
                "valueLineAlpha":0.2
            },
            "categoryField": "date",
            "categoryAxis": {
                "parseDates": true,
                "dashLength": 1,
                "minorGridEnabled": true
            },
            "export": {
                "enabled": true
            },
            "dataProvider": {!! json_encode(\App\Http\Helper::earnings_chart()) !!}
        });

        chart.addListener("rendered", zoomChart);

        zoomChart();

        function zoomChart() {
            chart.zoomToIndexes(chart.dataProvider.length - 40, chart.dataProvider.length - 1);
        }
    </script>
@endsection