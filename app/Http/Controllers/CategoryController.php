<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Category;
use Illuminate\Support\Str;
use Carbon\Carbon;
use Image;

class CategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('dashboard_folders.category.index', [
            'categorys' => Category::all()
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
       return view('dashboard_folders.category.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {

        if($request->category_slug){
            $slug = Str::slug($request->category_slug);
        }else{
            $slug = Str::slug($request->category_name);
        }

        $request->validate([
            'category_name' => 'required',

            'category_photo' => 'required'
        ]);


        $new_name =  $request->category_name."_"."category". "_" . Carbon::now()->format("Y-m-d") . "." .$request->file('category_photo')->getClientOriginalExtension();
        $img = Image::make($request->file('category_photo'))->resize(300, 300);
        $img->save(base_path('public/all_images/category_pictures/' . $new_name), 80);

        Category::insert([
            'category_name' => $request->category_name,
            'category_slug' => $slug,
            'category_photo' => $new_name,
            'created_at' => Carbon::now()
        ]);
        return redirect('category')->with('category_add', 'Categories list added successfully');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $categorys = Category::find($id);
        return view('dashboard_folders.category.show', compact('categorys'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $categorys = Category::find($id);
        return view('dashboard_folders.category.edit', compact('categorys'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        if($request->category_slug){
            $slug = Str::slug($request->category_slug);
        }else{
            $slug = Str::slug($request->category_name);
        }

        Category::find($id)->update([
            'category_name' => $request->category_name,
            'category_slug' => $slug,
        ]);

        if($request->hasFile('category_photo')){
            // photo delete process
            unlink(base_path('public/all_images/category_pictures/' . Category::find($id)->category_photo ));
            // photo update process
            $new_name =  $request->category_name."_"."category". "_" . Carbon::now()->format("Y-m-d") . "." .$request->file('category_photo')->getClientOriginalExtension();
            $img = Image::make($request->file('category_photo'))->resize(300, 300);
            $img->save(base_path('public/all_images/category_pictures/' . $new_name), 80);

            Category::find($id)->update([
                'category_photo' => $new_name,
            ]);

        }
        return back()->with('category_update', 'Categories list update successfully');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Category::find($id)->delete();
        return back();
    }
}
