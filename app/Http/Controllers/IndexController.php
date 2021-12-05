<?php

namespace App\Http\Controllers;

use App\Category;
use App\Product;
use Illuminate\Http\Request;

class IndexController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $products = Product::inRandomOrder()->take(9)->get();
        $featured = Product::inRandomOrder()->where('isFeatured', '=', '1')->take(4)->get();
        $categories = Category::all();

        return view('pages.index')->with(['products'=>$products,
        'featured'=>$featured,
        'categories'=>$categories]);
    }

    
}
