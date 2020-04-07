<nav class="navbar navbar-expand-lg navbar-dark bg-dark pt-0 pb-1">
      <div class="container m-0">
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#main_nav"
                    aria-controls="main_nav" aria-expanded="false" aria-label="Toggle navigation">
                  <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="main_nav">
                  <ul class="navbar-nav">
                        <li class="nav-item">
                              <a class="nav-link text-warning" href="{{ url('/') }}" style="font-size: 20px">Home</a>
                        </li>
                        <li class="nav-item dropdown">
                              <a class="nav-link dropdown-toggle text-light" href="http://example.com" id="dropdown07"
                                 data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" style="font-size: 20px">Categories</a>
                              <div class="dropdown-menu" aria-labelledby="dropdown07">
                                    @foreach($categories as $category)
                                          <a class="dropdown-item" href="{{ route('category.show', $category->slug) }}">{{ $category->name }}</a>
                                    @endforeach
                              </div>
                        </li>
                  </ul>
            </div>
      </div>
</nav>