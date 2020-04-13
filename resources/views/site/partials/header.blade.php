<nav class="navbar navbar-expand-md navbar-light bg-light border-bottom border-dark">
    <a class="navbar-brand" href="{{ url('/') }}">Home</a>
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent-3"
            aria-controls="navbarSupportedContent-3" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarSupportedContent-3">
        <ul class="navbar-nav mr-auto">
            @foreach($categories as $cat)
                @foreach($cat->items as $category)
                    @if ($category->items->count() > 0)
                        <li class="nav-item">
                            <a class="nav-link dropdown-toggle text-dark" href="{{ route('category.show', $category->slug) }}" id="{{ $category->slug }}"
                               data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" style="font-size: 16px">{{ $category->name }}</a>
                            <div class="dropdown-menu" aria-labelledby="{{ $category->slug }}">
                                @foreach($category->items as $item)
                                    <a class="dropdown-item" href="{{ route('category.show', $item->slug) }}" style="font-size: 14px">{{ $item->name }}</a>
                                @endforeach
                            </div>
                        </li>
                    @else
                        <li class="nav-item">
                            <a class="nav-link text-dark" href="{{ route('category.show', $category->slug) }}" style="font-size: 16px">{{ $category->name }}</a>
                        </li>
                    @endif
                @endforeach
            @endforeach
        </ul>
        <ul class="navbar-nav ml-auto nav-flex-icons">
            <li class="nav-item mr-md-5">
                <form action="{{ route('search') }}" class="search-wrap my-2 my-md-0">
                    <div class="input-group">
                        <input type="search" name="search" class="form-control" placeholder="Search">
                    </div>
                </form>
            </li>
            <li class="nav-item mr-md-2">
                <a class="nav-link waves-effect waves-light" href="{{route('cart.index')}}" >
                    <i class="fa fa-shopping-cart"></i>
                </a>
            </li>
            <li class="nav-item dropdown">
                @guest
                    <a class="nav-link dropdown-toggle" id="navbarDropdownMenuLink" data-toggle="dropdown" aria-haspopup="true"
                       aria-expanded="false">
                        <i class="fas fa-user text-mute"></i>
                    </a>
                @else
                    <a class="nav-link dropdown-toggle" id="navbarDropdownMenuLink" data-toggle="dropdown" aria-haspopup="true"
                       aria-expanded="false">
                        <i class="fas fa-user text-dark"></i>
                    </a>
                @endguest
                <div class="dropdown-menu dropdown-menu-right dropdown-default" aria-labelledby="navbarDropdownMenuLink">
                    @guest
                    <a class="dropdown-item" href="{{ route('login') }}">Login</a>
                    <a class="dropdown-item" href="{{ route('register') }}">Sign Up</a>
                    @else
                        @can('add product')
                            <a class="dropdown-item" href="{{route('admin.dashboard')}}">{{ Auth::user()->full_name }}</a>
                        @else
                            <a class="dropdown-item" href="{{route('profile.show')}}">{{ Auth::user()->full_name }}</a>
                        @endcan
                            <a class="dropdown-item" href="{{ route('logout') }}"
                               onclick="event.preventDefault();
                                                                   document.getElementById('logout-form').submit();">
                                Logout
                            </a>
                            <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                @csrf
                            </form>
            @endguest
                </div>
            </li>
        </ul>
    </div>
</nav>
