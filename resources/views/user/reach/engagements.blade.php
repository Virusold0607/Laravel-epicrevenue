@extends('shared.layout')

@section('body')
    <div class="reach-select">
        <div class="container_12">
            <div class="grid_4 h_grid_12">
                <div class="dropdown">
                    <button class="dropdown-toggle network-select" type="button" id="dropdownMenu1" data-toggle="dropdown" aria-haspopup="true" aria-expanded="true">
                        Total Reach <span class="tr-num">{!! $user->instagramAccounts->sum('followed_by') !!}</span>
                        <span class="caret"></span>
                    </button>
                    <ul class="dropdown-menu" aria-labelledby="dropdownMenu1">
                        @foreach($user->instagramAccounts as $i)
                            <li><a href="{!! url('/engagements', ['id' => $i->instagram_id, 'engagements' => $engagements]) !!}">{!! $i->username !!} <span class="tr-num">{!! number_format($i->followed_by) !!}</span></a></li>
                        @endforeach
                    </ul>
                </div>
            </div>
            <div class="grid_8 h_grid_12">
                <ul class="reach-stats">
                    <li><a href="{!! url('/reach/'.$id) !!}">Posts</a></li>
                    <li><a href="{!! url('/followers/'.$id) !!}">Followers</a></li>
                    <li><a href="{!! url('/engagements/'. $id.'/'.$engagements) !!}" class="selected">Engagements</a></li>
                </ul>
            </div>
        </div>
    </div>
    <div class="page">
        <div class="container_12">
            <div class="panel panel-default average-en-panel">
                <div class="panel-heading">
                    <div class="row">
                        <div class="average-en-panel-title">Average Engagements</div>
                        <div style="float:right; margin-right:10px;">
                            <div class="btn-group">
                                <button type="button" class="btn btn-default dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                    Last {!! $engagements !!} <span class="caret"></span>
                                </button>
                                <ul class="dropdown-menu">
                                    <li><a href="{!! url('/engagements/'.$id.'/5') !!}">Last 5 post</a></li>
                                    <li><a href="{!! url('/engagements/'.$id.'/10') !!}">Last 10 post</a></li>
                                    <li><a href="{!! url('/engagements/'.$id.'/25') !!}">Last 25 post</a></li>
                                    <li><a href="{!! url('/engagements/'.$id.'/50') !!}">Last 50 post</a></li>
                                    <li><a href="{!! url('/engagements/'.$id.'/100') !!}">Last 100 post</a></li>
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="panel-body">
                    <div class="grid_12">
                        <div class="panel panel-default overall-en-panel">
                            <div align="center" class="panel-body">
                                <div class="overall">Overal Engagements: <span id="overalengage"></span>%</div>
                                <span id="overalengage_plus"></span>
                            </div>
                        </div>
                    </div>
                    <div class="grid_4 h_grid_12">
                        <div class="panel panel-default reach-average">
                            <div class="panel-body">
                                <i class="fa fa-eye icon"></i>
                                <h4 class="title">Engagements</h4>
                                <div class="count"><span id="totalengage"></span></div>
                                <p>Average total actions per post</p>
                            </div>
                        </div>
                    </div>
                    <div class="grid_4 h_grid_12">
                        <div class="panel panel-default reach-average">
                            <div class="panel-body">
                                <i class="fa fa-heart icon"></i>
                                <h4 class="title">Likes</h4>
                                <div class="count"><span id="totallikes"></span></div>
                                <p>Average likes per post</p>
                            </div>
                        </div>
                    </div>
                    <div class="grid_4 h_grid_12">
                        <div class="panel panel-default reach-average">
                            <div class="panel-body">
                                <i class="fa fa-comments icon"></i>
                                <h4 class="title">Comments</h4>
                                <div class="count"><span id="totalcomments"></span></div>
                                <p>Average comments per post</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="panel panel-default total-post-e">
                <div class="panel-heading">
                    <h3 class="panel-title">Total Post Engagements</h3>
                </div>
                <div class="panel-body">

                    <table class="table table-striped table-bordered">
                        <tr>
                            <td>Photo</td>
                            <td>Likes</td>
                            <td>Comments</td>
                            <td>Total</td>
                            <td>Posted</td>
                        </tr>
                        <?php
                        if($id === 0) {
                            $posts = $user->instagramAccountPosts;
                            $accounts = $user->instagramAccounts;
                        } else {
                            $posts = $user->instagramAccountPosts
                                    ->where('instagram_id', $id);
                            $accounts = $user->instagramAccounts
                                    ->where('instagram_id', $id);
                        }
                        ?>
                        @foreach($posts->take($engagements) as $p)
                            <tr>
                                <td align='center'><img class='table-img' src="{!! $p->image !!}"/></td>
                                <td align='center'>{!! $p->likes !!}</td>
                                <td align='center'>{!! $p->comments !!}</td>
                                <td align='center'>{!! $p->likes + $p->comments !!}</td>
                                <td align='center'>{!! $p->created_time->format('m/d/Y') !!}</td>
                            </tr>
                        @endforeach
                    </table>
                </div>
            </div>
        </div>
    </div>
@endsection

@section('scripts')
    <script>
        $( document ).ready(function() {
            var count = {!! $posts->take($engagements)->count() !!}
                likes = {!! $posts->take($engagements)->sum('likes') !!}
                comments = {!! $posts->take($engagements)->sum('comments') !!}
                total = (likes / count) + (comments / count)
                followers = {!! $accounts->sum('followed_by') !!}
                overall = Math.round(Math.round(((comments+likes) / (count))) / followers * 100);
                if(!isFinite(overall)){ overall = 0 }
            $("#totalengage").text(total.toFixed(2));
            $("#totallikes").text((likes  / count).toFixed(2));
            $("#totalcomments").text((comments  /  count).toFixed(2));
            $("#overalengage").text(overall.toFixed(2));
            $("#overalengage_plus").text("Likes: " + likes + " , Comments: "+comments+" , Total posts: "+count+" , Followers: "+followers);
        });
    </script>
@endsection