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
        $campaigns = Campaign::mobile()->active();
        if ($request->has('category')) {
            $category_selected = (int) $request->category;
            $campaigns = $campaigns->where('category_id', $category_selected);
        }
        if($request->has('search')) {
            $campaigns = $campaigns->where('name', 'like', '%'.$request->search.'%');
        }
        if($request->has('country')) {
            $code = (int) $request->country;
            if($code) {
                $campaigns = $campaigns
                    ->leftJoin('campaign_countries', 'campaigns.id', '=', 'campaign_countries.campaign_id')
                    ->where('campaign_countries.country_id', '=', $code);
            }
        }

        $campaigns = $campaigns->get();
        $categories = CampaignsCategory::whereIn(
            'id',
            Campaign::active()
                ->mobile()
                ->select('category_id')
                ->get()
                ->pluck('category_id')
                ->toArray()
        )->get();

        $countries = Country::all();
        $country = new Country();
        $country->short_name = 'All Countries';
        $country->id = 0;
        $countries = $countries->push($country)
                                ->sortBy('id')
                                ->pluck('short_name', 'id');
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
        $campaign = Campaign::where('id', $id)->mobile()->active()->with('category', 'reports')->firstOrFail();
        $daily_cap_status = TrackController::checkDailyCap($campaign);
        return view('user.campaigns.show')->with(array('campaign' => $campaign, 'daily_cap_status' => $daily_cap_status));
    }

}
