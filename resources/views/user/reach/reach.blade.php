@extends('shared.layout')

@section('body')
    <div class="reach-select">
        <div class="container_12">
            <div class="grid_4 h_grid_12">
                <div class="dropdown">
                  <button class="dropdown-toggle network-select" type="button" id="dropdownMenu1" data-toggle="dropdown" aria-haspopup="true" aria-expanded="true">
                    Total Reach <span class="tr-num">{!! number_format($user->instagramAccounts->sum('followed_by')) !!}</span>
                    <span class="caret"></span>
                  </button>
                  <ul class="dropdown-menu" aria-labelledby="dropdownMenu1">
                    @foreach($user->instagramAccounts as $i)
                        <li><a href="{!! url('/reach', ['id' => $i->instagram_id]) !!}">{!! $i->username !!} <span class="tr-num">{!! number_format($i->followed_by) !!}</span></a></li>
                    @endforeach
                  </ul>
                </div>
            </div>
            <div class="grid_8 h_grid_12">
                <ul class="reach-stats">
                    <li><a href="{!! url('/reach/'.$id) !!}" class="selected">Posts</a></li>
                    <li><a href="{!! url('/followers/'.$id) !!}">Followers</a></li>
                    <li><a href="{!! url('/engagements/'. $id) !!}">Engagements</a></li>
                </ul>
            </div>

        </div>
    </div>
    <div class="page">
        <div class="container_12">
            @if((int) $id === 0)
                @foreach($user->instagramAccounts as $i)
                    @foreach($i->posts as $p)
                        <div class="grid_3 h_grid_4">
                            <a class="ig-reach-post" target="_blank" href="{!! $p->url !!}">
                                <img src="{!! $p->image !!}" alt="{!! $p->caption !!}" width="100%" height="auto" />
                                <div class="post-likes"><i class="fa fa-heart"></i> {{ $p->likes }}</div>
                                <div class="instagram-desc">{{ $p->caption }} | {{ $p->created_date }}</div>
                            </a>
                        </div>
                    @endforeach
                @endforeach
            @else
                @foreach($user->instagramAccounts->where('instagram_id', $id) as $i)
                    @foreach($i->posts as $p)
                        <div class="grid_3 h_grid_4">
                            <a class="ig-reach-post" target="_blank" href="{!! $p->url !!}">
                                <img src="{!! $p->image !!}" alt="{!! $p->caption !!}" width="100%" height="auto" />
                                <div class="post-likes"><i class="fa fa-heart"></i> {{ $p->likes }}</div>
                                <div class="instagram-desc">{{ $p->caption }} | {{ $p->created_date }}</div>
                            </a>
                        </div>
                    @endforeach
                @endforeach
            @endif
        </div>
    </div>
@endsection