<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;

use App\Models\PromotionCategory;
use App\Models\Promotion;
use File;
use Storage;

class PromotionController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return Response
     */
    public function index()
    {
        $promotions = Promotion::paginate(10);
        return view('admin.promotions.index')->with(compact('promotions'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return Response
     */
    public function create()
    {
        $data['promotion'] = new Promotion();
        return view('admin.promotions.create', $data);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  Request  $request
     * @return Response
     */
    public function store(Request $request)
    {
        // Store Image
        $featured_img = null;
        if($request->hasFile('feature_image')) {
            $file = $request->file('feature_image');
            $destinationPath = storage_path() . '/app/images/promotion/';
            $fileExt = $file->getClientOriginalExtension();
            $filename = strval(time()).".".$fileExt;
            $file->move($destinationPath, $filename);
            $featured_img = $filename;
        }

        // Create promotion
        $promotion = new Promotion();
        $promotion->name = $request->input('name');
        $promotion->description = $request->input('description');
        $promotion->url = $request->input('url');
        $promotion->featured_img = $featured_img;
        $promotion->status = $request->input('status');
        $promotion->save();

        $promotion->categories()->sync($request->input('categories'));
        $promotion->influencers()->sync($request->input('influencers'));

        return redirect('/admin/promotions/')
            ->with('success', 'Promotion add success');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return Response
     */
    public function show($id)
    {
        return 'hello';
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return Response
     */
    public function edit($id)
    {
        $data['promotion'] = Promotion::where('id', $id)->with('categories', 'influencers')->first();
//        dd($data['promotion']->categories->lists('id'));
        return view('admin.promotions.edit', $data);
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
        $promotion = Promotion::findOrFail((int) $id);

        $promotion->influencers()->sync($request->input('influencers'));
        $promotion->categories()->sync($request->input('categories'));

        // Store Image
        $featured_img = null;
        if($request->hasFile('feature_image')) {
            if($request->file('feature_image') == $promotion->featured_img)
            {
                if( Storage::exists('app/images/promotion/' . $promotion->featured_img) )
                    Storage::delete('app/images/promotion/' . $promotion->featured_img);
            }

            $file = $request->file('feature_image');
            $destinationPath = storage_path() . '/app/images/promotion/';
            $fileExt = $file->getClientOriginalExtension();
            $filename = strval(time()).".".$fileExt;
            $file->move($destinationPath, $filename);

            $promotion->featured_img = $filename;
        }

        // Update promotion
        $promotion->name = $request->input('name');
        $promotion->description = $request->input('description');
        $promotion->url = $request->input('url');
        $promotion->status = $request->input('status');

        $promotion->push();

        return redirect('/admin/promotions/')
            ->with('success', 'Promotion update success');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return Response
     */
    public function destroy($id)
    {
        $cate = Promotion::find($id);
        if(is_null($cate)){
            return redirect()->back()
                ->with('error', 'Not found');
        }else{
            $del = $cate->delete();
        }

        if($del){
            return redirect()->back()
                ->with('success', 'Record delete success');
        } else {
            return redirect()->back()
                ->with('error', 'Record delete failed');
        }
    }


    /*
     * Display category page
     *
     * */
    public function categories()
    {
        return view('admin.promotions.categories');
    }

    /*
     * Display creatives page
     *
     * */
    public function creatives()
    {
        return view('admin.promotions.creatives');
    }

    /*
     * Display creatives upload page to upload for spefic promo
     *
     * */
    public function creativesuploads($id)
    {
        return view('admin.promotions.creativesuploads');
    }
}
