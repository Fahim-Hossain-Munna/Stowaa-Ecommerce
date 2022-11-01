<?php

namespace App\Http\Controllers;

use App\Models\Sponsor;
use Illuminate\Http\Request;
use Carbon\Carbon;
use Image;

class SponsorController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $sponsors = Sponsor::all();
        return view('dashboard_folders.sponsors.index',compact('sponsors'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
       $sponsors= Sponsor::all();
        return view('dashboard_folders.sponsors.create',compact('sponsors'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'sponsor_name' => 'required',
            'sponsor_photo' => 'required'
        ]);

        $new_name =  $request->sponsor_name."_"."sponsors". "_" . Carbon::now()->format("Y-m-d") . "." .$request->file('sponsor_photo')->getClientOriginalExtension();
        $img = Image::make($request->file('sponsor_photo'))->resize(353, 83);
        $img->save(base_path('public/all_images/sponsors_images/' . $new_name), 80);

        Sponsor::insert([
            'sponsor_name' => $request->sponsor_name,
            'sponsor_photo' => $new_name,
            'created_at' => Carbon::now()
        ]);
        return redirect('sponsor');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Sponsor  $sponsor
     * @return \Illuminate\Http\Response
     */
    public function show(Sponsor $sponsor)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Sponsor  $sponsor
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $sponsors = Sponsor::find($id);
        return view('dashboard_folders.sponsors.edit', compact('sponsors'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Sponsor  $sponsor
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        Sponsor::find($id)->update([
            'sponsor_name' => $request->sponsor_name
        ]);

        if($request->hasFile('sponsor_photo')){
            unlink(base_path('public/all_images/sponsors_images/' . Sponsor::find($id)->sponsor_photo));

            $new_name =  $request->sponsor_name."_"."sponsors". "_" . Carbon::now()->format("Y-m-d") . "." .$request->file('sponsor_photo')->getClientOriginalExtension();
            $img = Image::make($request->file('sponsor_photo'))->resize(353, 83);
            $img->save(base_path('public/all_images/sponsors_images/' . $new_name), 80);


            Sponsor::find($id)->update([
                'sponsor_photo' => $new_name
            ]);
            return back();

        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Sponsor  $sponsor
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Sponsor::find($id)->delete();
        return back();
    }

    public function status($id)
    {
       $data = Sponsor::find($id);
        if($data->status == 0){
            $data->status = 1;
        }else{
            $data->status = 0;
        }
        $data->save();

        return back();
    }
}
