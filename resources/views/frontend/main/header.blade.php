<nav class="navbar navbar-expand-lg navbar-light bg-light">
    <div class="container px-4 px-lg-5">
        <a class="navbar-brand" href="{{route('home')}}">Funny shopping</a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation"><span class="navbar-toggler-icon"></span></button>
        <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <ul class="navbar-nav me-auto mb-2 mb-lg-0 ms-lg-4">
                <li class="nav-item"><a class="nav-link active" aria-current="page" href="{{route('home')}}">Home</a></li>
                {{-- <li class="nav-item"><a class="nav-link" href="#!">About</a></li> --}}
                {{-- <li class="nav-item link ">
                    <a class="nav-link">Shop</a>
                    <ul id="tree1" class="list-cat" >
                        @foreach ($categories_frontend as $category)
                        
                        <li class="nav-item dropdown"><a class="nav-link " href="{{route('category.show',['id'=>$category->id])}}"  >{{$category->name}}</a>
                            @if(count($category->children))
                                @include('frontend.main.category-partial ',['childs' => $category->children])
                            @endif
                            
                        </li> 
                        
                        @endforeach
                        
                    </ul>
                </li> --}}
                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle" href="#" data-toggle="dropdown"> Posts  </a>
                    <ul class="dropdown-menu">
                        @foreach ($categories_frontend as $category)
                        <li ><a class="dropdown-item" href="{{route('category.show',['id'=>$category->id])}}"  >{{$category->name}} @if(count($category->children)) &raquo @endif</a>
                            @if(count($category->children))
                                @include('frontend.main.category-partial ',['childs' => $category->children])
                            @endif
                            
                        </li> 
                        @endforeach
                      
                           {{-- <ul class="submenu dropdown-menu">
                            <li><a class="dropdown-item" href="">Submenu item 1</a></li>
                            <li><a class="dropdown-item" href="">Submenu item 2</a></li>
                            <li><a class="dropdown-item" href="">Submenu item 3 &raquo </a>
                                <ul class="submenu dropdown-menu">
                                    <li><a class="dropdown-item" href="">Multi level 1</a></li>
                                    <li><a class="dropdown-item" href="">Multi level 2</a></li>
                                </ul>
                            </li>
                            <li><a class="dropdown-item" href="">Submenu item 4</a></li>
                            <li><a class="dropdown-item" href="">Submenu item 5</a></li>
                         </ul>
                      </li>
                      <li><a class="dropdown-item" href="#"> Dropdown item 3 </a></li>
                      <li><a class="dropdown-item" href="#"> Dropdown item 4 </a> --}}
                    </ul>
                </li>
            </ul>
            {{-- <form class="d-flex">
                <button class="btn btn-outline-dark" type="submit">
                    <i class="bi-cart-fill me-1"></i>
                    Cart
                    <span class="badge bg-dark text-white ms-1 rounded-pill">0</span>
                </button>
            </form> --}}
            <div style="margin-left:10px;">
                @if(Auth::check())
                
                <button class="btn btn-success dropdown">
                    <span class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle" id="navbarDropdown" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">Xin chào {{Auth::user()->name}}</a>
                        <ul class="dropdown-menu" aria-labelledby="navbarDropdown">
                            <li><a class="dropdown-item" href="{{route('logout.user')}}">Logout</a></li>
                            
                        </ul>
                    </button>
                
                
                @else
                <a href="{{route('login')}}"  class=" btn btn-primary">Login</a>
                @endif
                
            </div>
            
        </div>
    </div>
</nav>

<!-- Header-->
{{-- <header class="bg-dark py-5">
    
</header> --}}
<div class="" style="margin-bottom: 40px">
    
        
            <div class="container px-4 px-lg-5 mt-5 bg-dark  ">
                <h1>Slider</h1>
                <div class="text-center text-white">
                    <h1 class="display-4 fw-bolder">Shop in style</h1>
                    <p class="lead fw-normal text-white-50 mb-0">With this shop hompeage template</p>
                </div>
            </div>
        
    
</div>