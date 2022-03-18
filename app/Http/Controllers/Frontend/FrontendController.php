<?php

namespace App\Http\Controllers\Frontend;

use App\Models\Category;
use App\Models\Subcategory;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Product;

class FrontendController extends Controller
{
    public function index()
    {
        return view('frontend.index');
    }

    public function category($category_slug)
    {
        $category = Category::where('slug',$category_slug)->first();
        if($category)        
        {
            $data = [
                'slug' => $category->slug,
                'id' => $category->id
            ];
            return view('frontend.sub-category')->with($data);
        }
        else
        {
            return redirect('/')->with('message','No such category found');
        }
    }

    public function subCategory($category_slug, $sub_category_slug)
    {
        $sub_category = Subcategory::where('slug',$sub_category_slug)->first();
        if($sub_category)        
        {
            $data = [
                'slug' => $sub_category->slug,
                'id' => $sub_category->id
            ];
            return view('frontend.product')->with($data);
        }
        else
        {
            return redirect('/')->with('message','No Such Sub Category found');
        }
    }

    public function product($category_slug, $sub_category_slug, $product_slug)
    {
        $sub_category = Subcategory::where('slug',$sub_category_slug)->first();
        if($sub_category)        
        {
            $product = Product::where('slug',$product_slug)->first();
            if($product)        
            {
                $data = [
                    'slug' => $product->slug,
                    'id' => $product->id
                ];
                return view('frontend.view-product')->with($data);
            }
            else
            {
                return redirect('/')->with('message','No Such Sub Category found');
            }
        }
        else
        {
            return redirect('/')->with('message','No Such Sub Category found');
        }
    }
    
}
