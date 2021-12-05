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
                        <li class="active">Search Results</li>
                    </ul>
                    <h3> Search Results for {{request()->input('query')}}<small class="pull-right">  </small></h3>
                    <p>Showing {{$products->count()}} out of {{$products->total()}}.</p>	
                    <hr class="soft"/>
                    
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

                    <p>
                    All product prices exclude VAT. Your total will be calculated in cart.
                    </p>
                    <hr class="soft"/>
                    <form class="form-horizontal span6">
                        <div class="control-group">
                          <label class="control-label alignL">Sort By: </label>
                          
                              <a href="{{ route('products.index', ['category'=>request()->category, 'sort' => 'priceasc']) }}"><strong><u> By Price (Asc)</u> </strong></a></option> | 
                              <a href="{{ route('products.index', ['category'=>request()->category, 'sort' => 'pricedesc']) }}"><strong><u> By Price (Desc) </u></strong></a></option>
                              
                            
                        </div>
                      </form>
                      
                <div id="myTab" class="pull-right">
                <a href="#listView" data-toggle="tab"><span class="btn btn-large"><i class="icon-list"></i></span></a>
                <a href="#blockView" data-toggle="tab"><span class="btn btn-large btn-primary"><i class="icon-th-large"></i></span></a>
                </div>
                <br class="clr"/>
                <div class="tab-content">
                    <div class="tab-pane" id="listView">
                        
                      @foreach ($products as $product)
                      <div class="tab-pane" id="listView">
                        <div class="row">	  
                          <div class="span2">
                            <img src={{asset('storage/'.$product->image)}} alt=""/>
                          </div>
                          <div class="span4">
                            <h3>{{$product->name}}</h3>				
                            <hr class="soft"/>
                            <p>
                            {{$product->description }}
                            </p>
                          <a class="btn btn-small pull-right" href="/product/{{$product->slug}}">View Details</a>
                            <br class="clr"/>
                          </div>
                          <div class="span3 alignR">
                          
                          <h3>{{$product->presentPrice()}}</h3>
                          </label><br/>
                          
                          <form action="{{route('cart.store')}}" method="POST">
                            {{ csrf_field() }}
                            <input type="hidden" name="id" value="{{$product->id}}">
                            <input type="hidden" name="name" value="{{$product->name}}">
                            <input type="hidden" name="price" value="{{$product->price}}">
                            <button type="submit" class="btn btn-large btn-primary pull-right"> Add to cart <i class=" icon-shopping-cart"></i></button>
                            </form>
                            
                          </div>
                        </div>
                        <hr class="soft"/>
                    
                      </div>
                      @endforeach
                        

                    </div>
                
                    <div class="tab-pane  active" id="blockView">
                        <ul class="thumbnails">

                          @foreach ($products as $product)
                          <li class="span3">
                            <div class="thumbnail">
                              <a href="/product/{{$product->slug}}"><img src={{asset('storage/'.$product->image)}} alt=""/></a>
                              <div class="caption">
                                <h5>{{$product->name}}</h5>
                                <p> 
                                {{$product->details}} 
                                </p>
                              <h4 style="text-align:center"><a class="btn" href="/product/{{$product->slug}}"> 
                              <i class="icon-zoom-in"></i></a>
                              
                              <form action="{{route('cart.store')}}" method="POST">
                                {{ csrf_field() }}
                                <input type="hidden" name="id" value="{{$product->id}}">
                                <input type="hidden" name="name" value="{{$product->name}}">
                                <input type="hidden" name="price" value="{{$product->price}}">
                                <button type="submit" class="btn"> Add to cart <i class=" icon-shopping-cart"></i></button>
                                </form>
                              <a class="btn btn-primary" href="#">{{$product->presentPrice()}}</a></h4>
                              </div>
                            </div>
                          </li>
                          @endforeach

                          </ul>
                    <hr class="soft"/>
                    </div>
                </div>
                
                    {{$products->appends(request()->input())->links("pagination::tailwind")}}
                            <br class="clr"/>
                </div>
                </div>
                </div>
                </div>
                      
@endsection
