@extends('shared.layout')

@section('body')
    <div class="reach-select">
        <div class="container_12">
            <div class="grid_4 h_grid_12">
                <div class="dropdown">
                    <button class="dropdown-toggle network-select" type="button" id="dropdownMenu1" data-toggle="dropdown" aria-haspopup="true" aria-expanded="true">
                        Total Reach <span class="tr-num">{!! $user->instagramaccounts->sum('followed_by') !!}</span>
                        <span class="caret"></span>
                    </button>
                    <ul class="dropdown-menu" aria-labelledby="dropdownMenu1">
                        @foreach($user->instagramaccounts as $i)
                            <li><a href="{!! url('/followers', ['id' => $i->instagram_id]) !!}">{!! $i->username !!} <span class="tr-num">{!! number_format($i->followed_by) !!}</span></a></li>
                        @endforeach
                    </ul>
                </div>
            </div>
            <div class="grid_8 h_grid_12">
                <ul class="reach-stats">
                    <li><a href="{!! url('/reach/'.$id) !!}">Posts</a></li>
                    <li><a href="{!! url('/followers/'.$id) !!}" class="selected">Followers</a></li>
                    <li><a href="{!! url('/engagements/'. $id) !!}">Engagements</a></li>
                </ul>
            </div>

        </div>
    </div>
    <div class="page">
        <div class="container_12">

            <div class="panel panel-default">
                <div class="panel-heading">Total Followers</div>
                <div class="panel-body">
                    <div id="chartdiv" style="width: 100%; height: 400px;"> </div>
                </div>
            </div>

            <div class="grid_6 h_grid_12">
                <div class="panel panel-default">
                    <div class="panel-heading">Followers Change</div>
                    <div class="panel-body">
                        <table class="table table-bordered">
                            <thead>
                            <tr>
                                <th>Date</th>
                                <th>Change</th>
                                <th>Total</th>
                            </tr>
                            </thead>
                            <tbody>
                                <?php
                                    if($id === 0)
                                        $collection = $user->instagramAccountFollows
                                                ->sortByDesc('created_at')
                                                ->groupBy(function ($item) {
                                                    return $item->created_at->format('D m/d/y');
                                                })->take(7);
                                    else
                                        $collection = $user->instagramAccountFollows
                                                ->sortByDesc('created_at')
                                                ->where('instagram_id', $id)
                                                ->groupBy(function ($item) {
                                                    return $item->created_at->format('D m/d/y');
                                                })->take(7);

                                    $z1 = 0;
                                    foreach($collection as $key => $i):
                                        if(!isset($y1))
                                            $followed_by[$z1] = $y1 = 0;
                                        else
                                            $followed_by[$z1] = $y1 = $y1 - $i->sum('followed_by');

                                        $y1 = $i->sum('followed_by');
                                        $z1++;
                                    endforeach;
                                        if(isset($followed_by) && is_array($followed_by))
                                        {
                                            array_push($followed_by, 0);
                                            unset($followed_by[0]);
                                        }
                                ?>
                                @foreach($collection as $key => $i)
                                    <?php
                                        if(!isset($x1))
                                            $x1 = 1;
                                    ?>
                                    <tr>
                                        <td>{!! $key !!}</td>
                                        <td><span class="{!! ($followed_by[$x1] >= 0)  ? 'positive' : 'negative' !!}">{!! $followed_by[$x1] !!}</span></td>
                                        <td>{!! $i->sum('followed_by') !!}</td>
                                    </tr>
                                    <?php $x1++; ?>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
            <div class="grid_6 h_grid_12">
                <div class="panel panel-default">
                    <div class="panel-heading">Following</div>
                    <div class="panel-body">
                        <table class="table table-bordered">
                            <thead>
                            <tr>
                                <th>Date</th>
                                <th>Change</th>
                                <th>Total</th>
                            </tr>
                            </thead>
                            <tbody>
                                <?php
                                    if($id === 0)
                                        $collection = $user->instagramAccountFollows
                                                ->sortByDesc('created_at')
                                                ->groupBy(function ($item) {
                                                    return $item->created_at->format('D m/d/y');
                                                })->take(7);
                                    else
                                        $collection = $user->instagramAccountFollows
                                                ->sortByDesc('created_at')
                                                ->where('instagram_id', $id)
                                                ->groupBy(function ($item) {
                                                    return $item->created_at->format('D m/d/y');
                                                })->take(7);

                                    $z2 = 0;
                                    foreach($collection as $key => $i):
                                        if(!isset($y2))
                                            $follows[$z2] = $y2 = 0;
                                        else
                                            $follows[$z2] = $y2 = $y2 - $i->sum('follows');

                                        $y2 = $i->sum('follows');
                                        $z2++;
                                    endforeach;
                                    if(isset($follows) && is_array($follows))
                                    {
                                        array_push($follows, 0); unset($follows[0]);
                                    }
                                ?>
                                @foreach($collection as $key => $i)
                                    <?php
                                    if(!isset($x2))
                                        $x2 = 1;
                                    ?>
                                    <tr>
                                        <td>{!! $key !!}</td>
                                        <td><span class="{!! ($follows[$x2] >= 0)  ? 'positive' : 'negative' !!}">{!! $follows[$x2] !!}</span></td>
                                        <td>{!! $i->sum('follows') !!}</td>
                                    </tr>
                                    <?php $x2++; ?>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

@section('scripts')
    <script src="{!! url('/assets/amcharts/amcharts.js') !!}" type='text/javascript'></script>
    <script src="{!! url('/assets/amcharts/serial.js') !!}" type='text/javascript'></script>
    <script src="{!! url('/assets/amcharts/themes/light.js') !!}" type='text/javascript'></script>
    <script>
        var chart = AmCharts.makeChart("chartdiv", {
            "type": "serial",
            "theme": "light",
            "marginRight": 20,
            "autoMarginOffset": 20,
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
                "scrollbarHeight": 80,
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
                "enabled": false
            },
            "dataProvider": {!! json_encode($chart_data) !!}
        });

        chart.addListener("rendered", zoomChart);

        zoomChart();

        function zoomChart() {
            chart.zoomToIndexes(chart.dataProvider.length - 40, chart.dataProvider.length - 1);
        }
    </script>
@endsection