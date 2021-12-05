<div id="header">
  <div class="container">
  <div id="welcomeLine" class="row">
    <div class="span6"> </div>
    <div class="span6">
    <div class="pull-right">
          {{-- <span class="btn btn-mini">{{presentTotal(ShoppingCart::total())}}</span>
      <a href="/cart"><span class="btn btn-mini btn-primary"><i class="icon-shopping-cart"></i>[{{ShoppingCart::count()}}] Items in your cart </span> </a>   --}}
    </div>
    </div>
  </div>

  <div id="logoArea" class="navbar">
  <a id="smallScreen" data-target="#topMenu" data-toggle="collapse" class="btn btn-navbar">
    <span class="icon-bar"></span>
    <span class="icon-bar"></span>
    <span class="icon-bar"></span>
  </a>
    <div class="navbar-inner">
      <a class="brand" href="/"><img src="" alt="WebShop 2020"/></a>
    <form class="form-inline navbar-search" method="GET" action="{{route('search')}}">
    <input id="query" name="query" value="{{request()->input('query')}}" class="srchTxt" type="text" placeholder="Search"> 
        <button type="submit" id="submitButton" class="btn btn-primary"><i class="fa fa-search"></i> Go</button>
      </form>

      <ul id="topMenu" class="nav pull-right">
        <li class=""><a href="/contact" role="button" data-toggle="modal" style="padding-right:0"><span class="btn btn-large">Contact Us</span></a></li>
        <li class="">
          <a href="/cart" role="button" data-toggle="modal" style="padding-right:0"><span class="btn btn-large btn-warning"><i class="fa fa-shopping-cart"></i> Cart</span></a> 
        </li>

      <li class="">
    
  @if (Auth::check()) 

  <a href="" role="button" onclick="event.preventDefault(); document.getElementById('logout-form').submit();" data-toggle="modal" style="padding-right:0"><span class="btn btn-large btn-danger"><i class="fa fa-user-times"></i> Logout</span></a>
  <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
    {{ csrf_field() }}
  </form>

  @else
  <a href="/login" role="button" data-toggle="modal" style="padding-right:0"><span class="btn btn-large btn-success"><i class="fa fa-user"></i> Login</span></a> 
  {{-- <a href="/register" role="button" data-toggle="modal" style="padding-right:0"><span class="btn btn-large btn-success">Register</span></a>   --}}
  @endif
  
      </li>
    </ul>


    </div>
  </div>
  </div>
  </div>