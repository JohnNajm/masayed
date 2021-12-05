<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">

    {{-- <link rel="stylesheet" href="{{asset('css/test.css')}}"> --}}
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" integrity="sha384-wvfXpqpZZVQGK6TAh5PVlGOfQNHSoD2xbE+QkPxCAFlNEevoEH3Sl0sibVcOQVnN" crossorigin="anonymous">
    <link id="callCss" rel="stylesheet" href="{{asset('css/bootstrap.min.css')}}" media="screen"/>
    <link href="{{asset('css/base.css')}}" rel="stylesheet" media="screen"/>
<!-- Bootstrap style responsive -->	
	<link href="{{asset('css/bootstrap-responsive.min.css')}}" rel="stylesheet"/>
	<link href="{{asset('css/font-awesome.css')}}" rel="stylesheet" type="text/css">
<!-- Google-code-prettify -->	
	<link href="{{asset('js/google-code-prettify/prettify.css')}}" rel="stylesheet"/>
<!-- fav and touch icons -->
    <link rel="shortcut icon" href={{asset('images/icons/favicon.ico')}}>
    {{-- <link rel="shortcut icon" href="themes/images/ico/favicon.ico">
    <link rel="apple-touch-icon-precomposed" sizes="144x144" href="themes/images/ico/apple-touch-icon-144-precomposed.png">
    <link rel="apple-touch-icon-precomposed" sizes="114x114" href="themes/images/ico/apple-touch-icon-114-precomposed.png">
    <link rel="apple-touch-icon-precomposed" sizes="72x72" href="themes/images/ico/apple-touch-icon-72-precomposed.png">
    <link rel="apple-touch-icon-precomposed" href="themes/images/ico/apple-touch-icon-57-precomposed.png"> --}}
    <style type="text/css" id="enject"></style>

    <title>{{config('app.name', 'No title why?')}}</title>
</head>

<body>
  @include('layouts.navbar')
  <div id="mainBody">
    <div class="container">
    <div class="row">
        @include('layouts.sidebar')
            <div class="span9">
            <ul class="breadcrumb" style="width:auto">
              <li><a href="/">Home</a> <span class="divider">/</span></li>
                <li><a href="/cart">Cart</a> <span class="divider">/</span></li>
                @if (auth::check())
                <li class="active">Checkout Page</li>
                @else
                <li class="active">Guest Checkout Page</li>
                @endif
            </ul>

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
            </div>
          </ul>
				</div>
			@endif

                <div class="span4">
                    <div class="well">
                    <h4>Delivery Information</h4>

                    <form action="{{route('checkout.store')}}" method="POST">
                      {{ csrf_field() }}
                      <div class="control-group">
                        <label class="control-label" for="fname">Full Name</label>
                        <div class="controls">
                          @if (auth::check())
                              <input class="span3" style="padding:12px"  type="text" name="fname" placeholder="Name" value="{{auth()->user()->name}}" required>
                          @else
                          <input class="span3" style="padding:12px"  type="text" name="fname" placeholder="Name" required>
                          @endif
                        </div>
                      </div>
                      <div class="control-group">
                        <label class="control-label" for="email">Email</label>
                        <div class="controls">
                          @if (auth::check())
                        <input class="span3" style="padding:12px"  type="text" name="email" placeholder="Email" required value="{{auth()->user()->email}}" readonly>
                          @else
                          <input class="span3" style="padding:12px"  type="text" name="email" placeholder="Email" required>
                          @endif
                        </div>
                      </div>
                      <div class="control-group">
                        <label class="control-label" for="address">Address</label>
                        <div class="controls">
                          <input class="span3" style="padding:12px" type="text" name="address" placeholder="Address" required>
                        </div>
                      </div>
                      <div class="control-group">
                        <label class="control-label" for="city">City</label>
                        <div class="controls">
                          <input class="span3" style="padding:12px"  type="text" name="city" placeholder="City" required>
                        </div>
                      </div>
                      <div class="control-group">
                        <label class="control-label" for="phone">Phone Number</label>
                        <div class="controls">
                          <input class="span3" style="padding:12px"  type="text" name="phone" placeholder="70123456" required>

                          <input type="hidden" name="total" value="{{calculateTotal(ShoppingCart::total())}}"> 
                        </div>
                      </div>
                    <hr>

                    
                        <button class="btn btn-success">Submit Order</button>
                      </form>
                    </div>

                    </div>
                    {{-- <div class="span1"> &nbsp;</div> --}}
                        
                <div class="span4 pull-right">
                    <div class="well">
                    <h4>Cart Content</h4><hr>
                    @foreach (ShoppingCart::all() as $item)
                    
                    <h5>{{$item->name}}</h5>
                    <small>Quantity: {{$item->qty}}</small>
                    <small class="pull-right">{{presentTotal($item->price)}}</small>
                    <hr>
                    @endforeach
                    <h4>Total</h4>
                    <p>{{presentTotal(ShoppingCart::total())}}</p>
                </div>
                </div> 


              </div>
    </div>
    </div>
@include('layouts.footer')


</body>
</html>


