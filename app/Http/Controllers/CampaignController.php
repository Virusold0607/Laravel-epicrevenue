<?php

namespace App\Http\Controllers;

use App\Models\CampaignsCategory;
use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;

use App\Models\Campaign;
use App\Models\Country;

class CampaignController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return Response
     */
    public function index(Request $request)
    {
        $category_selected = 0;
        if ($request->has('category')) {
            $category_selected = (int)$request->category;
            $campaigns = CampaignsCategory::find($category_selected);
            if(!is_null($campaigns))
                $campaigns = $campaigns->campaigns()->active()->get();
        } elseif($request->has('search')) {
            $campaigns = Campaign::where('name', 'like', '%'.$request->search.'%')->active()->get();
        } elseif($request->has('country')) {
            $code = (int) $request->country;
            $campaigns = Campaign::leftJoin('campaign_countries', 'campaigns.id', '=', 'campaign_countries.campaign_id')
                ->where('campaign_countries.country_id', '=', $code)
                ->where('campaigns.active', '=', 'yes')
                ->get();
        } else {
            $campaigns = Campaign::active()->get();
        }

        $categories = CampaignsCategory::all();

        $countries = Country::all()->lists('short_name', 'id');
        return view('user.campaigns.index')->with(compact('campaigns', 'countries', 'categories', 'category_selected'));
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return Response
     */
    public function show($id)
    {
        $campaign = Campaign::where('id', $id)->with('category', 'reports')->first();
        $daily_cap_status = TrackController::checkDailyCap($campaign);
        return view('user.campaigns.show')->with(array('campaign' => $campaign, 'daily_cap_status' => $daily_cap_status));
    }

}
