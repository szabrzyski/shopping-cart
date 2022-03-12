  <nav class="niebieskie-tlo navbar navbar-expand-md navbar-dark" aria-label="Pasek nawigacji">
      <div class="container">
          <a class="navbar-brand" href="{{ route('glowna') }}">Shopping Cart</a>
          <button class="navbar-toggler ms-auto" type="button" data-bs-toggle="collapse"
              data-bs-target="#gornyPasekNawigacji" aria-controls="gornyPasekNawigacji" aria-expanded="false"
              aria-label="Toggle navigation">
              <span class="navbar-toggler-icon"></span>
          </button>

          <div class="collapse navbar-collapse" id="gornyPasekNawigacji">
              <ul class="navbar-nav ms-auto">
                  <li class="nav-item">
                      <a class="nav-link @isset($aktywneMenu) @if ($aktywneMenu === 'index') active @endif @endisset"
                          aria-current="page" href="{{ route('glowna') }}">Strona główna</a>
                  </li>
                  <li class="nav-item dropdown">
                  </li>
              </ul>
          </div>
      </div>
  </nav>
