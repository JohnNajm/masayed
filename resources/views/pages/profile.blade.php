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
                            <li class="active">{{$user->name}}<span class="divider"></span></li>
                        </ul>
    <div class="">
    <h1 class>Welcome, {{$user->name}}!</h1>
    
    @if ($user->role_id == 1)
    <a href="/admin"><button type="">Go to admin panel</button></a>
    @endif
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
            <h4>Your Orders</h4><hr>    
            @foreach ($orders as $order)
            <a href="/order/{{$order->id}}"><ul><h5>Order ID : {{$order->id}}</h5></a>
                <li>Total: {{presentTotal($order->billing_total)}}</li>
                <li>Date: {{$order->created_at}}</li>
                @if ($order->shipped == 1)
                <li>Status: Shipped <i class="fa fa-check"></i></li>
                @else
                <li>Stauts: Not Shipped <i class="fa fa-times"></i></li>
                @endif
            <small><a href="/order/{{$order->id}}">More Details...</a></small>

            </ul>
            <hr>
            @endforeach
        </div>
    </div>

    <div class="span4 pull-right">
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
    </div>

                    </div>
            </div>
            </div>
        </div>
        