<nav class="navbar navbar-expand-md bg-black sticky-top border-bottom" data-bs-theme="dark">
    <div class="container" bis_skin_checked="1">
        <a class="navbar-brand logo" href="/">
            <img  width ='150vmin' height='70vmin' alt="" src="{{ Vite::asset('public/img/logo.png') }}">
        </a>
        <button class="navbar-toggler" type="button" data-bs-toggle="offcanvas" data-bs-target="#offcanvas" aria-controls="offcanvas" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="offcanvas offcanvas-end" tabindex="-1" id="offcanvas" aria-labelledby="offcanvasLabel" bis_skin_checked="1">
            <div class="offcanvas-body" bis_skin_checked="1">
                <ul class="navbar-nav flex-grow-1 justify-content-between">
                    <li class="nav-item"><a class="nav-link nav-el" href="/">Главная</a></li>
                    <li class="nav-item"><a class="nav-link nav-el" href="/company">Компания</a></li>
                    <li class="nav-item"><a class="nav-link nav-el" href="/projects">Наши работы</a></li>
                    <li class="nav-item"><a class="nav-link nav-el" href="/services">Услуги</a></li>
                    <li class="nav-item"><a class="nav-link nav-el" href="/customers">Наши заказчики</a></li>
                    <li class="nav-item"><a class="nav-link" href="/contacts" id="tooltip" data-bs-toggle="tooltip"  data-bs-custom-class="custom-tooltip"
                                            data-bs-placement="bottom" title="Свяжитесь с нами">
                            <svg  xmlns="http://www.w3.org/2000/svg" width="32" height="32" fill="currentColor" class="bi bi-headset" viewBox="0 0 16 16">
                                <path d="M8 1a5 5 0 0 0-5 5v1h1a1 1 0 0 1 1 1v3a1 1 0 0 1-1 1H3a1 1 0 0 1-1-1V6a6 6 0 1 1 12 0v6a2.5 2.5 0 0 1-2.5 2.5H9.366a1 1 0 0 1-.866.5h-1a1 1 0 1 1 0-2h1a1 1 0 0 1 .866.5H11.5A1.5 1.5 0 0 0 13 12h-1a1 1 0 0 1-1-1V8a1 1 0 0 1 1-1h1V6a5 5 0 0 0-5-5"/>
                            </svg>
                        </a></li>
                </ul>
            </div>
        </div>
    </div>
</nav>

