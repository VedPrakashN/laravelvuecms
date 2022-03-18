<?php

namespace App\Http\Controllers\Admin;

use App\Models\Category;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Requests\CategoryFormRequest;

class CategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('admin.category.view');
    }

    public function getAllData()
    {
        $categories = Category::all();
        return $categories;
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
        return view('admin.category.form')->with($data);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(CategoryFormRequest $request)
    {
        try{
            $data = $request->validated();

            Category::create([
                'title' => $data['title'],
                'slug' => Str::slug($data['title']),
                'description' => $data['description'],
            ]);

            return response()->json([
                'code' =>200,
                'status' =>'success',
                'message' =>'Category Inserted Successfully',
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
    public function show(Category $category)
    {
        return $category;
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Category $category)
    {
        $data = [
            'scope' => 'edit',
            'id' => $category->id
        ];
        return view('admin.category.form')->with($data);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(CategoryFormRequest $request, Category $category)
    {
        try{
            $data = $request->validated();

            Category::where('id', $category->id)->update([
                'title' => $data['title'],
                'slug' => Str::slug($data['title']),
                'description' => $data['description'],
            ]);

            return response()->json([
                'code' =>200,
                'status' =>'success',
                'message' =>'Category Updated Successfully',
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
    public function destroy(Category $category)
    {
        try{

            $category->delete();

            if($category->subCategories()){

                $category->subCategories()->delete();

                if($category->subCategories()->products()){
                    $category->subCategories()->products()->delete();
                }
            }

            return response()->json([
                'code' =>200,
                'status' =>'success',
                'message' =>'Category and its branches Deleted Successfully',
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
