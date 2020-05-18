<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    @include('inc.head')
</head>
<body>
    <div id="app">
        <div class="m-frontend">
            <div class="m-frontend__container">
                <div class="m-frontend__container__header">
                    <div class="m-frontend__container__header__logo">
                        <img src="/pictures/dragon-small.png" class="m-frontend__container__header__logo__img">
                        <span>De Gouden Draak</span>
                        <img src="/pictures/dragon-small-flipped.png" class="m-frontend__container__header__logo__img">
                    </div>

                    <div class="m-frontend__container__header__marquee">
                        <a href="{{ route('home') }}">
                            <marquee behavior="scroll" direction="left">
                                Welkom bij De Gouden Draak. Klik op deze tekst om de aanbiedingen van deze week te zien!
                            </marquee>
                        </a>
                    </div>

                    <div class="m-frontend__container__header__logo">
                        <img src="/pictures/dragon-small.png" class="m-frontend__container__header__logo__img">
                        <span>De Gouden Draak</span>
                        <img src="/pictures/dragon-small-flipped.png" class="m-frontend__container__header__logo__img">
                    </div>
                </div>

                <nav class="m-frontend__container__nav">
                    <img src="/pictures/dragon-small.png" class="m-frontend__container__nav__img">
                    <div class="m-frontend__container__nav__center">
                        <h2>Chinees Indische Specialiteiten</h2>
                        <h1>De Gouden Draak</h1>

                        <div class="m-frontend__container__nav__center__menu">
                            <a href="" class="m-frontend__container__nav__center__menu__item">Menukaart</a>
                            <a href="" class="m-frontend__container__nav__center__menu__item">Nieuws</a>
                            <a href="" class="m-frontend__container__nav__center__menu__item">Contact</a>
                        </div>
                    </div>
                    <img src="/pictures/dragon-small-flipped.png" class="m-frontend__container__nav__img">
                </nav>

                <div class="m-frontend__container__content">
                    @yield('content')
                </div>
            </div>
        </div>
    </div>
</body>
</html>
