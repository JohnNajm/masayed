<?php

namespace App\Http\Controllers;
use Auth;
use ShoppingCart;
use App\Product;
use App\Models\Order;
use App\Models\OrderProduct;
use App\Http\Requests\CheckoutRequest;
use Illuminate\Http\Request;

class CheckoutController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('pages.checkout');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        if ($this->productsAreNoLongerAvailable()){
            return back()->withErrors('Sorry! One of the items in your cart is no longer available.');
        }
        if (ShoppingCart::count() == 0){
            return back()->withErrors('Your cart is empty!');
        }
        try {

            if (auth::check()){
                $uid = Auth::user()->id;
            } else {
                $uid=null;
            }

            $order = Order::create([
                'user_id' => $uid,
                'billing_name' => $request->fname,
                'billing_email' => $request->email,
                'billing_address' => $request->address,
                'billing_city' => $request->city,
                'billing_phone' => $request->phone,
                'billing_total' => $request->total,
                'shipped' => 0,
            ]);

            foreach (ShoppingCart::all() as $item) {
                OrderProduct::create([
                    'order_id' => $order->id,
                    'product_id' => $item->id,
                    'quantity' => $item->qty,
                ]);

            }

            foreach (ShoppingCart::all() as $item){
                $product = Product::find($item->id);

                $product->update(['quantity' => $product->quantity - $item->qty]);
            }

            

            ShoppingCart::destroy();
        } catch (CardErrorException $e) {
            return back()->withErrors('Error! ' . $e->getMessage());
        }

        return view('pages.thankyou');
        
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
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
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }

    public function debug(CheckoutRequest $request){
        if ($this->productsAreNoLongerAvailable()){
            return back()->withErrors('Sorry! One of the items in your cart is no longer available');
        }
        
        try {

            if (auth::check()){
                $uid = Auth::user()->id;
            } else {
                $uid=null;
            }

            $order = Order::create([
                'user_id' => $uid,
                'billing_name' => $request->fname,
                'billing_email' => $request->email,
                'billing_address' => $request->address,
                'billing_city' => $request->city,
                'billing_phone' => $request->phone,
                'billing_total' => $request->total,
                'shipped' => 0,
            ]);

            foreach (ShoppingCart::all() as $item) {
                echo " " . $item->id . " " . $item->qty . "<br>";
            }
            echo "end of order";
            echo "_______________________________<br>";
            echo $order->id;
            //echo "ok";

            dd($request->all(),
            $uid,
            ShoppingCart::All());

            ShoppingCart::destroy();

        } catch (CardErrorException $e) {
            return back()->withErrors('Error! ' . $e->getMessage());
        }
        
    }


    protected function productsAreNoLongerAvailable()
    {
        foreach (ShoppingCart::all() as $item){
            $product = Product::find($item->id);
            if ($product->quantity < $item->qty){
                return TRUE;
            }
        }
        return FALSE;
    }
}

