<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\Product;
use App\Models\Subcategory;
use Illuminate\Http\Request;

class ApiController extends Controller
{
    public function subCategory($category_id)
    {
        $sub_categories = Subcategory::where('category_id',$category_id)->with('category')->get();
        return $sub_categories;
    }

    public function product($sub_category_id)
    {
        $products = Product::where('sub_category_id',$sub_category_id)->with('subCategory','subCategory.category')->get();
        return $products;
    }

    public function productView($product_id)
    {
        $product = Product::where('id',$product_id)->with('subCategory','subCategory.category')->get();
        return $product;
    }

}
