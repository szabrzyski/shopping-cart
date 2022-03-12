  <nav class="blue-background navbar navbar-expand-md navbar-dark" aria-label="Navigation bar">
      <div class="container">
          <a class="navbar-brand" href="{{ route('mainPage') }}">Shopping Cart</a>
          <button class="navbar-toggler ms-auto" type="button" data-bs-toggle="collapse"
              data-bs-target="#navigationBar" aria-controls="navigationBar" aria-expanded="false"
              aria-label="Toggle navigation">
              <span class="navbar-toggler-icon"></span>
          </button>

          <div class="collapse navbar-collapse" id="navigationBar">
              <ul class="navbar-nav ms-auto">
                  <li class="nav-item">
                      <a class="nav-link @isset($activeMenu) @if ($activeMenu === 'index') active @endif @endisset"
                          aria-current="page" href="{{ route('mainPage') }}">Main page</a>
                  </li>
                  <li class="nav-item dropdown">
                  </li>
              </ul>
          </div>
      </div>
  </nav>
