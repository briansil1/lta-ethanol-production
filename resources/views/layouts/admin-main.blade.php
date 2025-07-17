<!DOCTYPE html>
<html lang="{{ app()->getLocale() }}" class="js" prefix="og: http://ogp.me/ns#" style="height: 100%;">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="robots" content="index, follow, max-image-preview:large, max-snippet:-1, max-video-preview:-1">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    {{--  FAVICON TAGS  --}}
    <link rel="apple-touch-icon" sizes="180x180" href="{{ asset('apple-touch-icon.png') }}">
    <link rel="icon" type="image/png" sizes="32x32" href="{{ asset('favicon-32x32.png') }}">
    <link rel="icon" type="image/png" sizes="16x16" href="{{ asset('favicon-16x16.png') }}">
    <link rel="manifest" href="{{ asset('site.webmanifest') }}">
    <link rel="mask-icon" href="{{ asset('safari-pinned-tab.svg') }}" color="#002f60">
    <meta name="msapplication-TileColor" content="#002f60">
    <meta name="theme-color" content="#002f60">
    {{--  END FAVICON TAGS  --}}

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <link rel="stylesheet" href="{{ asset('css/style.css') }}">
    <link rel="stylesheet" href="{{ asset('css/custom.css') }}">
    @stack('styles')
    <title>U.S. GRAINS | @yield('title', __('main.title'))</title>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js" id="jquery-js"></script>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Open+Sans:wght@400;500&family=Oswald:wght@400;600&display=swap" rel="stylesheet">
    @section('scriptvars')
    @show
    @stack('scripts')
</head>
<body class="page-template-default page page-id-32 page-parent page-child parent-pageid-28 wp-embed-responsive group-blog has-header-image page-one-column colors-light" style="position: relative; min-height: 100%; top: 0;">
<div id="page" class="site">
    <a href="#content" class="skip-link screen-reader-text"> Skip to content </a>
    {{-- HEADER SECTION (LOGO AND TOP MENU) --}}
    <header id="masthead" role="banner" class="no-print w-full site-header antialiased font-bold fixed z-50 oswald">
        <div class="site-header__wrap no-pseudo-elements w-full wrap flex items-center justify-between mg-hover-menu">
            {{-- LOGO --}}
            <div class="logo-container md:flex-1 lg:flex-auto md:mr-4">
                <a href="https://grains.org/" aria-label="USGC Home" class="block">
                    <picture>
                        <source type="image/svg+xml" srcset="{{ asset('images/USGC_LogoH_white.svg') }}">
                        <img src="{{ asset('images/USGC_LogoH_white.svg') }}" alt="text - United States Grains Council" data-ll-status="loaded" class="site-header__site-logo block py-4 px-4 md:p-6 md:bg-midnight-blue lazyloaded">
                        <noscript>
                            <img src="{{ asset('images/USGC_LogoH_white.svg') }}" alt="text - United States Grains Council" class="site-header__site-logo block py-4 px-4 md:p-6 md:bg-midnight-blue">
                        </noscript>
                    </picture>
                </a>
            </div>
            {{-- END LOGO --}}
        </div>
    </header>
    {{-- HEADER SECTION (LOGO AND TOP MENU) --}}
    {{-- END FULL PAGE MENU --}}
    {{-- SITE CONTENT --}}
    @yield('content')
    {{-- END SITE CONTENT --}}
    {{-- BACK TO TOP BUTTON --}}
    <a href="#" class="no-print animated fadeInUp mg-back-to-top plain-link text-center m-4 z-20 block md:fixed pin-b pin-r text-white mg-banded-accent-lighter hidden">
        <svg class="mg-icon mg-icon--large"><use href="#icon-angle-up" xlink:href="#icon-angle-up"></use></svg>
        <span class="screen-reader-text">Back to Top</span>
    </a>
    {{-- END BACK TO TOP BUTTON --}}
    {{-- FOOTER --}}
    <svg aria-hidden="true" style="position: absolute; width: 0; height: 0; overflow: hidden;" version="1.1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink">
        <defs>
            <symbol id="icon-search" viewBox="0 0 32 32">
                <title>search</title>
                <path
                    d="M25.794 23.532l-4.525-4.525c-0.365-0.365-0.951-0.372-1.327-0.025l-1.066-1.066c1.003-1.216 1.605-2.776 1.605-4.475 0-3.888-3.152-7.040-7.040-7.040s-7.040 3.152-7.040 7.040c0 3.888 3.152 7.040 7.040 7.040 1.7 0 3.259-0.602 4.475-1.605l1.066 1.066c-0.347 0.376-0.34 0.963 0.024 1.327l4.526 4.525c0.374 0.375 0.985 0.374 1.357 0l0.905-0.905c0.374-0.374 0.374-0.983 0-1.357zM13.44 18.56c-2.828 0-5.12-2.292-5.12-5.12s2.292-5.12 5.12-5.12 5.12 2.292 5.12 5.12-2.292 5.12-5.12 5.12z">
                </path>
            </symbol>
            <symbol id="icon-close" viewBox="0 0 32 32">
                <title>close</title>
                <path
                    d="M27.914 6.914l-2.828-2.828-9.086 9.086-9.086-9.086-2.828 2.828 9.086 9.086-9.086 9.086 2.828 2.828 9.086-9.086 9.086 9.086 2.828-2.828-9.086-9.086z">
                </path>
            </symbol>
            <symbol id="icon-angle-up" viewBox="0 0 21 32">
                <title>angle-up</title>
                <path
                    d="M19.196 21.143c0 0.143-0.071 0.304-0.179 0.411l-0.893 0.893c-0.107 0.107-0.25 0.179-0.411 0.179-0.143 0-0.304-0.071-0.411-0.179l-7.018-7.018-7.018 7.018c-0.107 0.107-0.268 0.179-0.411 0.179s-0.304-0.071-0.411-0.179l-0.893-0.893c-0.107-0.107-0.179-0.268-0.179-0.411s0.071-0.304 0.179-0.411l8.321-8.321c0.107-0.107 0.268-0.179 0.411-0.179s0.304 0.071 0.411 0.179l8.321 8.321c0.107 0.107 0.179 0.268 0.179 0.411z">
                </path>
            </symbol>
            <symbol id="icon-photoshelter" viewBox="0 0 25 32">
                <path
                    d="M13.515 0.046c-0.348 0.109-11.278 4.134-11.433 4.211-0.672 0.336-1.31 0.977-1.649 1.655-0.052 0.101-0.135 0.313-0.19 0.474-0.201 0.6-0.187-0.261-0.187 11.128v10.287l6.176 4.185 0.534 0.017 0.063-0.198c0.034-0.109 0.126-0.327 0.204-0.483 0.655-1.336 2.002-2.513 3.818-3.344 0.586-0.27 0.753-0.33 7.618-2.861 2.203-0.813 4.113-1.528 4.246-1.591 0.503-0.238 1.046-0.695 1.382-1.158 0.27-0.371 0.494-0.873 0.626-1.413 0.046-0.187 0.049-0.666 0.060-6.636 0.006-4.467 0-6.518-0.023-6.707-0.121-1.063-0.712-2.014-1.603-2.577-0.098-0.063-0.172-0.121-0.164-0.129 0.017-0.014-6.208-4.28-6.592-4.516-0.118-0.072-0.35-0.187-0.517-0.256l-0.302-0.121-0.962-0.006c-0.801-0.006-0.985 0-1.106 0.037zM18.146 10.749c-0.012 6.015 0.003 5.578-0.195 6.173-0.293 0.885-0.934 1.64-1.735 2.057-0.218 0.112-3.729 1.422-7.67 2.861l-1.838 0.672-0.009-5.303c-0.006-5.768-0.011-5.636 0.152-6.193 0.267-0.911 0.936-1.735 1.761-2.163 0.132-0.069 1.178-0.471 2.327-0.896 1.149-0.422 3.111-1.146 4.358-1.609 1.25-0.46 2.387-0.879 2.528-0.934 0.144-0.055 0.276-0.098 0.296-0.101 0.029 0 0.034 1.028 0.026 5.435z">
                </path>
            </symbol>
            <symbol id="icon-facebook" viewBox="0 0 32 32">
                <path
                    d="M29 0h-26c-1.65 0-3 1.35-3 3v26c0 1.65 1.35 3 3 3h13v-14h-4v-4h4v-2c0-3.306 2.694-6 6-6h4v4h-4c-1.1 0-2 0.9-2 2v2h6l-1 4h-5v14h9c1.65 0 3-1.35 3-3v-26c0-1.65-1.35-3-3-3z">
                </path>
            </symbol>
            <symbol id="icon-instagram" viewBox="0 0 32 32">
                <path
                    d="M16 2.881c4.275 0 4.781 0.019 6.462 0.094 1.563 0.069 2.406 0.331 2.969 0.55 0.744 0.288 1.281 0.638 1.837 1.194 0.563 0.563 0.906 1.094 1.2 1.838 0.219 0.563 0.481 1.412 0.55 2.969 0.075 1.688 0.094 2.194 0.094 6.463s-0.019 4.781-0.094 6.463c-0.069 1.563-0.331 2.406-0.55 2.969-0.288 0.744-0.637 1.281-1.194 1.837-0.563 0.563-1.094 0.906-1.837 1.2-0.563 0.219-1.413 0.481-2.969 0.55-1.688 0.075-2.194 0.094-6.463 0.094s-4.781-0.019-6.463-0.094c-1.563-0.069-2.406-0.331-2.969-0.55-0.744-0.288-1.281-0.637-1.838-1.194-0.563-0.563-0.906-1.094-1.2-1.837-0.219-0.563-0.481-1.413-0.55-2.969-0.075-1.688-0.094-2.194-0.094-6.463s0.019-4.781 0.094-6.463c0.069-1.563 0.331-2.406 0.55-2.969 0.288-0.744 0.638-1.281 1.194-1.838 0.563-0.563 1.094-0.906 1.838-1.2 0.563-0.219 1.412-0.481 2.969-0.55 1.681-0.075 2.188-0.094 6.463-0.094zM16 0c-4.344 0-4.887 0.019-6.594 0.094-1.7 0.075-2.869 0.35-3.881 0.744-1.056 0.412-1.95 0.956-2.837 1.85-0.894 0.888-1.438 1.781-1.85 2.831-0.394 1.019-0.669 2.181-0.744 3.881-0.075 1.713-0.094 2.256-0.094 6.6s0.019 4.887 0.094 6.594c0.075 1.7 0.35 2.869 0.744 3.881 0.413 1.056 0.956 1.95 1.85 2.837 0.887 0.887 1.781 1.438 2.831 1.844 1.019 0.394 2.181 0.669 3.881 0.744 1.706 0.075 2.25 0.094 6.594 0.094s4.888-0.019 6.594-0.094c1.7-0.075 2.869-0.35 3.881-0.744 1.050-0.406 1.944-0.956 2.831-1.844s1.438-1.781 1.844-2.831c0.394-1.019 0.669-2.181 0.744-3.881 0.075-1.706 0.094-2.25 0.094-6.594s-0.019-4.887-0.094-6.594c-0.075-1.7-0.35-2.869-0.744-3.881-0.394-1.063-0.938-1.956-1.831-2.844-0.887-0.887-1.781-1.438-2.831-1.844-1.019-0.394-2.181-0.669-3.881-0.744-1.712-0.081-2.256-0.1-6.6-0.1v0z">
                </path>
                <path
                    d="M16 7.781c-4.537 0-8.219 3.681-8.219 8.219s3.681 8.219 8.219 8.219 8.219-3.681 8.219-8.219c0-4.537-3.681-8.219-8.219-8.219zM16 21.331c-2.944 0-5.331-2.387-5.331-5.331s2.387-5.331 5.331-5.331c2.944 0 5.331 2.387 5.331 5.331s-2.387 5.331-5.331 5.331z">
                </path>
                <path
                    d="M26.462 7.456c0 1.060-0.859 1.919-1.919 1.919s-1.919-0.859-1.919-1.919c0-1.060 0.859-1.919 1.919-1.919s1.919 0.859 1.919 1.919z">
                </path>
            </symbol>
            <symbol id="icon-twitter" viewBox="0 0 32 32">
                <path
                    d="M32 7.075c-1.175 0.525-2.444 0.875-3.769 1.031 1.356-0.813 2.394-2.1 2.887-3.631-1.269 0.75-2.675 1.3-4.169 1.594-1.2-1.275-2.906-2.069-4.794-2.069-3.625 0-6.563 2.938-6.563 6.563 0 0.512 0.056 1.012 0.169 1.494-5.456-0.275-10.294-2.888-13.531-6.862-0.563 0.969-0.887 2.1-0.887 3.3 0 2.275 1.156 4.287 2.919 5.463-1.075-0.031-2.087-0.331-2.975-0.819 0 0.025 0 0.056 0 0.081 0 3.181 2.263 5.838 5.269 6.437-0.55 0.15-1.131 0.231-1.731 0.231-0.425 0-0.831-0.044-1.237-0.119 0.838 2.606 3.263 4.506 6.131 4.563-2.25 1.762-5.075 2.813-8.156 2.813-0.531 0-1.050-0.031-1.569-0.094 2.913 1.869 6.362 2.95 10.069 2.95 12.075 0 18.681-10.006 18.681-18.681 0-0.287-0.006-0.569-0.019-0.85 1.281-0.919 2.394-2.075 3.275-3.394z">
                </path>
            </symbol>
            <symbol id="icon-rss" viewBox="0 0 32 32">
                <path
                    d="M4.259 23.467c-2.35 0-4.259 1.917-4.259 4.252 0 2.349 1.909 4.244 4.259 4.244 2.358 0 4.265-1.895 4.265-4.244-0-2.336-1.907-4.252-4.265-4.252zM0.005 10.873v6.133c3.993 0 7.749 1.562 10.577 4.391 2.825 2.822 4.384 6.595 4.384 10.603h6.16c-0-11.651-9.478-21.127-21.121-21.127zM0.012 0v6.136c14.243 0 25.836 11.604 25.836 25.864h6.152c0-17.64-14.352-32-31.988-32z">
                </path>
            </symbol>
            <symbol id="icon-angle-right" viewBox="0 0 11 32">
                <title>angle-right</title>
                <path
                    d="M10.625 17.143c0 0.143-0.071 0.304-0.179 0.411l-8.321 8.321c-0.107 0.107-0.268 0.179-0.411 0.179s-0.304-0.071-0.411-0.179l-0.893-0.893c-0.107-0.107-0.179-0.25-0.179-0.411 0-0.143 0.071-0.304 0.179-0.411l7.018-7.018-7.018-7.018c-0.107-0.107-0.179-0.268-0.179-0.411s0.071-0.304 0.179-0.411l0.893-0.893c0.107-0.107 0.268-0.179 0.411-0.179s0.304 0.071 0.411 0.179l8.321 8.321c0.107 0.107 0.179 0.268 0.179 0.411z">
                </path>
            </symbol>
            <symbol id="icon-youtube" viewBox="0 0 32 32">
                <path
                    d="M31.681 9.6c0 0-0.313-2.206-1.275-3.175-1.219-1.275-2.581-1.281-3.206-1.356-4.475-0.325-11.194-0.325-11.194-0.325h-0.012c0 0-6.719 0-11.194 0.325-0.625 0.075-1.987 0.081-3.206 1.356-0.963 0.969-1.269 3.175-1.269 3.175s-0.319 2.588-0.319 5.181v2.425c0 2.587 0.319 5.181 0.319 5.181s0.313 2.206 1.269 3.175c1.219 1.275 2.819 1.231 3.531 1.369 2.563 0.244 10.881 0.319 10.881 0.319s6.725-0.012 11.2-0.331c0.625-0.075 1.988-0.081 3.206-1.356 0.962-0.969 1.275-3.175 1.275-3.175s0.319-2.587 0.319-5.181v-2.425c-0.006-2.588-0.325-5.181-0.325-5.181zM12.694 20.15v-8.994l8.644 4.513-8.644 4.481z">
                </path>
            </symbol>
            <symbol id="icon-flickr" viewBox="0 0 32 32">
                <path
                    d="M25 13c-2.206 0-4 1.794-4 4s1.794 4 4 4c2.206 0 4-1.794 4-4s-1.794-4-4-4zM25 10v0c3.866 0 7 3.134 7 7s-3.134 7-7 7-7-3.134-7-7c0-3.866 3.134-7 7-7zM0 17c0-3.866 3.134-7 7-7s7 3.134 7 7c0 3.866-3.134 7-7 7s-7-3.134-7-7z">
                </path>
            </symbol>
            <symbol id="icon-soundcloud" viewBox="0 0 32 32">
                <path
                    d="M27.874 16.069c-0.565 0-1.105 0.11-1.596 0.308-0.328-3.574-3.447-6.377-7.25-6.377-0.931 0-1.834 0.176-2.635 0.474-0.311 0.116-0.393 0.235-0.393 0.466v12.585c0 0.243 0.195 0.445 0.441 0.469 0.011 0.001 11.36 0.007 11.434 0.007 2.278 0 4.125-1.776 4.125-3.965s-1.848-3.966-4.126-3.966zM12.5 24h1l0.5-7.007-0.5-6.993h-1l-0.5 6.993zM9.5 24h-1l-0.5-5.086 0.5-4.914h1l0.5 5zM4.5 24h1l0.5-4-0.5-4h-1l-0.5 4zM0.5 22h1l0.5-2-0.5-2h-1l-0.5 2z">
                </path>
            </symbol>
            <symbol id="icon-pinterest" viewBox="0 0 32 32">
                <path
                    d="M16 2.138c-7.656 0-13.863 6.206-13.863 13.863 0 5.875 3.656 10.887 8.813 12.906-0.119-1.094-0.231-2.781 0.050-3.975 0.25-1.081 1.625-6.887 1.625-6.887s-0.412-0.831-0.412-2.056c0-1.925 1.119-3.369 2.506-3.369 1.181 0 1.756 0.887 1.756 1.95 0 1.188-0.756 2.969-1.15 4.613-0.331 1.381 0.688 2.506 2.050 2.506 2.462 0 4.356-2.6 4.356-6.35 0-3.319-2.387-5.638-5.787-5.638-3.944 0-6.256 2.956-6.256 6.019 0 1.194 0.456 2.469 1.031 3.163 0.113 0.137 0.131 0.256 0.094 0.4-0.106 0.438-0.338 1.381-0.387 1.575-0.063 0.256-0.2 0.306-0.463 0.188-1.731-0.806-2.813-3.337-2.813-5.369 0-4.375 3.175-8.387 9.156-8.387 4.806 0 8.544 3.425 8.544 8.006 0 4.775-3.012 8.625-7.194 8.625-1.406 0-2.725-0.731-3.175-1.594 0 0-0.694 2.644-0.863 3.294-0.313 1.206-1.156 2.712-1.725 3.631 1.3 0.4 2.675 0.619 4.106 0.619 7.656 0 13.863-6.206 13.863-13.863 0-7.662-6.206-13.869-13.863-13.869z">
                </path>
            </symbol>
        </defs>
    </svg>
    <script id="twentyseventeen-skip-link-focus-fix-js-extra">
        var twentyseventeenScreenReaderText = {
            "quote": "<svg class=\"icon icon-quote-right\" aria-hidden=\"true\" role=\"img\"> <use href=\"#icon-quote-right\" xlink:href=\"#icon-quote-right\"><\/use> <\/svg>",
            "expand": "Expand child menu",
            "collapse": "Collapse child menu",
            "icon": "<svg class=\"icon icon-angle-down\" aria-hidden=\"true\" role=\"img\"> <use href=\"#icon-angle-down\" xlink:href=\"#icon-angle-down\"><\/use> <span class=\"svg-fallback icon-angle-down\"><\/span><\/svg>"
        };
    </script>
    <script id="slick-carousel-js-after">
        window.jQuery.fn.slick || document.write('<script src="{{ asset('/js/app.js') }}"><\/script>')
    </script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
    <script src="https://unpkg.com/imagesloaded@4/imagesloaded.pkgd.min.js"></script>
    <script src="{{ asset('/js/theme.js') }}" id="site-vendor-js"></script>
    <script src="{{ asset('/js/theme-2.js') }}" id="mg-main-js"></script>
    <script src="{{ asset('/js/nav.js') }}" id="mg-twentyseventeen-navigation-js"></script>
</div>
</body>
</html>
