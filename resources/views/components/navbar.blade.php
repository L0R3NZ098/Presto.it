<header id="navbar_top" class="navbar d-block navbar-sticky navbar-expand-lg bg-light  ">
    <div class="container">
        <a class="navbar-brand" href="{{ route('homepage') }}">Presto.it</a>
        <!-- Sezione di destra -->

        <ul class="navbar-right-side navbar-toolbar d-flex align-items-center order-lg-3">
            <li class="nav-item dropdown">
                <a class="nav-link dropdown-toggle" href="" data-bs-toggle="dropdown"><span
                        class="{{ __('nav.lang') }}"></span></a>
                <ul class="dropdown-menu language">
                    <li class="nav-item"><x-_locale lang='it' nation='it' /></li>
                    <li class="nav-item"><x-_locale lang='en' nation='gb' /></li>
                    <li class="nav-item"><x-_locale lang='es' nation='es' /></li>
                </ul>
            </li>
            <li>
                <button class="navbar-toggler" type="button" data-bs-toggle="collapse"
                    data-bs-target="#navbarCollapse">
                    <span class="navbar-toggler-icon"></span>
                </button>
            </li>
            <li>
                <a class="navbar-tool d-none d-lg-flex me-2" href="javascript:void(0)" data-bs-toggle="collapse"
                    data-bs-target="#searchBox" role="button" aria-expanded="false" aria-controls="searchBox">
                    <span class="navbar-tool-tooltip">{{ __('nav.research') }}</span>
                    <div class="navbar-tool-icon-box">
                        <i class="fa-solid fa-magnifying-glass fw-bolder"></i>
                    </div>
                </a>
            </li>
            <li class="dropdown no-mobile">
                <a class="navbar-tool dropdown ms-lg-2" href="#signin-modal" data-bs-toggle="dropdown">
                    <span class="navbar-tool-tooltip">Account</span>
                    <div class="navbar-tool-icon-box">
                        <i class="fa-regular fa-user"></i>
                    </div>
                    <ul class="dropdown-menu">
                        @auth
                            <li><a class="dropdown-item" href="{{ route('user.profile') }}">{{ __('nav.profile') }}</a></li>
                            <li><a class="dropdown-item"
                                    href="{{ route('user.profile-announcements') }}">{{ __('nav.myAds') }}</a>
                            </li>
                            @if (Auth::user()->is_admin || Auth::user()->is_reviewer)
                                <li><a class="dropdown-item" href="{{ route('dashboard.announcements') }}">Dashboard</a>
                                </li>
                            @endif
                            <li>
                                <hr class="dropdown-divider">
                            </li>
                            <li>
                                <a class="dropdown-item" href="#"
                                    onclick="event.preventDefault();getElementById('form-logout').submit()">Logout</a>
                                <form action="/logout" method="post" id="form-logout" class="d-none">
                                    @csrf
                                </form>
                            </li>
                        @endauth
                        @guest
                            <li><a class="dropdown-item" href="/register">{{ __('nav.register') }}</a></li>
                            <li><a class="dropdown-item" href="/login">Login</a></li>
                        @endguest
                    </ul>
                </a>
            </li>
            <li>
                <a class="btn btn-sm btn-primary rounded-1 ms-lg-4 ms-2"
                    href="{{ route('announcements.create') }}">{{ __('nav.create') }}</a>
            </li>
        </ul>

        <!-- Sezione di sinistra-->
        <div class="collapse navbar-collapse me-auto order-lg-2" id="navbarCollapse">
            <!-- Search (mobile)-->
            <div class="d-lg-none py-3">
                <div class="input-group"><i
                        class="ci-search position-absolute top-50 start-0 translate-middle-y ms-3"></i>
                    <input class="form-control rounded-start" type="text" placeholder="Cosa stavi cercando?">
                </div>
            </div>
            <!-- Primary menu-->
            <ul class="navbar-nav">
                <li class="nav-item"><a class="nav-link" href="{{ route('homepage') }}">Home</a></li>
                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle" href="#"
                        data-bs-toggle="dropdown">{{ __('nav.category') }}</a>
                    <ul class="dropdown-menu">
                        @foreach ($categories as $category)
                            <li><a class="dropdown-item" href="{{ route('searchByCategory', $category->id) }}">
                                    @if (session()->get('locale') == 'it')
                                        {{ $category->name }}
                                    @elseif (session()->get('locale') == 'en')
                                        {{ $category->name_en }}
                                    @else
                                        {{ $category->name_es }}
                                    @endif
                                </a>
                            </li>
                        @endforeach
                    </ul>
                </li>
                <li class="nav-item"><a class="nav-link"
                        href="{{ route('announcements.index') }}">{{ __('nav.allAnnouncement') }}</a>
                </li>

                <li class="nav-item"><a class="nav-link no-desktop"
                        href="{{ route('user.profile') }}">{{ __('nav.profile') }}</a></li>

        </div>
    </div>
    <!-- Search collapse-->
    <form action="{{ route('announcements.search') }}" method="GET">
        <div class="search-box collapse" id="searchBox">
            <div class="container py-2">
                <div class="input-group"><i
                        class="ci-search position-absolute top-50 start-0 translate-middle-y ms-3"></i>
                    <input class="form-control rounded-start" name="searched" type="text"
                        placeholder="{{ __('nav.what_you_search') }}">
                    <button type="submit" class="btn btn-primary">{{ __('nav.find') }}</button>
                </div>
            </div>
        </div>
    </form>
</header>
