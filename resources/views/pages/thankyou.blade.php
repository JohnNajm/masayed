@extends('layouts.app')
@section('content')
    @include('layouts.navbar')
    
    
        <div id="mainBody">
            <div class="container">
            <div class="row">
                @include('layouts.sidebar')
                    <div class="span9">
                        <ul class="breadcrumb" style="width:auto">
                            <li><a href="/">Home</a> <span class="divider">/</span></li>
                            <li><a href="/#">Cart</a> <span class="divider">/</span></li>

                            @if (auth::check())
                            <li>Checkout Page<span class="divider">/</span></li>
                            @else
                            <li>Guest Checkout Page<span class="divider">/</span></li>
                            @endif

                            <li class="active">Thank You</li>
                        </ul>
    <div class="">
        <h1 class=>Thank you for shopping with us</h1>
        <p class="allign-center"><a href="/">Click here to go Home.</a></p>
    </div>
    

                    </div>
            </div>
            </div>
        </div>
        