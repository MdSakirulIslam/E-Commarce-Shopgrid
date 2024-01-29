<?php

namespace App\Http\Controllers;

use App\Models\Category;
use Illuminate\Http\Request;

class CategoryController extends Controller
{
    public function index(){
        return view('admin.category.index');
    }
    public function create(){
        return view('admin.category.add');
    }
    public function store(Request $request){
        Category::newCategory($request);
        return back()->with('message','Category info created successfully');
    }
}
