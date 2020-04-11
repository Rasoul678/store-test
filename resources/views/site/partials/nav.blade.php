<nav class="navbar navbar-expand navbar-dark bg-dark pt-0 pb-3 pr-5 pl-5">
      <div class="container m-0">
            <div class="collapse navbar-collapse" id="main_nav">
                  <ul class="navbar-nav">
                        @foreach($categories as $cat)
                              @foreach($cat->items as $category)
                                    @if ($category->items->count() > 0)
                                          <li class="nav-item dropdown">
                                                <a class="nav-link dropdown-toggle text-light mr-3 p-0" href="{{ route('category.show', $category->slug) }}" id="{{ $category->slug }}"
                                                   data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" style="font-size: 16px">{{ $category->name }}</a>
                                                <div class="dropdown-menu" aria-labelledby="{{ $category->slug }}">
                                                      @foreach($category->items as $item)
                                                            <a class="dropdown-item" href="{{ route('category.show', $item->slug) }}" style="font-size: 14px">{{ $item->name }}</a>
                                                      @endforeach
                                                </div>
                                          </li>
                                    @else
                                          <li class="nav-item">
                                                <a class="nav-link text-light mr-3 p-0" href="{{ route('category.show', $category->slug) }}" style="font-size: 16px">{{ $category->name }}</a>
                                          </li>
                                    @endif
                              @endforeach
                        @endforeach
                  </ul>
            </div>
      </div>
</nav>