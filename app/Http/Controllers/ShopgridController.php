<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Http\Request;

class ShopgridController extends Controller
{
    public function index()
    {
        return view('front-end.home.home');
    }
    public function category($id)
    {
        return view('front-end.category.index',['products'=>Product::where('category_id',$id)->get()]);
    }
    public function details($id)
    {
        return view('front-end.product.index',[
            'product'=> Product::find($id)
        ]);
    }
}
