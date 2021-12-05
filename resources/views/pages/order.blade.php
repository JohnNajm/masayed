@extends('layouts.app')
@section('content')
    @include('layouts.navbar')
    
    
        <div id="mainBody">
            <div class="container">
            <div class="row">
                @include('layouts.sidebar')
                    <div class="span9">
                        <ul class="breadcrumb" style="width:auto">
                            <li>Users<span class="divider">/</span></li>
                            <li><a href="/profile">{{$user->name}}</a><span class="divider">/</span></li>
                            <li class="active">Order {{$id}}</a></li>
                        </ul>
    <div class="">
    <h1 class>Order {{$id}}</h1>
    </div>
    @if (session()->has('success_message'))
    <div class="alert alert-success">
        {{session()->get('success_message')}}
    </div>
@endif

@if(count($errors) > 0)
    <div class="alert alert-danger">
        <ul>
            @foreach ($errors->all() as $error)
            <li>{{$error}}</li>
            @endforeach
        </ul>
    </div>
@endif
    <hr>


    <div class="span4">
        <div class="well">
            <h4>Order Content</h4>
            <small>Date Created : {{$order->created_at}}</small>
            @foreach ($products as $product)
                <hr>
                <li style="margin-bottom: 10px">Product Name: {{$product->name}}</li>
                <li>Product Price: {{$product->presentTotal()}}</li>
                <li>Product Quantity: {{$product->pivot->quantity}}</li>    
            @endforeach
            <br>
            <i class="fa fa-money"></i> Total: {{presentPrice($order->billing_total)}}<hr>
            <h4>Delivery Details</h4> <hr>
            <i class="fa fa-user"></i> Recipient Name: {{$order->billing_name}} <br>
            <i class="fa fa-map-marker"></i> Recipient Address: {{$order->billing_address}}, {{$order->billing_city}} <br>
            <i class="fa fa-phone"></i> Recipient Phone: {{$order->billing_phone}} <br> <br>
                @if ($order->shipped == 1)
                <li>Status: Shipped <i class="fa fa-check"></i></li>
                <li>Date Shipped: {{$order->updated_at}}</li>
                @else
                <li>Stauts: Not Shipped <i class="fa fa-times"></i></li>
                @endif
        </div>
    </div>

    {{-- <div class="span4 pull-right">
        <div class="well">
        <h4>User Details</h4><hr>
        <form action="{{route('users.update')}}" method="post">
            @method('patch')
            {{ csrf_field() }}
            <div class="control-group">
                <label class="control-label" for="fname">Full Name</label>
                <div class="controls">
                <input class="span3" style="padding:12px"  type="text" name="name" value="{{old('email', $user->name)}}">
            </div>
            </div>

            <div class="control-group">
                <label class="control-label" for="email">Email</label>
                <div class="controls">
                <input class="span3" style="padding:12px"  type="text" name="email" value="{{old('email', $user->email)}}">
            </div>
            </div>

            <div class="control-group">
                <label class="control-label" for="pass">New Password</label>
                <div class="controls">
                <input class="span3" style="padding:12px"  type="password" name="password"> <br>
                <small>Leave password field empty to keep current password</small>
            </div>
            </div>
            <br>

            <div class="control-group">
                <label class="control-label" for="npass">Confirm Password</label>
                <div class="controls">
                <input class="span3" style="padding:12px"  type="password" name="password_confirmation">
            </div>
            </div>
            <hr>
            <button type="submit">Submit</button>
        </form>
    </div>
    </div> --}}

                    </div>
            </div>
            </div>
        </div>
        
