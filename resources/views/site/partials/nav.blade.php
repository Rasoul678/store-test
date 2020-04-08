{{--<nav class="navbar navbar-expand-sm navbar-dark bg-dark pt-0 pb-1">--}}
{{--      <div class="container m-0">--}}
{{--            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#main_nav"--}}
{{--                    aria-controls="main_nav" aria-expanded="false" aria-label="Toggle navigation">--}}
{{--                  <span class="navbar-toggler-icon"></span>--}}
{{--            </button>--}}
{{--            <div class="collapse navbar-collapse" id="main_nav">--}}
{{--                  <ul class="navbar-nav">--}}
{{--                        <li class="nav-item">--}}
{{--                              <a class="nav-link text-warning" href="{{ url('/') }}" style="font-size: 20px">Home</a>--}}
{{--                        </li>--}}
{{--                        <li class="nav-item dropdown">--}}
{{--                              <a class="nav-link dropdown-toggle text-light" href="http://example.com" id="dropdown07"--}}
{{--                                 data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" style="font-size: 20px">Categories</a>--}}
{{--                              <div class="dropdown-menu" aria-labelledby="dropdown07">--}}
{{--                                    @foreach($categories as $category)--}}
{{--                                          <a class="dropdown-item" href="{{ route('category.show', $category->slug) }}">{{ $category->name }}</a>--}}
{{--                                    @endforeach--}}
{{--                              </div>--}}
{{--                        </li>--}}
{{--                  </ul>--}}
{{--            </div>--}}
{{--      </div>--}}
{{--</nav>--}}

<nav class="navbar navbar-expand navbar-dark bg-dark pt-0 pb-3 pr-5 pl-5">
      <div class="container m-0">
            <div class="collapse navbar-collapse" id="main_nav">
                  <ul class="navbar-nav">
                        <li class="nav-item">
                              <a class="nav-link text-light mr-3 p-0" href="#" style="font-size: 18px">All Categories: </a>
                        </li>
                        @foreach($categories as $cat)
                              @foreach($cat->items as $category)
                                    @if ($category->items->count() > 0)
                                          <li class="nav-item dropdown">
                                                <a class="nav-link dropdown-toggle text-light mr-3 p-0" href="{{ route('category.show', $category->slug) }}" id="{{ $category->slug }}"
                                                   data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" style="font-size: 18px">{{ $category->name }}</a>
                                                <div class="dropdown-menu" aria-labelledby="{{ $category->slug }}">
                                                      @foreach($category->items as $item)
                                                            <a class="dropdown-item" href="{{ route('category.show', $item->slug) }}" style="font-size: 16px">{{ $item->name }}</a>
                                                      @endforeach
                                                </div>
                                          </li>
                                    @else
                                          <li class="nav-item">
                                                <a class="nav-link text-light mr-3 p-0" href="{{ route('category.show', $category->slug) }}" style="font-size: 18px">{{ $category->name }}</a>
                                          </li>
                                    @endif
                              @endforeach
                        @endforeach
                  </ul>
            </div>
      </div>
</nav>