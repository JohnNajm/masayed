<div id="sidebar" class="span3">




@if (Auth::check()) 
<div class="well well-small"><i class="fa fa-user "></i><a href="{{route('users.edit')}}">   Welcome {{Auth::user()->name}}</a></span></div>  
@else
<div class="well well-small"><i class="fa fa-times"></i> Not logged in</span></div>  
@endif




<div class="well well-small"><a id="myCart" href="/cart"><img src={{asset('images/icons/ico-cart.png')}} alt="cart">

  @if (ShoppingCart::count() > 0)
      @if (ShoppingCart::count() === 1)
      {{ShoppingCart::count()}} Item
      @else
      {{ShoppingCart::count()}} Items
      @endif
  @else
  No Items in cart
  @endif
    
  <span class="badge badge-warning pull-right">{{presentTotal(ShoppingCart::total())}}</span></a></div>
    <ul id="sideManu" class="nav nav-tabs nav-stacked">
    <li class="subMenu open" style="background-image: url('{{ asset('/images/icons/tabRepeatInactive.png')}}');"><a> ELECTRONICS [{{App\Product::count()}}] </a>
            <ul> 
            <li><a href="{{route('products.index')}}"><i class="icon-chevron-right"></i>Featured</a></li> 
            @foreach (App\Category::all() as $category)
            <li><a class="active" href={{ route('products.index', ['category'=> $category->slug]) }}><i class="icon-chevron-right"></i>{{$category->name}} ({{$category->products->count()}}) </a></li>
            @endforeach
            </ul>
        </li>
        <li class="subMenu" style="background-image: url('{{ asset('/images/icons/tabRepeatInactive.png')}}');"><a>Click Me</a>
        <ul style="display:none">
            <li><a href="/#"><i class="icon-chevron-right"></i>Dummy 1</a></li>
            <li><a href="/#"><i class="icon-chevron-right"></i>Dummy 2</a></li>												
            <li><a href="/#"><i class="icon-chevron-right"></i>Dummy 3</a></li>	
            <li><a href="/#"><i class="icon-chevron-right"></i>Dummy 4</a></li>
            <li><a href="/#"><i class="icon-chevron-right"></i>Dummy 5</a></li>
        </ul>
        </li>

    </ul>
    <br/>
      
</div>