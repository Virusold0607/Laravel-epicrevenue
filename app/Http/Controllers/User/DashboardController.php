<?php

namespace App\Http\Controllers\User;

use App\Http\Helper;
use App\Models\Campaign;
use App\Models\Country;
use App\Models\Report;
use App\Models\UserBalanceHistory;
use App\User;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Auth;

use App\Http\Requests;
use App\Http\Controllers\Controller;

class DashboardController extends Controller
{
    /*
     * Display dashboard
     *
     * @return Response
     */
    public function index()
    {
        $user = User::where('id', auth()->user()->id)->first();
        $u = $user->id;
        $data['today_clicks'] = Report::ofUser($u)->click()->today()->count();
        $data['today_leads'] = Report::ofUser($u)->lead()->today()->count();
        $data['earnings_today'] = Report::ofUser($u)->lead()->today()->sum('rate');
        $data['earnings_month'] = Report::ofUser($u)->lead()->month()->sum('rate');

        return view('user.dashboard', $data);
    }

}
