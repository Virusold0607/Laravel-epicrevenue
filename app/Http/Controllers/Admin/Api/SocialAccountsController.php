<?php

namespace App\Http\Controllers\Admin\Api;

use App\Models\SocialAccount;
use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\User;


class SocialAccountsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return Response
     */
    public function index()
    {
        $socialaccounts = SocialAccount::orderBy('user_id', 'asc')->with('user')->paginate(10);
        return $socialaccounts;
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
    public function show($id)
    {
        return SocialAccount::where('account_id', $id)->firstOrFail();
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



    public function approval(Request $request, $account_id)
    {
        $account = SocialAccount::where('account_id', (int) $account_id)->firstOrFail();
        if($request->has('approve'))
        {
            if($request->approve === 'yes')
            {
                $account->approved = 'yes';
            }
            elseif($request->approve === 'no')
            {
                $account->approved = 'no';
            }
            $account->save();
            return 'success';
        }
        return 'fail';
    }
}
