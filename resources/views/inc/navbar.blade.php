<nav class="navbar navbar-expand-lg bg-light" >
    <div class="container">
        <a class="navbar-brand" href="{{ url('/') }}">{{ __('front.laravel task') }}</a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse"
            data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false"
            aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <ul class="navbar-nav me-auto mb-2 mb-lg-0" style="color: #333 !important">
                <li class="nav-item">
                    <a class="nav-link active" aria-current="page" href="{{ url('/') }}">{{ __('front.Home') }}</a>
                </li>

                <li class="nav-item">
                    <a class="nav-link" href="{{ url('login',) }}">{{ __('front.login') }}</a>
                </li>

                <li class="nav-item">
                    @if (session()->get('locale') == 'ar')
                        <a class="nav-link" href="{{ url('change/lang', 'en') }}">English</a>

                    @else
                        <a class="nav-link" href="{{ url('change/lang', 'ar') }}">عربي</a>

                    @endif

                </li>

            </ul>
        </div>
    </div>
</nav>
