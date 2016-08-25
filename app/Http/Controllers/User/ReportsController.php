<?php

namespace App\Http\Controllers\User;

use App\Models\Report;
use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use Carbon\Carbon;
use App\Http\Helper;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class ReportsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return Response
     */
    public function index(Request $request)
    {
        $date = Carbon::now();


//        $query = DB::statement("SELECT COUNT( `id` ) AS `tot`, CONCAT(`today`,'/',`month`) AS `mon_year` FROM `reports` WHERE `status`='1' AND `created_at` BETWEEN '".date('Y-m-d 00:00:00',strtotime("-".$day_differnce." days"))."' AND '".date('Y-m-d H:i:s')."' AND `user_id`='".Auth::user()->id."' GROUP BY `mon_year`");
//        $reports = Report::where('user_id', Auth::user()->id)
//            ->where('status', 1)
//            ->whereBetween('created_at', [date('Y-m-d 00:00:00',strtotime("-".$day_differnce." days")), date('Y-m-d H:i:s')])
//            ->with('countries')
//            ->get();
//        dd($reports);

        $today_clicks = Helper::today_clicks();
        $today_leads = Helper::today_leads();

        $reports = Report::where('user_id', Auth::user()->id)->with('countries')->get()->groupBy('country');

        $country_html = "";
        if (!$reports->isEmpty())
        {
            foreach ($reports as $key => $value) {
                $arrCountry[] = "['" . $key . "',  " . count($value) . "]";
            }

            if (is_array($arrCountry) && !$arrCountry) {
                $country_html = implode(",", $arrCountry);
            }
        }

        if ($request->has('startMonth') || $request->has('startDay') || $request->has('startYear') || $request->has('endMonth') || $request->has('endDay') || $request->has('endYear') || $request->has('showBy'))
        {
            $start = Carbon::create($request->startYear, $request->startMonth, $request->startDay, 0, 0, 0);
            $end = Carbon::create($request->endYear, $request->endMonth, $request->endDay, 0, 0, 0);
            $query = Report::where('user_id', Auth::user()->id)
                ->whereBetween('created_at', array($start->toDateTimeString(), $end->toDateTimeString()))
                ->orderBy('id', 'desc')
                ->with('campaign');
            if($request->showBy === 'all')
                $reports = $query->paginate(50);
            else
                $reports = $query->where('status', (int) $request->showBy)->paginate(50);
        } else {
            $reports = Report::where('user_id', Auth::user()->id)
                ->whereBetween('created_at', array($date->startOfDay()->toDateTimeString(), $date->endOfDay()->toDateTimeString()))
                ->orderBy('id', 'desc')
                ->with('campaign')
                ->paginate(50);
        }

        return view('user.reports.index', compact('today_clicks', 'today_leads', 'country_html', 'reports', 'request'));
    }


    public function show($id)
    {
        $report = Report::where('id', $id)->where('user_id', (int) auth()->user()->id)->with('campaign')->first();

        if( (int) auth()->user()->id !== (int) $report->user_id)
            return "Permission denied";

        return view('user.reports.show')->with(compact('report'));
    }

}
