@extends('shared.layout')

@section('body')
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
                        @if($today_leads === 0 || $today_clicks === 0)
                            n/a
                        @else
                            {!! "$".number_format($today_leads / $today_clicks, 2)."" !!}
                        @endif
                    </div>
                </div>
            </div>
            <div class="grid_2 h_grid_6">
                <div class="sbox">
                    <div class="title">Today Calculate CR</div>
                    <div class="amount"><span id="today_epc"></span>
                        @if($today_leads === 0 || $today_clicks === 0)
                            n/a
                        @else
                            {!! number_format($today_clicks / $today_leads)."%" !!}
                        @endif
                    </div>
                </div>
            </div>

            <div class="grid_2 h_grid_6">
                <div class="sbox">
                    <div class="title">Today Earnings</div>
                    <div class="amountg">$<span id="today_earnings"></span>{!! \App\Http\Helper::earnings_today() !!}</div>
                </div>
            </div>
            <div class="grid_2 h_grid_6">
                <div class="sbox">
                    <div class="title">Month Earnings</div>
                    <div class="amount">$<span id="month_earnings"></span>{!! \App\Http\Helper::earnings_monthly() !!}</div>
                </div>
            </div>
        </div>
    </div>


    <div class="page wide loggedin_pub">
        <div class="container">
            <div class="col-xs-12">
                <div class="panel panel-default">
                    <div class="panel-heading">Earning Activity</div>
                    <div class="panel-body">
                        <div id="earningsActivity" style="width: 100%; height: 300px;"> </div>
                    </div>
                </div>
            </div>
            {{--<div class="grid_5 h_grid_12">--}}
                {{--<div class="panel panel-default">--}}
                    {{--<div class="panel-heading">Month Geo Distribution</div>--}}
                    {{--<div class="panel-body">--}}
                        {{--<div id="regions_div" style="width: 100%;"></div>--}}
                    {{--</div>--}}
                {{--</div>--}}
            {{--</div>--}}

            <div class="col-xs-12 col-sm-10 col-md-8 col-lg-6">
                <div class="panel panel-default">
                    <div class="panel-heading">Sort Reports</div>
                    <div class="panel-body">
                    {!! Form::open(array('url' => 'reports', 'method' => 'get')) !!}
                        <table class="table">
                            <tr>
                                <b>Start date:</b>
                            </tr>
                            <tr>
                                <td>
                                    <?php $start_month = array(1 => 'January', 2 => 'February', 3 => 'March', 4 => 'April', 5 => 'May', 6 => 'June', 7 => 'July', 8 => 'August', 9 => 'September', 10 => 'October', 11 => 'November', 12 => 'December'); ?>
                                    {!! Form::select('startMonth', $start_month, $request->has('startMonth') ? $request->startMonth : \Carbon\Carbon::now()->month) !!}
                                </td>
                                <td>
                                    <?php $start_day = array(1 => '01', 2 => '02', 3 => '03', 4 => '04', 5 => '05', 6 => '06', 7 =>  '07', 8 => '08', 9 => '09', 10 => '10', 11 => '11', 12 => '12', 13 => '13', 14 => '14', 15 => '15', 16 => '16', 17 => '17', 18 =>  '18', 19 => '19', 20 => '20', 21 => '21', 22 => '22', 23 => '23', 24 => '24', 25 => '25', 26 => '26', 27 => '27', 28 => '28', 29 => '29', 30 => '30', 31 => '31'); ?>
                                    {!! Form::select('startDay', $start_day, $request->has('startDay') ? $request->startDay : \Carbon\Carbon::now()->day) !!}
                                </td>
                                <td>
                                    <?php $start_year = array('2015' => '2015', '2016' => '2016', '2017' => '2017'); ?>
                                    {!! Form::select('startYear', $start_year, $request->has('startYear') ? $request->startYear : \Carbon\Carbon::now()->year) !!}
                                </td>
                            </tr>

                                <b>End date:</b>

                            <tr>
                                <td>
                                    <?php $end_month = array(1 => 'January', 2 => 'February', 3 => 'March', 4 => 'April', 5 => 'May', 6 => 'June', 7 => 'July', 8 => 'August', 9 => 'September', 10 => 'October', 11 => 'November', 12 => 'December'); ?>
                                    {!! Form::select('endMonth', $end_month, $request->has('endMonth') ? $request->endMonth : \Carbon\Carbon::now()->month) !!}
                                </td>
                                <td>
                                    <?php $end_day = array(1 => '01', 2 => '02', 3 => '03', 4 => '04', 5 => '05', 6 => '06', 7 =>  '07', 8 => '08', 9 => '09', 10 => '10', 11 => '11', 12 => '12', 13 => '13', 14 => '14', 15 => '15', 16 => '16', 17 => '17', 18 =>  '18', 19 => '19', 20 => '20', 21 => '21', 22 => '22', 23 => '23', 24 => '24', 25 => '25', 26 => '26', 27 => '27', 28 => '28', 29 => '29', 30 => '30', 31 => '31'); ?>
                                    {!! Form::select('endDay', $end_day, $request->has('endDay') ? $request->endDay : \Carbon\Carbon::now()->day) !!}
                                </td>
                                <td>
                                    <?php $end_year = array('2015' => '2015', '2016' => '2016', '2017' => '2017'); ?>
                                    {!! Form::select('endYear', $end_year, $request->has('endYear') ? $request->endYear : \Carbon\Carbon::now()->year) !!}
                                </td>
                            </tr>
                            <tr>
                                <b>Show all by:</b>
                            </tr>
                            <tr>
                                <td colspan="3">
                                    {!! Form::select('showBy', ['all' => 'All Reports', 1 => 'Clicks', 2 => 'Leads', 3 => 'Reversals'], $request->has('showBy') ? $request->showBy : 'all') !!}
                                </td>
                            </tr>
                        </table>
                        {!! Form::submit('Sort Reports', array('class' => 'bttn')) !!}
                    {!! Form::close() !!}
                    <br />
                    </div>
                </div>
            </div>

            <div class="col-xs-12 semibold">
                <div class="panel panel-default">
                        <div class="panel-heading">Reports</div>
                        <div class="panel-body">
                            <table class="table table-hover table-bordered table-striped">
                                <thead>
                                    <tr>
                                        <th>Campaign</th>
                                        <th>Date</th>
                                        <th>Actions</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach($reports as $report)
                                        <tr>
                                            <td>{!! $report->campaign->name !!}</td>
                                            <td>{!! $report->created_at !!}</td>
                                            <td><a href="{!! url('/report/' . $report->id) !!}">View</a></td>
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>
                            {!! $reports->render() !!}
                        </div>
                </div>
            </div>
        </div>
    </div><!--end page-->

@endsection

@section('scripts')

    <script src='https://influencersreach.com/assets/amcharts/amcharts.js' type='text/javascript'></script>
    <script src='https://influencersreach.com/assets/amcharts/serial.js' type='text/javascript'></script>
    <script src='https://influencersreach.com/assets/amcharts/themes/light.js' type='text/javascript'></script>
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


    {{--@if(!empty($country_html))--}}
        {{--<script type="text/javascript" src="https://www.google.com/jsapi"></script>--}}
        {{--<script type="text/javascript">--}}
            {{--google.load("visualization", "1", {packages:["geochart"]});--}}
            {{--google.setOnLoadCallback(drawRegionsMap);--}}

            {{--function drawRegionsMap() {--}}

                {{--var data = google.visualization.arrayToDataTable([--}}
                    {{--['Country', 'Popularity'],--}}
                    {{--<?php echo $country_html; ?>--}}
                  {{--]);--}}

                {{--var options = {};--}}

                {{--var chart = new google.visualization.GeoChart(document.getElementById('regions_div'));--}}

                {{--chart.draw(data, options);--}}
            {{--}--}}
        {{--</script>--}}
    {{--@endif--}}

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