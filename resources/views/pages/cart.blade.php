@extends('layouts.app')
@section('content')
    @include('layouts.navbar')
    <div id="mainBody">
        <div class="container">
        <div class="row">
            @include('layouts.sidebar')
	<div class="span9">
    <ul class="breadcrumb">
		<li><a href="/">Home</a> <span class="divider">/</span></li>
		<li class="active">Cart</li>
		<li class="active"> </li>
    </ul>
	<h3>  SHOPPING CART [ <small>{{ShoppingCart::count()}} Item(s)</small> ]</h3>	
	<hr class="soft"/>
	
	@if (!Auth::check())
	<table class="table table-bordered">
		<tr><th><div class="alert alert-danger"> You are currently not logged in, if you wish to save the order to your account please log in.</div>  </th></tr>
		 <tr> 
		 <td>
			<form class="form-horizontal" method="POST" action="{{ route('login') }}">
				@csrf
				
				<div class="control-group">
					<label class="control-label" for="inputUsername">Email</label>
					<div class="controls">
					<input id="email" placeholder="Email" type="email" class="span3 form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email">
					</div>
				</div>
				
            
              
				<div class="control-group">
				  <label class="control-label" for="inputPassword1">Password</label>
				  <div class="controls">
					<input id="password" type="password" placeholder="Password" class="span3 form-control @error('password') is-invalid @enderror" name="password" required autocomplete="current-password">
				  </div>
				</div>

				@error('password')
					<span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
					</span>
				@enderror

				<div class="control-group">
				  <div class="controls">
					<button type="submit" class="btn">Sign in</button> OR <a href="/register" class="btn">Register Now!</a>
				  </div>
				</div>
				<div class="control-group">
					<div class="controls">
					  <a href="{{ route('password.request') }}" style="text-decoration:underline">Forgot password ?</a>
					</div>
				</div>
			</form>
		  </td>
		  </tr>
	</table>	
	@else
		
	@endif
		

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

			@if (ShoppingCart::count() > 0)
			<table class="table table-bordered">
				<thead>
				<tr>
					<th>Product</th>
					<th>Description</th>
					<th>Quantity</th>
					<th>Price</th>
					<th>Total</th>
					<th> </th>
				</tr>
				</thead>
				<tbody>

					@foreach (ShoppingCart::all() as $item)
					<tr>
						<td><a href="/product/{{$item->product->slug}}"><img width="60" src={{asset('storage/'.$item->product->image)}} alt=""/></a></td>
						<td>{{$item->product->name}}<br/>{{$item->product->details}}
						{{-- <br>{{$item->rawId()}} --}}
						</td>
						<td>
						<div class="input">
							{{$item->qty}}
							{{-- <button class="btn" type="button"><i class="icon-minus"></i></button>
							<button class="btn" type="button"><i class="icon-plus"></i></button> --}}
							{{-- <button class="btn btn-danger" type="button"><i class="icon-remove icon-white"></i></button> --}}
							
							<form action="{{route('cart.destroy', $item->rawId())}}" method="POST">
							{{ csrf_field() }}
							{{method_field('DELETE')}}
							<button class="buttonhoverablered" type="submit">Remove<i class="icon-remove icon-white"></i></button>
							</form>
						</div>
						</td>
						<td>{{presentPrice($item->price)}}</td>
						<td>{{presentTotal($item->price)}}</td>
						
					</tr>	
					@endforeach

					<tr>
						<td colspan="6" style="text-align:left"><strong>TOTAL </strong></td>
						<td class="label label-important" style="display:block"> <strong> {{presentTotal(ShoppingCart::total())}} </strong></td>
					</tr>
					</tbody>
				</table>
			@elseif (Shoppingcart::count() == 0)

			<h1> Cart is currently Empty. </h1>
			
			@endif

	
                {{-- <tr>
                  <td> <img width="60" src="themes/images/products/4.jpg" alt=""/></td>
                  <td>MASSA AST<br/>Color : black, Material : metal</td>
				  <td>
					<div class="input-append"><input class="span1" style="max-width:34px" placeholder="1" id="appendedInputButtons" size="16" type="text"><button class="btn" type="button"><i class="icon-minus"></i></button><button class="btn" type="button"><i class="icon-plus"></i></button><button class="btn btn-danger" type="button"><i class="icon-remove icon-white"></i></button>				</div>
				  </td>
                  <td>$120.00</td>
                  <td>$110.00</td>
                </tr> --}}

				
		
		
            {{-- <table class="table table-bordered">
			<tbody>
				 <tr>
                  <td> 
				<form class="form-horizontal">
				<div class="control-group">
				<label class="control-label"><strong> VOUCHERS CODE: </strong> </label>
				<div class="controls">
				<input type="text" class="input-medium" placeholder="CODE">
				<button type="submit" class="btn"> ADD </button>
				</div>
				</div>
				</form>
				</td>
                </tr>
				
			</tbody>
			</table> --}}
			
					
	<a href="/products" class="btn btn-large"><i class="icon-arrow-left"></i> Continue Shopping </a>

	@if (ShoppingCart::Count() > 0)
		@if (!auth::check())
		<a href="/guestCheckout" class="btn btn-large pull-right">Checkout as Guest<i class="icon-arrow-right"></i></a>	
				
			@else
		<a href="/checkout" class="btn btn-large pull-right">Checkout <i class="icon-arrow-right"></i></a>
			
			@endif	
			
	@endif
	
	
</div>
</div></div>
</div>
@endsection