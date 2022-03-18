<?php

namespace App\Http\Controllers\Admin;

use App\Models\Subcategory;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Requests\SubcategoryFormRequest;

class SubcategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('admin.sub-category.view');
    }

    public function getAllData()
    {
        $subCategories = Subcategory::with('category')->get();
        return $subCategories;
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $data = [
            'scope' => 'create',
        ];
        return view('admin.sub-category.form')->with($data);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(SubcategoryFormRequest $request)
    {
        try{
            $data = $request->validated();

            Subcategory::create([
                'category_id' => $data['category_id'],
                'title' => $data['title'],
                'slug' => Str::slug($data['title']),
                'description' => $data['description'],
            ]);

            return response()->json([
                'code' =>200,
                'status' =>'success',
                'message' =>'Sub Category Inserted Successfully',
            ],200);
        }
        catch(\Exception $ex){

            return response()->json([
                'code' =>500,
                'status' =>'error',
                'message' =>'Something Went Wrong. Please Try Again',
                'error' => $ex->getMessage()
            ],500);
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(Subcategory $sub_category)
    {
        return $sub_category;
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Subcategory $sub_category)
    {
        $data = [
            'scope' => 'edit',
            'id' => $sub_category->id
        ];
        return view('admin.sub-category.form')->with($data);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(SubcategoryFormRequest $request, Subcategory $sub_category)
    {
        try{
            $data = $request->validated();

            Subcategory::where('id', $sub_category->id)->update([
                'category_id' => $data['category_id'],
                'title' => $data['title'],
                'slug' => Str::slug($data['title']),
                'description' => $data['description'],
            ]);

            return response()->json([
                'code' =>200,
                'status' =>'success',
                'message' =>'Sub Category Updated Successfully',
            ],200);
        }
        catch(\Exception $ex){

            return response()->json([
                'code' =>500,
                'status' =>'error',
                'message' =>'Something Went Wrong. Please Try Again',
                'error' => $ex->getMessage()
            ],500);
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Subcategory $sub_category)
    {
        try{
            $sub_category->delete();
            if($sub_category->products()){

                $sub_category->products()->delete();
            }

            return response()->json([
                'code' =>200,
                'status' =>'success',
                'message' =>'Sub Category and its Products Deleted Successfully',
            ],200);
        }
        catch(\Exception $ex){

            return response()->json([
                'code' =>500,
                'status' =>'error',
                'message' =>'Something Went Wrong. Please Try Again',
                'error' => $ex->getMessage()
            ],500);
        }
    }
}
