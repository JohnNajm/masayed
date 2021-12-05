<?php

namespace App\Http\Controllers;

use App\Models\Order;
use Illuminate\Http\Request;

class UsersController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
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
        //
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
    public function edit()
    {   
        $uid = auth()->user()->id;
        $orders = Order::all()->where('user_id', '=', $uid)->sortby('shipped');
        return view('pages.profile')->with(['user' => auth()->user(),
                                            'orders' => $orders]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request)
    {
        $request->validate([
            'name' => ['required', 'string', 'max:255'],
            'email' => 'required|string|email|max:255|unique:users,email,'.auth()->id(),
            'password' => ['sometimes', 'nullable', 'string', 'min:8', 'confirmed'],
        ]);
        
        $user = auth()->user();
        $input = $request->except('password', 'password_confirmation');

        if (! $request->filled('password')){
            $user->fill($input)->save();
            return back()->with('success_message', 'Profile updated successfully!');
        }

        $user->password = bcrypt($request->password);
        $user->fill($input)->save();
        return back()->with('success_message', 'Profile and Password updated successfully!');

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

    public function showOrder($id)
    {
        $uid = auth()->user()->id;
        $orders = Order::all()->where('user_id', '=', $uid)->sortby('shipped');

        $order = Order::where('id',$id)->firstOrFail();
        $products = $order->products;


        if ($order->user_id == $uid) {
            return view('pages.order')->with(['user' => auth()->user(),
                                            'products'=> $products,
                                            'order' => $order,
                                            'id' => $id]);
    
        } else {
            return back()->withErrors('No such order.');

        }
        
        
}
}