@extends('layouts.app')
@section('content')
    @include('layouts.navbar')
    @include('layouts.caroussel')
    
    
        <div id="mainBody">
            <div class="container">
            <div class="row">
                @include('layouts.sidebar')
                <div class="span9">
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
                  <div class="well well-small">
                    <h4>Featured Products <small class="pull-right"></small></h4>
                    <div class="row-fluid">
                    <div id="featured" class="carousel slide">
                    <div class="carousel-inner">
                      <div class="item active">
                      <ul class="thumbnails">

                        
                        @foreach ($featured as $feature)
                          <li class="span3">
                          <div class="thumbnail">
                          <i class="tag"></i>
                          <a href="/product/{{$feature->slug}}"><img src={{asset('storage/'.$feature->image)}} alt="" width="200px" height="200px"></a>
                          <div class="caption">
                          <h5>{{$feature->name}}</h5>
                          <h4><a class="btn" href="/product/{{$feature->slug}}">View</a> <span class="pull-right">{{$feature->presentPrice()}}</span></h4>
                          </div>
                          </div>
                          </li>
                        @endforeach

                      </ul>
                      </div>
                      </div>
                      {{-- <a class="left carousel-control" href="#featured" data-slide="prev">‹</a>
                      <a class="right carousel-control" href="#featured" data-slide="next">›</a> --}}
                      </div>
                      </div>
                  </div>
                <h4>Latest Products </h4>
                      <ul class="thumbnails">
                        @foreach ($products as $product)

                        <li class="span3">
                          <div class="thumbnail">
                            <a  href="/product/{{$product->slug}}"><img src={{asset('storage/'.$product->image)}} alt=""/></a>
                            <div class="caption">
                            <h5>{{$product->name}}</h5>
                              <p> 
                                {{$product->details}} 
                              </p>
                            
                            <h4 style="text-align:center"><a class="btn" href="/product/{{$product->slug}}">View</a>
                            <form action="{{route('cart.store')}}" method="POST">
                              {{ csrf_field() }}
                              <input type="hidden" name="id" value="{{$product->id}}">
                              <input type="hidden" name="name" value="{{$product->name}}">
                              <input type="hidden" name="price" value="{{$product->price}}">
                              @if ($product->quantity > 0)
                              <button type="submit" class="btn"> Add to cart <i class="icon-shopping-cart"></i></button>
                              @else
                              <button disabled type="submit" class="btn btn-danger">Out of Stock<i class="icon-shopping-cart"></i></button>
                              @endif
                            </form>
                            <a class="btn btn-primary" href="#">{{$product->presentPrice()}}</a></h4>
                            </div>
                          </div>
                        </li>
                        @endforeach

                      </ul>	
                </div>
            </div>
            </div>
        </div>
@endsection
