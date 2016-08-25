<?php

namespace App\Http\Controllers\User;

use App\Models\Report;
use App\User;
use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use Carbon\Carbon;
use App\Http\Helper;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class ReachController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return Response
     */
    public function getReach(Request $request, $id = 0)
    {
        $data['id'] = (int) $id;
        $data['user'] = User::where('id', Auth::user()->id)
            ->with('instagramaccounts', 'instagramAccounts.posts')
            ->first();

        return view('user.reach.reach')->with($data);
    }

    /**
     * Display a listing of the resource.
     *
     * @return Response
     */
    public function getFollowers(Request $request, $id = 0)
    {
        $data['id'] = (int) $id;
        $data['user'] = User::where('id', Auth::user()->id)
            ->with('instagramaccounts', 'instagramAccounts.follow')
            ->first();

        $user = $data['user'];

        if($data['id'] === 0)
            $follows = $user->instagramAccountFollows;
        else
            $follows = $user->instagramAccountFollows->where('instagram_id', $data['id']);

        $chart_data = array();
        $i = 0;
        foreach ($follows->sortBy('created_at')
                     ->groupBy(function ($item) {
                         return $item->created_at->toDateString();
                     }) as $key => $p)
        {
            $chart_data[$i]['date'] = date("Y-m-d",strtotime($key));
            $chart_data[$i]['value'] = $p->sum('followed_by');
            $i++;
        }

        if(empty($chart_data))
        {
            $chart_data[0]['date'] = date("Y-m-d");
            $chart_data[0]['value'] = 0;
        }

        $data['chart_data'] = $chart_data;

        return view('user.reach.follows')->with($data);
    }

    /**
     * Display a listing of the resource.
     *
     * @return Response
     */
    public function getEngagements(Request $request, $id = 0, $engagements = 25)
    {
        $data['id'] = (int) $id;
        $data['engagements'] = $engagements;
        $data['user'] = User::where('id', Auth::user()->id)
            ->with('instagramaccounts', 'instagramAccounts.posts', 'instagramAccountPosts')
            ->first();

        return view('user.reach.engagements')->with($data);
    }

}
