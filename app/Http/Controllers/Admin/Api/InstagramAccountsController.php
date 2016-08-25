<?php

namespace App\Http\Controllers\Admin\Api;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\Models\InstagramAccount;
use App\User;


class InstagramAccountsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return Response
     */
    public function index()
    {
        $instagramaccounts = InstagramAccount::orderBy('user_id', 'asc')->with('user')->paginate(10);
        return $instagramaccounts;
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  Request  $request
     * @return Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return Response
     */
    public function show($instagram_id)
    {
        return InstagramAccount::where('instagram_id', $instagram_id)->first();
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  Request  $request
     * @param  int  $id
     * @return Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return Response
     */
    public function destroy($id)
    {
        //
    }



    public function approval(Request $request, $instagram_id)
    {
        $ig = InstagramAccount::where('instagram_id', (int) $instagram_id)->firstOrFail();
        if($request->has('approve'))
        {
            if($request->approve === 'yes')
            {
                $ig->approved = 'yes';
            }
            elseif($request->approve === 'no')
            {
                $ig->approved = 'no';
            }
            $ig->save();
            return 'success';
        }
        return 'fail';
    }
}
