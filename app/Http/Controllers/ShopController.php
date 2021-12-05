<?php

namespace App\Http\Controllers;

use App\Product;
use App\Category;
use Illuminate\Http\Request;

class ShopController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $pagination= 9;
        $categories = Category::all();

            if (request()->category) {
                $products = Product::with('Category')->whereHas('Category', function ($querry){
                    $querry->where('slug', request()->category);
                });
                $categoryName = optional($categories->where('slug', request()->category)->first())->name;
            } else {
                $products = Product::where('isFeatured', true);   
                $categoryName = 'Featured Products';
            }
            
            if(request()->sort == 'priceasc') {
                $products = $products->orderBy('price')->paginate($pagination);
            } elseif(request()->sort == 'pricedesc') {
                $products = $products->orderBy('price','desc')->paginate($pagination);
            } else {
                $products = $products->paginate($pagination);
            }
    
            return view('pages.products',[
            'products'=>$products,
            'categories'=>$categories,
            'categoryName'=>$categoryName]);

        // $products = Product::paginate(6);
        // return view('pages.products')->with('products', $products);
    }
    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */

    public function show($slug)
    {
        $product = Product::where('slug', $slug)->firstOrFail();
        return view('pages.product')->with('product', $product);
    }

    public function search(Request $request)
    {
        // return("Working");
        // dd($request);
        $request->validate([
            'query' =>'required|min:3',
        ]);

        $query = $request->input('query');
        $products = Product::where('name', 'like', "%$query%")
                            ->orWhere('details', 'like', "%$query%")
                            ->orWhere('description', 'like', "%$query%")
                            ->paginate(9);
        return view('pages.search')->with('products', $products);
    }

}
