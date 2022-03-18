<?php

namespace App\Http\Controllers\Admin;

use App\Models\Product;
use App\Models\Subcategory;

use Illuminate\Support\Str;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Requests\ProductFormRequest;

class ProductController extends Controller
{
     /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('admin.product.view');
    }

    public function getAllData()
    {
        $products = Product::with('subCategory')->get();
        return $products;
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
        return view('admin.product.form')->with($data);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(ProductFormRequest $request)
    {
        try{
            $data = $request->validated();

            Product::create([
                'sub_category_id' => $data['sub_category_id'],
                'title' => $data['title'],
                'slug' => Str::slug($data['title']),
                'price' => $data['price'],
                'description' => $data['description'],
            ]);

            return response()->json([
                'code' =>200,
                'status' =>'success',
                'message' =>'Product Inserted Successfully',
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
    public function show(Product $product)
    {
        return $product;
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Product $product)
    {
        $data = [
            'scope' => 'edit',
            'id' => $product->id
        ];
        return view('admin.product.form')->with($data);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(ProductFormRequest $request, Product $product)
    {
        try{
            $data = $request->validated();

            Product::where('id', $product->id)->update([
                'sub_category_id' => $data['sub_category_id'],
                'title' => $data['title'],
                'slug' => Str::slug($data['title']),
                'price' => $data['price'],
                'description' => $data['description'],
            ]);

            return response()->json([
                'code' =>200,
                'status' =>'success',
                'message' =>'Product Updated Successfully',
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
    public function destroy(Product $product)
    {
        try{
            $product->delete();

            return response()->json([
                'code' =>200,
                'status' =>'success',
                'message' =>'Product Deleted Successfully',
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
