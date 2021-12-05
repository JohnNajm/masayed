@extends('layouts.app')
@include('layouts.navbar')

<div id="mainBody">
    <div class="container">
    <div class="row">
        @include('layouts.sidebar')
        @section('content')
        <div class="span9">
    <ul class="breadcrumb">
		<li><a href="/">Home</a> <span class="divider">/</span></li>
		<li><a href="/products">Products Page</a> <span class="divider">/</span></li>
		<li class="active">{{$product->name}}</li>
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
                        </ul>
                    </div>
                @endif	
	<div class="row">	  
			<div id="gallery" class="span3">
            <a href={{asset('storage/'.$product->image)}} title="{{$product->name}}">
				<img src={{asset('storage/'.$product->image)}} style="width:100%" alt="{{asset('storage/'.$product->image)}}"/>
            </a>
			

			</div>
			<div class="span6 pull-right">
				<h3>{{$product->name}}  </h3>
				<small>{{$product->details}}</small>
				<hr class="soft"/>
				<div class="form-horizontal qtyFrm">
				<div class="control-group">
					<div class="control-group">
					<label class="control-label"><span>{{$product->presentPrice()}}</span></label> 
					</div>


					<div class="control-group">
						@if ($product->quantity > 0)
						@if ($product->quantity == 1)							
						<label class="control-label pull-left"><span>{{$product->quantity}} item in stock</span></label>
						<div class="controls">
					
							<form action="/cart" method="POST">
								{{ csrf_field() }}
								<input type="hidden" name="id" value="{{$product->id}}">
								<input type="hidden" name="name" value="{{$product->name}}">
								<input type="hidden" name="price" value="{{$product->price}}">
								<button type="submit" class="btn btn-large btn-primary pull-right"> Add to cart <i class=" icon-shopping-cart"></i></button>
							</form>
						</div>
						@else
						
						<label class="control-label pull-left"><span>{{$product->quantity}} items in stock</span></label>
						<div class="controls">
					
							<form action="/cart" method="POST">
								{{ csrf_field() }}
								<input type="hidden" name="id" value="{{$product->id}}">
								<input type="hidden" name="name" value="{{$product->name}}">
								<input type="hidden" name="price" value="{{$product->price}}">
								<button type="submit" class="btn btn-large btn-primary pull-right"> Add to cart <i class=" icon-shopping-cart"></i></button>
							</form>
						</div>
						@endif
						@else
						<label class="control-label"><span>Item out of Stock</span></label>
						@endif
						
					</div>


					
				</div>
				</div>
				
								
				<hr class="soft clr"/>
				<p>
				{{$product->description}}
				</p>
				<a class="btn btn-small pull-right" href="#detail">More Details</a>
				<br class="clr"/>
			<a href="#" name="detail"></a>
			<hr class="soft"/>
			</div>
	
			<div class="span9">
            <ul id="productDetail" class="nav nav-tabs">
            	<li class="active"><a href="#home" data-toggle="tab">Product Details</a></li>
            </ul>
            <div id="myTabContent" class="tab-content">
            	<div class="tab-pane fade active in" id="home">
				<h4>Product Information</h4>
				<hr>
				{!! $product->longtext !!}
				
            </div>
		
		</div>
        </div>

	</div>
</div>
    </div>
    </div>
</div>
@endsection