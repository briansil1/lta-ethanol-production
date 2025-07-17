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
            {{-- TOP MENU --}}
            <nav id="site-navigation" role="navigation" aria-label="Top Menu"
                 class="lg:pl-10 main-navigation main-navigation--top text-base heading-font text-white">
                <div class="menu-main-menu-container">
                    <ul id="top-menu" class="main-menu main-menu--top mg-hover-menu tracking-wide">
                        <li id="menu-item-65" class="menu-item menu-item-type-post_type menu-item-object-page menu-item-has-children menu-item-65">
                            <a>{{ __('main.menu.why') }}</a>
                            <button class="dropdown-toggle" aria-expanded="false">
                                <svg class="icon icon-angle-down" aria-hidden="true" role="img">
                                    <use href="#icon-angle-down" xlink:href="#icon-angle-down"></use>
                                </svg>
                                <span class="svg-fallback icon-angle-down"></span><span class="screen-reader-text">{{ __('main.menu.expand-child-menu') }}</span>
                            </button>
                            <ul class="sub-menu">
                                <li id="menu-item-66" class="menu-item menu-item-type-post_type menu-item-object-page menu-item-66">
                                    <a href="https://grains.org/why-trade-matters/about-grain-trade/">{{ __('main.menu.why-about') }}</a>
                                </li>
                                <li id="menu-item-36756" class="menu-item menu-item-type-post_type menu-item-object-page menu-item-has-children menu-item-36756">
                                    <a href="https://grains.org/tradeschool/">{{ __('main.menu.why-trade') }}</a>
                                    <button class="dropdown-toggle" aria-expanded="false">
                                        <svg class="icon icon-angle-down" aria-hidden="true" role="img"><use href="#icon-angle-down" xlink:href="#icon-angle-down"></use></svg>
                                        <span class="svg-fallback icon-angle-down"></span>
                                        <span class="screen-reader-text">{{ __('main.menu.expand-child-menu') }}</span>
                                    </button>
                                    <ul class="sub-menu">
                                        <li id="menu-item-34031" class="menu-item menu-item-type-post_type menu-item-object-page menu-item-34031">
                                            <a href="https://grains.org/learn-about-trade/">{{ __('main.menu.why-trade-learn') }}</a>
                                        </li>
                                        <li id="menu-item-36757" class="menu-item menu-item-type-post_type menu-item-object-page menu-item-36757">
                                            <a href="https://grains.org/news-events/trade-toolkit/">{{ __('main.menu.why-trade-toolkit') }}</a>
                                        </li>
                                    </ul>
                                </li>
                                <li id="menu-item-544" class="menu-item menu-item-type-post_type menu-item-object-page menu-item-544">
                                    <a href="https://grains.org/why-trade-matters/value-of-grain-exports-map/">{{ __('main.menu.why-value') }}</a>
                                </li>
                                <li id="menu-item-300" class="menu-item menu-item-type-post_type menu-item-object-page menu-item-300">
                                    <a href="https://grains.org/news-events/success-stories/">{{ __('main.menu.why-histories') }}</a>
                                </li>
                            </ul>
                        </li>
                        <li id="menu-item-75" class="menu-item menu-item-type-post_type menu-item-object-page current-page-ancestor current-menu-ancestor current-menu-parent current-page-parent current_page_parent current_page_ancestor menu-item-has-children menu-item-75">
                            <a>{{ __('main.menu.b&s') }}</a>
                            <button class="dropdown-toggle toggled-on" aria-expanded="true">
                                <svg class="icon icon-angle-down" aria-hidden="true" role="img"><use href="#icon-angle-down" xlink:href="#icon-angle-down"></use></svg>
                                <span class="svg-fallback icon-angle-down"></span><span class="screen-reader-text">Collapse child menu</span>
                            </button>
                            <ul class="sub-menu toggled-on">
                                <li id="menu-item-5131" class="menu-item menu-item-type-post_type menu-item-object-page page_item page-item-32 menu-item-has-children menu-item-5131">
                                    <a href="https://grains.org/buying-selling/corn/">{{ __('main.menu.b&s-corn') }}</a>
                                    <button class="dropdown-toggle" aria-expanded="false">
                                        <svg class="icon icon-angle-down" aria-hidden="true" role="img"><use href="#icon-angle-down" xlink:href="#icon-angle-down"></use></svg>
                                        <span class="svg-fallback icon-angle-down"></span>
                                        <span class="screen-reader-text">{{ __('main.menu.expand-child-menu') }}</span>
                                    </button>
                                    <ul class="sub-menu">
                                        <li id="menu-item-76" class="menu-item menu-item-type-post_type menu-item-object-page menu-item-76">
                                            <a href="https://grains.org/buying-selling/corn/production-exports/">{{ __('main.menu.b&s-corn-production') }}</a>
                                        </li>
                                        <li id="menu-item-38420" class="menu-item menu-item-type-custom menu-item-object-custom menu-item-38420">
                                            <a href="https://grains.org/wp-content/uploads/2020/09/USGC-Tropical-Corn-Study-9-20-20.pdf">{{ __('main.menu.b&s-corn-storage') }}</a>
                                        </li>
                                        <li id="menu-item-545" class="menu-item menu-item-type-post_type menu-item-object-page menu-item-545">
                                            <a href="https://grains.org/buying-selling/corn/commercial-grain-suppliers/">{{ __('main.menu.b&s-corn-commercial') }}</a>
                                        </li>
                                    </ul>
                                </li>
                                <li id="menu-item-5142" class="menu-item menu-item-type-post_type menu-item-object-page menu-item-has-children menu-item-5142">
                                    <a href="https://grains.org/buying-selling/sorghum/">{{ __('main.menu.b&s-sorghum') }}</a>
                                    <button class="dropdown-toggle" aria-expanded="false">
                                        <svg class="icon icon-angle-down" aria-hidden="true" role="img"><use href="#icon-angle-down" xlink:href="#icon-angle-down"></use></svg>
                                        <span class="svg-fallback icon-angle-down"></span>
                                        <span class="screen-reader-text">{{ __('main.menu.expand-child-menu') }}</span>
                                    </button>
                                    <ul class="sub-menu">
                                        <li id="menu-item-547" class="menu-item menu-item-type-post_type menu-item-object-page menu-item-547">
                                            <a href="https://grains.org/buying-selling/sorghum/production-exports/">{{ __('main.menu.b&s-sorghum-production') }}</a>
                                        </li>
                                        <li id="menu-item-564" class="menu-item menu-item-type-post_type menu-item-object-page menu-item-564">
                                            <a href="https://grains.org/buying-selling/sorghum/commercial-grain-suppliers/">{{ __('main.menu.b&s-sorghum-suppliers') }}</a>
                                        </li>
                                    </ul>
                                </li>
                                <li id="menu-item-5148" class="menu-item menu-item-type-post_type menu-item-object-page menu-item-has-children menu-item-5148">
                                    <a href="https://grains.org/buying-selling/barley/">{{__('main.menu.b&s-barley')}}</a>
                                    <button class="dropdown-toggle" aria-expanded="false">
                                        <svg class="icon icon-angle-down" aria-hidden="true" role="img"><use href="#icon-angle-down" xlink:href="#icon-angle-down"></use></svg>
                                        <span class="svg-fallback icon-angle-down"></span>
                                        <span class="screen-reader-text">{{ __('main.menu.expand-child-menu') }}</span>
                                    </button>
                                    <ul class="sub-menu">
                                        <li id="menu-item-567" class="menu-item menu-item-type-post_type menu-item-object-page menu-item-567">
                                            <a href="https://grains.org/buying-selling/barley/">{{ __('main.menu.b&s-barley-production') }}</a>
                                        </li>
                                        <li id="menu-item-566" class="menu-item menu-item-type-post_type menu-item-object-page menu-item-566">
                                            <a href="https://grains.org/buying-selling/barley/feed-barley-malting-barley-malt-suppliers/">{{ __('main.menu.b&s-barley-suppliers') }}</a>
                                        </li>
                                    </ul>
                                </li>
                                <li id="menu-item-5155" class="menu-item menu-item-type-post_type menu-item-object-page menu-item-has-children menu-item-5155">
                                    <a href="https://grains.org/buying-selling/ddgs/">{{ __('main.menu.b&s-ddgs') }}</a>
                                    <button class="dropdown-toggle" aria-expanded="false">
                                        <svg class="icon icon-angle-down" aria-hidden="true" role="img"><use href="#icon-angle-down" xlink:href="#icon-angle-down"></use></svg>
                                        <span class="svg-fallback icon-angle-down"></span>
                                        <span class="screen-reader-text">{{ __('main.menu.expand-child-menu') }}</span>
                                    </button>
                                    <ul class="sub-menu">
                                        <li id="menu-item-5157"
                                            class="menu-item menu-item-type-post_type menu-item-object-page menu-item-5157">
                                            <a href="https://grains.org/buying-selling/ddgs/production-exports/">{{ __('main.menu.b&s-ddgs-production') }}</a>
                                        </li>
                                        <li id="menu-item-569" class="menu-item menu-item-type-post_type menu-item-object-page menu-item-569">
                                            <a href="https://grains.org/buying-selling/ddgs/ddgs-suppliers/">{{ __('main.menu.b&s-ddgs-suppliers') }}</a>
                                        </li>
                                        <li id="menu-item-570" class="menu-item menu-item-type-post_type menu-item-object-page menu-item-570">
                                            <a href="https://grains.org/buying-selling/ddgs/user-handbook/">{{ __('main.menu.b&s-ddgs-handbook') }}</a>
                                        </li>
                                    </ul>
                                </li>
                                <li id="menu-item-30401" class="menu-item menu-item-type-post_type menu-item-object-page menu-item-has-children menu-item-30401">
                                    <a href="https://grains.org/buying-selling/ethanol-2/">{{ __('main.menu.b&s-ethanol') }}</a>
                                    <button class="dropdown-toggle" aria-expanded="false">
                                        <svg class="icon icon-angle-down" aria-hidden="true" role="img"><use href="#icon-angle-down" xlink:href="#icon-angle-down"></use></svg>
                                        <span class="svg-fallback icon-angle-down"></span>
                                        <span class="screen-reader-text">{{ __('main.menu.expand-child-menu') }}</span>
                                    </button>
                                    <ul class="sub-menu">
                                        <li id="menu-item-30396" class="menu-item menu-item-type-post_type menu-item-object-page menu-item-30396">
                                            <a href="https://grains.org/buying-selling/ethanol-2/ethanol-key-topics/">{{ __('main.menu.b&s-ethanol-key') }}</a>
                                        </li>
                                        <li id="menu-item-5180" class="menu-item menu-item-type-post_type menu-item-object-page menu-item-5180">
                                            <a href="https://grains.org/buying-selling/ethanol-2/ethanol/production-exports/">{{ __('main.menu.b&s-ethanol-production') }}</a>
                                        </li>
                                        <li id="menu-item-30397" class="menu-item menu-item-type-post_type menu-item-object-page menu-item-30397">
                                            <a href="https://grains.org/buying-selling/ethanol-2/ethanol-market-development/">{{ __('main.menu.b&s-ethanol-market') }}</a>
                                        </li>
                                        <li id="menu-item-30400" class="menu-item menu-item-type-post_type menu-item-object-page menu-item-30400">
                                            <a href="https://grains.org/buying-selling/ethanol-2/ethanol-market-information/">{{ __('main.menu.b&s-ethanol-information') }}</a>
                                        </li>
                                        <li id="menu-item-575" class="menu-item menu-item-type-post_type menu-item-object-page menu-item-575">
                                            <a href="https://grains.org/buying-selling/ethanol-2/ethanol/ethanol-suppliers/">{{ __('main.menu.b&s-ethanol-suppliers') }}</a>
                                        </li>
                                        <li id="menu-item-577" class="menu-item menu-item-type-post_type menu-item-object-page menu-item-577">
                                            <a href="https://grains.org/buying-selling/ethanol-2/ethanol/reports-analysis/">{{ __('main.menu.b&s-ethanol-reports') }}</a>
                                        </li>
                                        <li id="menu-item-31737" class="menu-item menu-item-type-post_type menu-item-object-page menu-item-31737">
                                            <a href="https://grains.org/markets-tools-data/resources-for-importers/ethanol-purchase-inquiry/">{{ __('main.menu.b&s-ethanol-inquiry') }}</a>
                                        </li>
                                    </ul>
                                </li>
                                <li id="menu-item-5164" class="menu-item menu-item-type-post_type menu-item-object-page menu-item-has-children menu-item-5164">
                                    <a href="https://grains.org/buying-selling/corn-gluten/">{{ __('main.menu.b&s-gluten') }}</a>
                                    <button class="dropdown-toggle" aria-expanded="false">
                                        <svg class="icon icon-angle-down" aria-hidden="true" role="img"><use href="#icon-angle-down" xlink:href="#icon-angle-down"></use></svg>
                                        <span class="svg-fallback icon-angle-down"></span>
                                        <span class="screen-reader-text">{{ __('main.menu.expand-child-menu') }}</span>
                                    </button>
                                    <ul class="sub-menu">
                                        <li id="menu-item-5166" class="menu-item menu-item-type-post_type menu-item-object-page menu-item-5166">
                                            <a href="https://grains.org/buying-selling/corn-gluten/production-exports/">{{ __('main.menu.b&s-gluten-production') }}</a>
                                        </li>
                                        <li id="menu-item-580" class="menu-item menu-item-type-post_type menu-item-object-page menu-item-580">
                                            <a href="https://grains.org/buying-selling/corn-gluten/corn-gluten-meal-corn-gluten-feed-suppliers/">{{ __('main.menu.b&s-gluten-suppliers') }}</a>
                                        </li>
                                    </ul>
                                </li>
                                <li id="menu-item-597" class="menu-item menu-item-type-post_type menu-item-object-page menu-item-has-children menu-item-597">
                                    <a href="https://grains.org/markets-tools-data/resources-for-importers/">{{ __('main.menu.b&s-resources') }}</a>
                                    <button class="dropdown-toggle" aria-expanded="false">
                                        <svg class="icon icon-angle-down" aria-hidden="true" role="img"><use href="#icon-angle-down" xlink:href="#icon-angle-down"></use></svg>
                                        <span class="svg-fallback icon-angle-down"></span>
                                        <span class="screen-reader-text">{{ __('main.menu.expand-child-menu') }}</span>
                                    </button>
                                    <ul class="sub-menu">
                                        <li id="menu-item-598" class="menu-item menu-item-type-post_type menu-item-object-page menu-item-598">
                                            <a href="https://grains.org/markets-tools-data/resources-for-importers/importer-manual/">{{ __('main.menu.b&s-resources-manual') }}</a>
                                        </li>
                                        <li id="menu-item-595" class="menu-item menu-item-type-post_type menu-item-object-page menu-item-595">
                                            <a href="https://grains.org/markets-tools-data/resources-for-importers/purchase-inquiry/">{{ __('main.menu.b&s-resources-inquiry') }}</a>
                                        </li>
                                        <li id="menu-item-599" class="menu-item menu-item-type-post_type menu-item-object-page menu-item-599">
                                            <a href="https://grains.org/markets-tools-data/resources-for-importers/notice-to-exporters/">{{ __('main.menu.b&s-resources-notice') }}</a>
                                        </li>
                                        <li id="menu-item-6582" class="menu-item menu-item-type-post_type menu-item-object-page menu-item-6582">
                                            <a href="https://grains.org/markets-tools-data/resources-for-importers/commercial-grain-suppliers/">{{ __('main.menu.b&s-resources-suppliers') }}</a>
                                        </li>
                                    </ul>
                                </li>
                            </ul>
                        </li>
                        <li id="menu-item-582" class="menu-item menu-item-type-post_type menu-item-object-page menu-item-has-children menu-item-582">
                            <a>{{ __('main.menu.markets') }}</a>
                            <button class="dropdown-toggle" aria-expanded="false">
                                <svg class="icon icon-angle-down" aria-hidden="true" role="img"><use href="#icon-angle-down" xlink:href="#icon-angle-down"></use></svg>
                                <span class="svg-fallback icon-angle-down"></span>
                                <span class="screen-reader-text">{{ __('main.menu.expand-child-menu') }}</span>
                            </button>
                            <ul class="sub-menu">
                                <li id="menu-item-5122" class="menu-item menu-item-type-post_type menu-item-object-page menu-item-has-children menu-item-5122">
                                    <a href="https://grains.org/markets-tools-data/tools/">{{ __('main.menu.markets-tools') }}</a>
                                    <button class="dropdown-toggle" aria-expanded="false">
                                        <svg class="icon icon-angle-down" aria-hidden="true" role="img"><use href="#icon-angle-down" xlink:href="#icon-angle-down"></use></svg>
                                        <span class="svg-fallback icon-angle-down"></span>
                                        <span class="screen-reader-text">{{ __('main.menu.expand-child-menu') }}</span>
                                    </button>
                                    <ul class="sub-menu">
                                        <li id="menu-item-5123" class="menu-item menu-item-type-post_type menu-item-object-page menu-item-5123">
                                            <a href="https://grains.org/markets-tools-data/tools/feed-grains-in-all-forms-portal/">{{ __('main.menu.markets-tools-grains') }}</a>
                                        </li>
                                        <li id="menu-item-583" class="menu-item menu-item-type-post_type menu-item-object-page menu-item-583">
                                            <a href="https://grains.org/markets-tools-data/tools/top-u-s-export-customers/">{{ __('main.menu.markets-tools-exports') }}</a>
                                        </li>
                                        <li id="menu-item-584" class="menu-item menu-item-type-post_type menu-item-object-page menu-item-584">
                                            <a href="https://grains.org/markets-tools-data/tools/converting-grain-units/">{{ __('main.menu.markets-tools-converting') }}</a>
                                        </li>
                                        <li id="menu-item-584" class="menu-item current-menu-item current_page_item menu-item-type-post_type menu-item-object-page">
                                            <a href="{{ route(__('routes.home')) }}">{{ __('main.menu.markets-tools-latin-america') }}</a>
                                        </li>
                                    </ul>
                                </li>
                                <li id="menu-item-585" class="menu-item menu-item-type-post_type menu-item-object-page menu-item-has-children menu-item-585">
                                    <a href="https://grains.org/markets-tools-data/reports/">{{ __('main.menu.markets-reports') }}</a>
                                    <button class="dropdown-toggle" aria-expanded="false">
                                        <svg class="icon icon-angle-down" aria-hidden="true" role="img"><use href="#icon-angle-down" xlink:href="#icon-angle-down"></use></svg>
                                        <span class="svg-fallback icon-angle-down"></span>
                                        <span class="screen-reader-text">{{ __('main.menu.expand-child-menu') }}</span>
                                    </button>
                                    <ul class="sub-menu">
                                        <li id="menu-item-25600" class="menu-item menu-item-type-post_type menu-item-object-page menu-item-25600">
                                            <a href="https://grains.org/markets-tools-data/reports/ddgs-weekly-report/">{{ __('main.menu.markets-reports-ddgs') }}</a>
                                        </li>
                                        <li id="menu-item-586" class="menu-item menu-item-type-post_type menu-item-object-page menu-item-586">
                                            <a href="https://grains.org/markets-tools-data/reports/market-perspectives/">{{ __('main.menu.markets-reports-market') }}</a>
                                        </li>
                                        <li id="menu-item-5326" class="menu-item menu-item-type-post_type menu-item-object-page menu-item-5326">
                                            <a href="https://grains.org/markets-tools-data/reports/ethanol-market-and-pricing-data-report/">{{ __('main.menu.markets-reports-ethanol') }}</a>
                                        </li>
                                        <li id="menu-item-588" class="menu-item menu-item-type-post_type menu-item-object-page menu-item-588">
                                            <a href="https://grains.org/markets-tools-data/reports/corn-harvest-quality-export-cargo-reports/">{{ __('main.menu.markets-reports-corn') }}</a>
                                        </li>
                                        <li id="menu-item-589" class="menu-item menu-item-type-post_type menu-item-object-page menu-item-589">
                                            <a href="https://grains.org/markets-tools-data/reports/sorghum-harvest-quality-report/">{{ __('main.menu.markets-reports-sorghum') }}</a>
                                        </li>
                                        <li id="menu-item-590" class="menu-item menu-item-type-post_type menu-item-object-page menu-item-590">
                                            <a href="https://grains.org/markets-tools-data/reports/usda-reports/">{{ __('main.menu.markets-reports-usda') }}</a>
                                        </li>
                                    </ul>
                                </li>
                                <li id="menu-item-591" class="menu-item menu-item-type-post_type menu-item-object-page menu-item-has-children menu-item-591">
                                    <a href="https://grains.org/markets-tools-data/markets/">{{ __('main.menu.markets-markets') }}</a>
                                    <button class="dropdown-toggle" aria-expanded="false">
                                        <svg class="icon icon-angle-down" aria-hidden="true" role="img"><use href="#icon-angle-down" xlink:href="#icon-angle-down"></use></svg>
                                        <span class="svg-fallback icon-angle-down"></span>
                                        <span class="screen-reader-text">{{ __('main.menu.expand-child-menu') }}</span>
                                    </button>
                                    <ul class="sub-menu">
                                        <li id="menu-item-592"
                                            class="menu-item menu-item-type-post_type menu-item-object-page menu-item-592">
                                            <a href="https://grains.org/markets-tools-data/markets/market-profiles/">{{ __('main.menu.markets-markets-profiles') }}</a></li>
                                        <li id="menu-item-593" class="menu-item menu-item-type-post_type menu-item-object-page menu-item-593">
                                            <a href="https://grains.org/markets-tools-data/markets/fob-price-charts/">{{ __('main.menu.markets-markets-fob') }}</a>
                                        </li>
                                        <li id="menu-item-594" class="menu-item menu-item-type-post_type menu-item-object-page menu-item-594">
                                            <a href="https://grains.org/markets-tools-data/markets/bulk-freight-indices/">{{ __('main.menu.markets-markets-bulk') }}</a>
                                        </li>
                                    </ul>
                                </li>
                                <li id="menu-item-36758"
                                    class="menu-item menu-item-type-post_type menu-item-object-page menu-item-has-children menu-item-36758">
                                    <a href="https://grains.org/markets-tools-data/resources-for-importers/">{{ __('main.menu.markets-resources') }}</a>
                                    <button class="dropdown-toggle" aria-expanded="false">
                                        <svg class="icon icon-angle-down" aria-hidden="true" role="img"><use href="#icon-angle-down" xlink:href="#icon-angle-down"></use></svg>
                                        <span class="svg-fallback icon-angle-down"></span>
                                        <span class="screen-reader-text">{{ __('main.menu.expand-child-menu') }}</span>
                                    </button>
                                    <ul class="sub-menu">
                                        <li id="menu-item-39628" class="menu-item menu-item-type-post_type menu-item-object-page menu-item-39628">
                                            <a href="https://grains.org/markets-tools-data/grain-handling-and-storage-manual/">{{ __('main.menu.markets-resources-grain') }}</a>
                                        </li>
                                        <li id="menu-item-36759" class="menu-item menu-item-type-post_type menu-item-object-page menu-item-36759">
                                            <a href="https://grains.org/markets-tools-data/resources-for-importers/importer-manual/">{{ __('main.menu.markets-resources-manual') }}</a>
                                        </li>
                                        <li id="menu-item-36760" class="menu-item menu-item-type-post_type menu-item-object-page menu-item-36760">
                                            <a href="https://grains.org/markets-tools-data/resources-for-importers/purchase-inquiry/">{{ __('main.menu.markets-resources-inquiry') }}</a>
                                        </li>
                                        <li id="menu-item-36761" class="menu-item menu-item-type-post_type menu-item-object-page menu-item-36761">
                                            <a href="https://grains.org/markets-tools-data/resources-for-importers/ethanol-purchase-inquiry/">{{ __('main.menu.markets-resources-ethanol') }}</a>
                                        </li>
                                        <li id="menu-item-36762" class="menu-item menu-item-type-post_type menu-item-object-page menu-item-36762">
                                            <a href="https://grains.org/markets-tools-data/resources-for-importers/notice-to-exporters/">{{ __('main.menu.markets-resources-notice') }}</a>
                                        </li>
                                        <li id="menu-item-36763" class="menu-item menu-item-type-post_type menu-item-object-page menu-item-36763">
                                            <a href="https://grains.org/markets-tools-data/resources-for-importers/commercial-grain-suppliers/">{{ __('main.menu.markets-resources-commercial') }}</a>
                                        </li>
                                    </ul>
                                </li>
                            </ul>
                        </li>
                        <li id="menu-item-81" class="menu-item menu-item-type-post_type menu-item-object-page menu-item-has-children menu-item-81">
                            <a>{{ __('main.menu.news') }}</a>
                            <button class="dropdown-toggle" aria-expanded="false">
                                <svg class="icon icon-angle-down" aria-hidden="true" role="img"><use href="#icon-angle-down" xlink:href="#icon-angle-down"></use></svg>
                                <span class="svg-fallback icon-angle-down"></span>
                                <span class="screen-reader-text">{{ __('main.menu.expand-child-menu') }}</span>
                            </button>
                            <ul class="sub-menu">
                                <li id="menu-item-600" class="menu-item menu-item-type-post_type menu-item-object-page menu-item-600">
                                    <a href="https://grains.org/news-events/events-upcoming-events-past-events/">{{ __('main.menu.news-events') }}</a>
                                </li>
                                <li id="menu-item-303" class="menu-item menu-item-type-post_type menu-item-object-page menu-item-303">
                                    <a href="https://grains.org/news-events/newsroom/">{{ __('main.menu.news-newsroom') }}</a>
                                </li>
                                <li id="menu-item-82" class="menu-item menu-item-type-post_type menu-item-object-page menu-item-82">
                                    <a href="https://grains.org/news-events/charts-analysis/">{{ __('main.menu.news-charts') }}</a>
                                </li>
                                <li id="menu-item-36764" class="menu-item menu-item-type-post_type menu-item-object-page menu-item-36764">
                                    <a href="https://grains.org/tradeschool/">{{ __('main.menu.news-trade') }}</a>
                                </li>
                                <li id="menu-item-8939" class="menu-item menu-item-type-custom menu-item-object-custom menu-item-8939">
                                    <a href="https://grains.org/2020-annual-report">{{ __('main.menu.news-usgc') }}</a>
                                </li>
                                <li id="menu-item-249" class="menu-item menu-item-type-post_type menu-item-object-page menu-item-249">
                                    <a href="https://grains.org/news-events/multimedia-resources/">{{ __('main.menu.news-resources') }}</a>
                                </li>
                                <li id="menu-item-601" class="menu-item menu-item-type-post_type menu-item-object-page menu-item-601">
                                    <a href="https://grains.org/why-trade-matters/success-stories/">{{ __('main.menu.news-success') }}</a>
                                </li>
                            </ul>
                        </li>
                        <li id="menu-item-84" class="menu-item menu-item-type-post_type menu-item-object-page menu-item-has-children menu-item-84">
                            <a>{{ __('main.menu.council') }}</a>
                            <button class="dropdown-toggle" aria-expanded="false">
                                <svg class="icon icon-angle-down" aria-hidden="true" role="img"><use href="#icon-angle-down" xlink:href="#icon-angle-down"></use></svg>
                                <span class="svg-fallback icon-angle-down"></span>
                                <span class="screen-reader-text">{{ __('main.menu.expand-child-menu') }}</span>
                            </button>
                            <ul class="sub-menu">
                                <li id="menu-item-86" class="menu-item menu-item-type-post_type menu-item-object-page menu-item-has-children menu-item-86">
                                    <a href="https://grains.org/about/about-the-council/">{{ __('main.menu.council-about') }}</a>
                                    <button class="dropdown-toggle" aria-expanded="false">
                                        <svg class="icon icon-angle-down" aria-hidden="true" role="img"><use href="#icon-angle-down" xlink:href="#icon-angle-down"></use></svg>
                                        <span class="svg-fallback icon-angle-down"></span>
                                        <span class="screen-reader-text">{{ __('main.menu.expand-child-menu') }}</span>
                                    </button>
                                    <ul class="sub-menu">
                                        <li id="menu-item-8659" class="menu-item menu-item-type-post_type menu-item-object-page menu-item-8659">
                                            <a href="https://grains.org/about/about-the-council/mission-and-values/">{{ __('main.menu.council-about-mission') }}</a>
                                        </li>
                                        <li id="menu-item-603" class="menu-item menu-item-type-post_type menu-item-object-page menu-item-603">
                                            <a href="https://grains.org/about/about-the-council/bylaws/">{{ __('main.menu.council-about-bylaws') }}</a>
                                        </li>
                                        <li id="menu-item-604" class="menu-item menu-item-type-post_type menu-item-object-page menu-item-604">
                                            <a href="https://grains.org/about/about-the-council/employment/">{{ __('main.menu.council-about-employment') }}</a>
                                        </li>
                                    </ul>
                                </li>
                                <li id="menu-item-36769" class="menu-item menu-item-type-custom menu-item-object-custom menu-item-has-children menu-item-36769">
                                    <a href="#">{{ __('main.menu.council-presence') }}</a>
                                    <button class="dropdown-toggle" aria-expanded="false">
                                        <svg class="icon icon-angle-down" aria-hidden="true" role="img"><use href="#icon-angle-down" xlink:href="#icon-angle-down"></use></svg>
                                        <span class="svg-fallback icon-angle-down"></span>
                                        <span class="screen-reader-text">{{ __('main.menu.expand-child-menu') }}</span>
                                    </button>
                                    <ul class="sub-menu">
                                        <li id="menu-item-87" class="menu-item menu-item-type-post_type menu-item-object-page menu-item-87">
                                            <a href="https://grains.org/about/about-the-council/usgc-offices/">{{ __('main.menu.council-presence-offices') }}</a>
                                        </li>
                                        <li id="menu-item-36771" class="menu-item menu-item-type-custom menu-item-object-custom menu-item-36771">
                                            <a href="https://grains.org/u-s-worldwide-offices/u-s-headquarters-office/">{{ __('main.menu.council-presence-headquarters') }}</a>
                                        </li>
                                    </ul>
                                </li>
                                <li id="menu-item-85" class="menu-item menu-item-type-post_type menu-item-object-page menu-item-has-children menu-item-85">
                                    <a href="https://grains.org/about/leadership/">{{ __('main.menu.council-leadership') }}</a>
                                    <button class="dropdown-toggle" aria-expanded="false">
                                        <svg class="icon icon-angle-down" aria-hidden="true" role="img"><use href="#icon-angle-down" xlink:href="#icon-angle-down"></use></svg>
                                        <span class="svg-fallback icon-angle-down"></span>
                                        <span class="screen-reader-text">{{ __('main.menu.expand-child-menu') }}</span>
                                    </button>
                                    <ul class="sub-menu">
                                        <li id="menu-item-621" class="menu-item menu-item-type-post_type menu-item-object-page menu-item-621">
                                            <a href="https://grains.org/about/leadership/board-of-directors/">{{ __('main.menu.council-leadership-board') }}</a>
                                        </li>
                                        <li id="menu-item-623" class="menu-item menu-item-type-post_type menu-item-object-page menu-item-623">
                                            <a href="https://grains.org/about/leadership/advisory-team-leaders/">{{ __('main.menu.council-leadership-leaders') }}</a>
                                        </li>
                                        <li id="menu-item-622" class="menu-item menu-item-type-post_type menu-item-object-page menu-item-622">
                                            <a href="https://grains.org/about/leadership/past-chairmen/">{{ __('main.menu.council-leadership-chairmen') }}</a>
                                        </li>
                                        <li id="menu-item-624" class="menu-item menu-item-type-post_type menu-item-object-page menu-item-624">
                                            <a href="https://grains.org/about/leadership/lifetime-achievement-award-winners/">{{ __('main.menu.council-leadership-winners') }}</a>
                                        </li>
                                    </ul>
                                </li>
                                <li id="menu-item-7424" class="hidden mdblock menu-item menu-item-type-post_type menu-item-object-page menu-item-has-children menu-item-7424">
                                    <a href="https://grains.org/membership/">{{ __('main.menu.council-membership') }}</a>
                                    <button class="dropdown-toggle" aria-expanded="false">
                                        <svg class="icon icon-angle-down" aria-hidden="true" role="img"><use href="#icon-angle-down" xlink:href="#icon-angle-down"></use></svg>
                                        <span class="svg-fallback icon-angle-down"></span>
                                        <span class="screen-reader-text">{{ __('main.menu.expand-child-menu') }}</span>
                                    </button>
                                    <ul class="sub-menu">
                                        <li id="menu-item-7425" class="menu-item menu-item-type-post_type menu-item-object-page menu-item-7425">
                                            <a href="https://grains.org/membership/member-directory/">{{ __('main.menu.council-membership-directory') }}</a>
                                        </li>
                                        <li id="menu-item-7426" class="menu-item menu-item-type-post_type menu-item-object-page menu-item-7426">
                                            <a href="https://grains.org/membership/about-usgc-membership/">{{ __('main.menu.council-membership-about') }}</a>
                                        </li>
                                    </ul>
                                </li>
                                <li id="menu-item-611" class="menu-item menu-item-type-post_type menu-item-object-page menu-item-has-children menu-item-611">
                                    <a href="https://grains.org/about/the-councils-work/">{{ __('main.menu.council-work') }}</a>
                                    <button class="dropdown-toggle" aria-expanded="false">
                                        <svg class="icon icon-angle-down" aria-hidden="true" role="img"><use href="#icon-angle-down" xlink:href="#icon-angle-down"></use></svg>
                                        <span class="svg-fallback icon-angle-down"></span>
                                        <span class="screen-reader-text">{{ __('main.menu.expand-child-menu') }}</span>
                                    </button>
                                    <ul class="sub-menu">
                                        <li id="menu-item-612" class="menu-item menu-item-type-post_type menu-item-object-page menu-item-612">
                                            <a href="https://grains.org/about/the-councils-work/developing-markets/">{{ __('main.menu.council-work-markets') }}</a>
                                        </li>
                                        <li id="menu-item-615" class="menu-item menu-item-type-post_type menu-item-object-page menu-item-has-children menu-item-615">
                                            <a href="https://grains.org/about/the-councils-work/enabling-trade/">{{ __('main.menu.council-work-enabling') }}</a>
                                            <button class="dropdown-toggle" aria-expanded="false">
                                                <svg class="icon icon-angle-down" aria-hidden="true" role="img"><use href="#icon-angle-down" xlink:href="#icon-angle-down"></use></svg>
                                                <span class="svg-fallback icon-angle-down"></span>
                                                <span class="screen-reader-text">{{ __('main.menu.expand-child-menu') }}</span>
                                            </button>
                                            <ul class="sub-menu">
                                                <li id="menu-item-618"
                                                    class="menu-item menu-item-type-post_type menu-item-object-page menu-item-618">
                                                    <a href="https://grains.org/about/the-councils-work/enabling-trade/trade-agreements/">{{ __('main.menu.council-work-agreements') }}</a>
                                                </li>
                                                <li id="menu-item-6320" class="menu-item menu-item-type-post_type menu-item-object-page menu-item-6320">
                                                    <a href="https://grains.org/about/the-councils-work/enabling-trade/innovation-sustainibility/">{{ __('main.menu.council-work-production') }}</a>
                                                </li>
                                                <li id="menu-item-29910" class="menu-item menu-item-type-post_type menu-item-object-page menu-item-29910">
                                                    <a href="https://grains.org/about/the-councils-work/enabling-trade/sustainability/">{{ __('main.menu.council-work-sustainability') }}</a>
                                                </li>
                                            </ul>
                                        </li>
                                        <li id="menu-item-620" class="menu-item menu-item-type-post_type menu-item-object-page menu-item-620">
                                            <a href="https://grains.org/about/the-councils-work/improving-lives/">{{ __('main.menu.council-work-improving') }}</a>
                                        </li>
                                    </ul>
                                </li>
                                <li id="menu-item-625" class="menu-item menu-item-type-post_type menu-item-object-page menu-item-has-children menu-item-625">
                                    <a href="https://grains.org/about/advisory-teams/">{{ __('main.menu.council-advisory') }}</a>
                                    <button class="dropdown-toggle" aria-expanded="false">
                                        <svg class="icon icon-angle-down" aria-hidden="true" role="img"><use href="#icon-angle-down" xlink:href="#icon-angle-down"></use></svg>
                                        <span class="svg-fallback icon-angle-down"></span><span class="screen-reader-text">{{ __('main.menu.expand-child-menu') }}</span>
                                    </button>
                                    <ul class="sub-menu">
                                        <li id="menu-item-626" class="menu-item menu-item-type-post_type menu-item-object-page menu-item-626">
                                            <a href="https://grains.org/about/advisory-teams/asia/">{{ __('main.menu.council-advisory-asia') }}</a>
                                        </li>
                                        <li id="menu-item-6297" class="menu-item menu-item-type-post_type menu-item-object-page menu-item-6297">
                                            <a href="https://grains.org/about/advisory-teams/ethanol/">{{ __('main.menu.council-advisory-ethanol') }}</a>
                                        </li>
                                        <li id="menu-item-627" class="menu-item menu-item-type-post_type menu-item-object-page menu-item-627">
                                            <a href="https://grains.org/about/advisory-teams/innovation-sustainability/">{{ __('main.menu.council-advisory-innovation') }}</a>
                                        </li>
                                        <li id="menu-item-628" class="menu-item menu-item-type-post_type menu-item-object-page menu-item-628">
                                            <a href="https://grains.org/about/advisory-teams/middle-east-africa-south-asia/">{{ __('main.menu.council-advisory-middle-east') }}</a>
                                        </li>
                                        <li id="menu-item-6298" class="menu-item menu-item-type-post_type menu-item-object-page menu-item-6298">
                                            <a href="https://grains.org/about/advisory-teams/trade-policy/">{{ __('main.menu.council-advisory-policy') }}</a>
                                        </li>
                                        <li id="menu-item-629" class="menu-item menu-item-type-post_type menu-item-object-page menu-item-629">
                                            <a href="https://grains.org/about/advisory-teams/value-added/">{{ __('main.menu.council-advisory-value') }}</a>
                                        </li>
                                        <li id="menu-item-630" class="menu-item menu-item-type-post_type menu-item-object-page menu-item-630">
                                            <a href="https://grains.org/about/advisory-teams/western-hemisphere/">{{ __('main.menu.council-advisory-western') }}</a>
                                        </li>
                                    </ul>
                                </li>
                            </ul>
                        </li>
                        <li class="md:hidden">
                            <ul class="menu block-important main-menu__utility">
                                <li id="menu-item-102" class="menu-item menu-item-type-post_type menu-item-object-page menu-item-has-children menu-item-102">
                                    <a href="https://grains.org/membership/">{{ __('main.menu.council-membership') }}</a>
                                    <button class="dropdown-toggle" aria-expanded="false">
                                        <svg class="icon icon-angle-down" aria-hidden="true" role="img"><use href="#icon-angle-down" xlink:href="#icon-angle-down"></use></svg>
                                        <span class="svg-fallback icon-angle-down"></span>
                                        <span class="screen-reader-text">{{ __('main.menu.expand-child-menu') }}</span>
                                    </button>
                                    <ul class="sub-menu">
                                        <li id="menu-item-256" class="menu-item menu-item-type-post_type menu-item-object-page menu-item-256">
                                            <a href="https://grains.org/membership/member-directory/">{{ __('main.menu.council-membership-directory') }}</a>
                                        </li>
                                        <li id="menu-item-633" class="menu-item menu-item-type-post_type menu-item-object-page menu-item-633">
                                            <a href="https://grains.org/membership/about-usgc-membership/">{{ __('main.menu.council-membership-about') }}</a>
                                        </li>
                                    </ul>
                                </li>
                                <li id="menu-item-103" class="menu-item menu-item-type-post_type menu-item-object-page menu-item-103">
                                    <a href="https://grains.org/u-s-worldwide-offices/">{{ __('USGC Global Presence') }}</a>
                                </li>
                            </ul>
                        </li>
                    </ul>
                </div>
            </nav>
            <div class="search-container menu-item">
                <button aria-label="Open Search" class="plain-button block bg-transparent hover:bg-transparent p-0 md:pl-2 md:pr-4 search-trigger leading-none">
                    <svg class="mg-icon w-8 h-8 md:w-10 md:h-10"><use href="#icon-search" xlink:href="#icon-search"></use></svg>
                </button>
            </div>
            <div class="navicon-container menu-item">
                <button type="button" aria-label="Open navigation menu" class="plain-button menu-toggle bg-transparent hover:bg-transparent p-0" aria-expanded="false"><span class="menu-toggle__inner block"></span></button>
            </div>
            <div class="wp-translate menu-item z-10">
                <select class="lang-select" name="lang" id="lang">
                    @if(isset($country) && isset($compareCountry))
                        <option value="{{ route(__($route_name ?: 'routes.home', [], 'es'), ['tab' => $tab, 'country' => $country ? $country->id : null, 'compareCountry' => $compareCountry ? $compareCountry->id : null]) }}" @if(app()->getLocale() == 'es' || app()->getLocale() == 'es_MX') selected @endif>{{ __('main.select.lang.spanish') }}</option>
                        <option value="{{ route(__($route_name ?: 'routes.home', [], 'en'), ['tab' => $tab, 'country' => $country ? $country->id : null, 'compareCountry' => $compareCountry ? $compareCountry->id : null]) }}" @if(app()->getLocale() == 'en' || app()->getLocale() == 'en_US') selected @endif>{{ __('main.select.lang.english') }}</option>
                    @elseif (isset($country))
                        <option value="{{ route(__($route_name ?: 'routes.home', [], 'es'), ['tab' => $tab, 'country' => $country ? $country->id : null]) }}" @if(app()->getLocale() == 'es' || app()->getLocale() == 'es_MX') selected @endif>{{ __('main.select.lang.spanish') }}</option>
                        <option value="{{ route(__($route_name ?: 'routes.home', [], 'en'), ['tab' => $tab, 'country' => $country ? $country->id : null]) }}" @if(app()->getLocale() == 'en' || app()->getLocale() == 'en_US') selected @endif>{{ __('main.select.lang.english') }}</option>
                    @elseif ($route_name == 'routes.tools')
                        <option value="{{ route(__($route_name ?: 'routes.home', [], 'es'), ['tab' => $tab]) }}" @if(app()->getLocale() == 'es' || app()->getLocale() == 'es_MX') selected @endif>{{ __('main.select.lang.spanish') }}</option>
                        <option value="{{ route(__($route_name ?: 'routes.home', [], 'en'), ['tab' => $tab]) }}" @if(app()->getLocale() == 'en' || app()->getLocale() == 'en_US') selected @endif>{{ __('main.select.lang.english') }}</option>
                    @else
                        <option value="{{ route(__($route_name ?: 'routes.home', [], 'es')) }}" @if(app()->getLocale() == 'es' || app()->getLocale() == 'es_MX') selected @endif>{{ __('main.select.lang.spanish') }}</option>
                        <option value="{{ route(__($route_name ?: 'routes.home', [], 'en')) }}" @if(app()->getLocale() == 'en' || app()->getLocale() == 'en_US') selected @endif>{{ __('main.select.lang.english') }}</option>
                    @endif
                    {{-- <option value="{{ __('main.select.lang.french-code') }}">{{ __('main.select.lang.french') }}</option> --}}
                </select>
            </div>
            <div class="wp-translate menu-item @auth() @else hidden @endauth logout-container"><div class="user-info text-center"><a id="logout-button" href="{{ route('logout') }}" class="text-white">{{ __('main.modals.logout') }}</a></div></div>
            {{-- END TOP MENU --}}
        </div>
    </header>
    {{-- HEADER SECTION (LOGO AND TOP MENU) --}}
    {{-- SEARCH SECTION --}}
    <div class="search-wrap scrolling-touch overflow-y-scroll fixed pin shade-heavier--primary-darker text-white z-50 antialiased items-center">
        <div class="my-16 w-full p-0 px-4 xl:mx-auto relative xl:w-4/5">
            <form role="search" method="get" action="/search-results" class="search-form">
                <label for="search-form-61780a07bdda9">
                    <span class="screen-reader-text">Search for:</span>
                </label>
                <input type="search" id="search-form-61780a07bdda9" placeholder="ENTER KEYWORD" value="" name="q" class="search-field md:text-2xl border-0 bg-transparent text-white">
                <button type="submit" class="plain-button search-submit bg-transparent">
                    <svg aria-hidden="true" role="img" class="icon icon-search"><use href="#icon-search" xlink:href="#icon-search"></use></svg>
                    <span class="screen-reader-text">Search</span>
                </button>
            </form>
        </div>Qe
        <button type="button" aria-label="Close search" class="plain-button search-wrap__close bg-transparent hover:bg-transparent pin-t pin-r p-4 absolute">
            <svg aria-hidden="true" class="mg-icon mg-icon--large"><use href="#icon-close" xlink:href="#icon-close"></use></svg>
        </button>
    </div>
    {{-- END SEARCH SECTION --}}
    {{-- FULL PAGE MENU --}}
    <div class="menu-full-wrap scrolling-touch overflow-y-scroll fixed pin shade-heavier--primary-darker text-white z-50">
        <div class="my-16 mx-4 xl:mx-auto relative xl:w-4/5">
            <nav id="site-navigation-full" role="navigation" aria-label="Top Menu" class="main-navigation--full text-base text-white antialiased tracking-wide flex">
                <ul id="menu-full" class="main-menu main-menu--full w-3/4 flex flex-wrap heading-font">
                    <li class="menu-item menu-item-type-post_type menu-item-object-page menu-item-has-children menu-item-65">
                        <a>{{ __('main.menu.why') }}</a>
                        <ul class="sub-menu">
                            <li class="menu-item menu-item-type-post_type menu-item-object-page menu-item-66">
                                <a href="https://grains.org/why-trade-matters/about-grain-trade/">{{ __('main.menu.why-about') }}</a>
                            </li>
                            <li class="menu-item menu-item-type-post_type menu-item-object-page menu-item-has-children menu-item-36756">
                                <a href="https://grains.org/tradeschool/">{{ __('main.menu.why-trade') }}</a>
                                <ul class="sub-menu">
                                    <li class="menu-item menu-item-type-post_type menu-item-object-page menu-item-34031">
                                        <a href="https://grains.org/learn-about-trade/">{{ __('main.menu.why-trade-learn') }}</a>
                                    </li>
                                    <li class="menu-item menu-item-type-post_type menu-item-object-page menu-item-36757">
                                        <a href="https://grains.org/news-events/trade-toolkit/">{{ __('main.menu.why-trade-toolkit') }}</a>
                                    </li>
                                </ul>
                            </li>
                            <li class="menu-item menu-item-type-post_type menu-item-object-page menu-item-544">
                                <a href="https://grains.org/why-trade-matters/value-of-grain-exports-map/">{{ __('main.menu.why-value') }}</a>
                            </li>
                            <li class="menu-item menu-item-type-post_type menu-item-object-page menu-item-300">
                                <a href="https://grains.org/news-events/success-stories/">{{ __('main.menu.why-histories') }}</a>
                            </li>
                        </ul>
                    </li>
                    <li class="menu-item menu-item-type-post_type menu-item-object-page current-page-ancestor current-menu-ancestor current-menu-parent current-page-parent current_page_parent current_page_ancestor menu-item-has-children menu-item-75">
                        <a>{{ __('main.menu.b&s') }}</a>
                        <ul class="sub-menu">
                            <li class="menu-item menu-item-type-post_type menu-item-object-page page_item page-item-32 menu-item-has-children menu-item-5131">
                                <a href="https://grains.org/buying-selling/corn/" aria-current="page">{{ __('main.menu.b&s-corn') }}</a>
                                <ul class="sub-menu">
                                    <li class="menu-item menu-item-type-post_type menu-item-object-page menu-item-76">
                                        <a href="https://grains.org/buying-selling/corn/production-exports/">{{ __('main.menu.b&s-corn-production') }}</a>
                                    </li>
                                    <li class="menu-item menu-item-type-custom menu-item-object-custom menu-item-38420">
                                        <a href="https://grains.org/wp-content/uploads/2020/09/USGC-Tropical-Corn-Study-9-20-20.pdf">{{ __('main.menu.b&s-corn-storage') }}</a>
                                    </li>
                                    <li class="menu-item menu-item-type-post_type menu-item-object-page menu-item-545">
                                        <a href="https://grains.org/buying-selling/corn/commercial-grain-suppliers/">{{ __('main.menu.b&s-corn-commercial') }}</a>
                                    </li>
                                </ul>
                            </li>
                            <li class="menu-item menu-item-type-post_type menu-item-object-page menu-item-has-children menu-item-5142">
                                <a href="https://grains.org/buying-selling/sorghum/">{{ __('main.menu.b&s-sorghum') }}</a>
                                <ul class="sub-menu">
                                    <li class="menu-item menu-item-type-post_type menu-item-object-page menu-item-547">
                                        <a href="https://grains.org/buying-selling/sorghum/production-exports/">{{ __('main.menu.b&s-sorghum-production') }}</a>
                                    </li>
                                    <li class="menu-item menu-item-type-post_type menu-item-object-page menu-item-564">
                                        <a href="https://grains.org/buying-selling/sorghum/commercial-grain-suppliers/">{{ __('main.menu.b&s-sorghum-suppliers') }}</a>
                                    </li>
                                </ul>
                            </li>
                            <li class="menu-item menu-item-type-post_type menu-item-object-page menu-item-has-children menu-item-5148">
                                <a href="https://grains.org/buying-selling/barley/">{{ __('main.menu.b&s-barley') }}</a>
                                <ul class="sub-menu">
                                    <li class="menu-item menu-item-type-post_type menu-item-object-page menu-item-567">
                                        <a href="https://grains.org/buying-selling/barley/">{{ __('main.menu.b&s-barley-production') }}</a>
                                    </li>
                                    <li class="menu-item menu-item-type-post_type menu-item-object-page menu-item-566">
                                        <a href="https://grains.org/buying-selling/barley/feed-barley-malting-barley-malt-suppliers/">{{ __('main.menu.b&s-barley-suppliers') }}
                                    </li>
                                </ul>
                            </li>
                            <li class="menu-item menu-item-type-post_type menu-item-object-page menu-item-has-children menu-item-5155">
                                <a href="https://grains.org/buying-selling/ddgs/">{{ __('main.menu.b&s-ddgs') }}</a>
                                <ul class="sub-menu">
                                    <li class="menu-item menu-item-type-post_type menu-item-object-page menu-item-5157">
                                        <a href="https://grains.org/buying-selling/ddgs/production-exports/">{{ __('main.menu.b&s-ddgs-production') }}</a>
                                    </li>
                                    <li class="menu-item menu-item-type-post_type menu-item-object-page menu-item-569">
                                        <a href="https://grains.org/buying-selling/ddgs/ddgs-suppliers/">{{ __('main.menu.b&s-ddgs-suppliers') }}</a>
                                    </li>
                                    <li class="menu-item menu-item-type-post_type menu-item-object-page menu-item-570">
                                        <a href="https://grains.org/buying-selling/ddgs/user-handbook/">{{ __('main.menu.b&s-ddgs-handbook') }}</a>
                                    </li>
                                </ul>
                            </li>
                            <li class="menu-item menu-item-type-post_type menu-item-object-page menu-item-has-children menu-item-30401">
                                <a href="https://grains.org/buying-selling/ethanol-2/">{{ __('main.menu.b&s-ethanol') }}</a>
                                <ul class="sub-menu">
                                    <li class="menu-item menu-item-type-post_type menu-item-object-page menu-item-30396">
                                        <a href="https://grains.org/buying-selling/ethanol-2/ethanol-key-topics/">{{ __('main.menu.b&s-ethanol-key') }}</a>
                                    </li>
                                    <li class="menu-item menu-item-type-post_type menu-item-object-page menu-item-5180">
                                        <a href="https://grains.org/buying-selling/ethanol-2/ethanol/production-exports/">{{ __('main.menu.b&s-ethanol-production') }}</a>
                                    </li>
                                    <li class="menu-item menu-item-type-post_type menu-item-object-page menu-item-30397">
                                        <a href="https://grains.org/buying-selling/ethanol-2/ethanol-market-development/">{{ __('main.menu.b&s-ethanol-market') }}</a>
                                    </li>
                                    <li class="menu-item menu-item-type-post_type menu-item-object-page menu-item-30400">
                                        <a href="https://grains.org/buying-selling/ethanol-2/ethanol-market-information/">{{ __('main.menu.b&s-ethanol-information') }}</a>
                                    </li>
                                    <li class="menu-item menu-item-type-post_type menu-item-object-page menu-item-575">
                                        <a href="https://grains.org/buying-selling/ethanol-2/ethanol/ethanol-suppliers/">{{ __('main.menu.b&s-ethanol-suppliers') }}</a>
                                    </li>
                                    <li class="menu-item menu-item-type-post_type menu-item-object-page menu-item-577">
                                        <a href="https://grains.org/buying-selling/ethanol-2/ethanol/reports-analysis/">{{ __('main.menu.b&s-ethanol-reports') }}</a>
                                    </li>
                                    <li class="menu-item menu-item-type-post_type menu-item-object-page menu-item-31737">
                                        <a href="https://grains.org/markets-tools-data/resources-for-importers/ethanol-purchase-inquiry/">{{ __('main.menu.b&s-ethanol-inquiry') }}</a>
                                    </li>
                                </ul>
                            </li>
                            <li class="menu-item menu-item-type-post_type menu-item-object-page menu-item-has-children menu-item-5164">
                                <a href="https://grains.org/buying-selling/corn-gluten/">{{ __('main.menu.b&s-gluten') }}</a>
                                <ul class="sub-menu">
                                    <li class="menu-item menu-item-type-post_type menu-item-object-page menu-item-5166">
                                        <a href="https://grains.org/buying-selling/corn-gluten/production-exports/">{{ __('main.menu.b&s-gluten-production') }}</a>
                                    </li>
                                    <li class="menu-item menu-item-type-post_type menu-item-object-page menu-item-580">
                                        <a href="https://grains.org/buying-selling/corn-gluten/corn-gluten-meal-corn-gluten-feed-suppliers/">{{ __('main.menu.b&s-gluten-suppliers') }}</a>
                                    </li>
                                </ul>
                            </li>
                            <li class="menu-item menu-item-type-post_type menu-item-object-page menu-item-has-children menu-item-597">
                                <a href="https://grains.org/markets-tools-data/resources-for-importers/">{{ __('main.menu.b&s-resources') }}</a>
                                <ul class="sub-menu">
                                    <li class="menu-item menu-item-type-post_type menu-item-object-page menu-item-598">
                                        <a href="https://grains.org/markets-tools-data/resources-for-importers/importer-manual/">{{ __('main.menu.b&s-resources-manual') }}</a>
                                    </li>
                                    <li class="menu-item menu-item-type-post_type menu-item-object-page menu-item-595">
                                        <a href="https://grains.org/markets-tools-data/resources-for-importers/purchase-inquiry/">{{ __('main.menu.b&s-resources-inquiry') }}</a>
                                    </li>
                                    <li class="menu-item menu-item-type-post_type menu-item-object-page menu-item-599">
                                        <a href="https://grains.org/markets-tools-data/resources-for-importers/notice-to-exporters/">{{ __('main.menu.b&s-resources-notice') }}</a>
                                    </li>
                                    <li class="menu-item menu-item-type-post_type menu-item-object-page menu-item-6582">
                                        <a href="https://grains.org/markets-tools-data/resources-for-importers/commercial-grain-suppliers/">{{ __('main.menu.b&s-resources-suppliers') }}</a>
                                    </li>
                                </ul>
                            </li>
                        </ul>
                    </li>
                    <li class="menu-item menu-item-type-post_type menu-item-object-page menu-item-has-children menu-item-582">
                        <a>{{ __('main.menu.markets') }}</a>
                        <ul class="sub-menu">
                            <li class="menu-item menu-item-type-post_type menu-item-object-page menu-item-has-children menu-item-5122">
                                <a href="https://grains.org/markets-tools-data/tools/">{{ __('main.menu.markets-tools') }}</a>
                                <ul class="sub-menu">
                                    <li class="menu-item menu-item-type-post_type menu-item-object-page menu-item-5123">
                                        <a href="https://grains.org/markets-tools-data/tools/feed-grains-in-all-forms-portal/">{{ __('main.menu.markets-tools-grains') }}</a>
                                    </li>
                                    <li class="menu-item menu-item-type-post_type menu-item-object-page menu-item-583">
                                        <a href="https://grains.org/markets-tools-data/tools/top-u-s-export-customers/">{{ __('main.menu.markets-tools-grains') }}</a>
                                    </li>
                                    <li class="menu-item menu-item-type-post_type menu-item-object-page menu-item-584">
                                        <a href="https://grains.org/markets-tools-data/tools/converting-grain-units/">{{ __('main.menu.markets-tools-converting') }}</a>
                                    </li>
                                    <li class="menu-item menu-item-type-post_type menu-item-object-page current_page_item current-menu-item">
                                        <a href="{{ route(__('routes.home')) }}">{{ __('main.menu.markets-tools-latin-america') }}</a>
                                    </li>
                                </ul>
                            </li>
                            <li class="menu-item menu-item-type-post_type menu-item-object-page menu-item-has-children menu-item-585">
                                <a href="https://grains.org/markets-tools-data/reports/">{{ __('main.menu.markets-reports') }}</a>
                                <ul class="sub-menu">
                                    <li class="menu-item menu-item-type-post_type menu-item-object-page menu-item-25600">
                                        <a href="https://grains.org/markets-tools-data/reports/ddgs-weekly-report/">{{ __('main.menu.markets-reports-ddgs') }}</a>
                                    </li>
                                    <li class="menu-item menu-item-type-post_type menu-item-object-page menu-item-586">
                                        <a href="https://grains.org/markets-tools-data/reports/market-perspectives/">{{ __('main.menu.markets-reports-market') }}</a>
                                    </li>
                                    <li class="menu-item menu-item-type-post_type menu-item-object-page menu-item-5326">
                                        <a href="https://grains.org/markets-tools-data/reports/ethanol-market-and-pricing-data-report/">{{ __('main.menu.markets-reports-ethanol') }}</a>
                                    </li>
                                    <li class="menu-item menu-item-type-post_type menu-item-object-page menu-item-588">
                                        <a href="https://grains.org/markets-tools-data/reports/corn-harvest-quality-export-cargo-reports/">{{ __('main.menu.markets-reports-corn') }}</a>
                                    </li>
                                    <li class="menu-item menu-item-type-post_type menu-item-object-page menu-item-589">
                                        <a href="https://grains.org/markets-tools-data/reports/sorghum-harvest-quality-report/">{{ __('main.menu.markets-reports-sorghum') }}</a>
                                    </li>
                                    <li class="menu-item menu-item-type-post_type menu-item-object-page menu-item-590">
                                        <a href="https://grains.org/markets-tools-data/reports/usda-reports/">{{ __('main.menu.markets-reports-usda') }}</a>
                                    </li>
                                </ul>
                            </li>
                            <li
                                class="menu-item menu-item-type-post_type menu-item-object-page menu-item-has-children menu-item-591">
                                <a href="https://grains.org/markets-tools-data/markets/">{{ __('main.menu.markets-markets') }}</a>
                                <ul class="sub-menu">
                                    <li class="menu-item menu-item-type-post_type menu-item-object-page menu-item-592">
                                        <a href="https://grains.org/markets-tools-data/markets/market-profiles/">{{ __('main.menu.markets-markets-profiles') }}</a>
                                    </li>
                                    <li class="menu-item menu-item-type-post_type menu-item-object-page menu-item-593">
                                        <a href="https://grains.org/markets-tools-data/markets/fob-price-charts/">{{ __('main.menu.markets-markets-fob') }}</a>
                                    </li>
                                    <li class="menu-item menu-item-type-post_type menu-item-object-page menu-item-594">
                                        <a href="https://grains.org/markets-tools-data/markets/bulk-freight-indices/">{{ __('main.menu.markets-markets-bulk') }}</a>
                                    </li>
                                </ul>
                            </li>
                            <li class="menu-item menu-item-type-post_type menu-item-object-page menu-item-has-children menu-item-36758">
                                <a href="https://grains.org/markets-tools-data/resources-for-importers/">{{ __('main.menu.markets-resources') }}</a>
                                <ul class="sub-menu">
                                    <li class="menu-item menu-item-type-post_type menu-item-object-page menu-item-39628">
                                        <a href="https://grains.org/markets-tools-data/grain-handling-and-storage-manual/">{{ __('main.menu.markets-resources-grain') }}</a>
                                    </li>
                                    <li class="menu-item menu-item-type-post_type menu-item-object-page menu-item-36759">
                                        <a href="https://grains.org/markets-tools-data/resources-for-importers/importer-manual/">{{ __('main.menu.markets-resources-manual') }}</a>
                                    </li>
                                    <li class="menu-item menu-item-type-post_type menu-item-object-page menu-item-36760">
                                        <a href="https://grains.org/markets-tools-data/resources-for-importers/purchase-inquiry/">{{ __('main.menu.markets-resources-inquiry') }}</a>
                                    </li>
                                    <li class="menu-item menu-item-type-post_type menu-item-object-page menu-item-36761">
                                        <a href="https://grains.org/markets-tools-data/resources-for-importers/ethanol-purchase-inquiry/">{{ __('main.menu.markets-resources-ethanol') }}</a>
                                    </li>
                                    <li class="menu-item menu-item-type-post_type menu-item-object-page menu-item-36762">
                                        <a href="https://grains.org/markets-tools-data/resources-for-importers/notice-to-exporters/">{{ __('main.menu.markets-resources-notice') }}</a>
                                    </li>
                                    <li class="menu-item menu-item-type-post_type menu-item-object-page menu-item-36763">
                                        <a href="https://grains.org/markets-tools-data/resources-for-importers/commercial-grain-suppliers/">{{ __('main.menu.markets-resources-commercial') }}</a>
                                    </li>
                                </ul>
                            </li>
                        </ul>
                    </li>
                    <li class="menu-item menu-item-type-post_type menu-item-object-page menu-item-has-children menu-item-81">
                        <a>{{ __('main.menu.news') }}</a>
                        <ul class="sub-menu">
                            <li class="menu-item menu-item-type-post_type menu-item-object-page menu-item-600">
                                <a href="https://grains.org/news-events/events-upcoming-events-past-events/">{{ __('main.menu.news-events') }}</a>
                            </li>
                            <li class="menu-item menu-item-type-post_type menu-item-object-page menu-item-303">
                                <a href="https://grains.org/news-events/newsroom/">{{ __('main.menu.news-newsroom') }}</a>
                            </li>
                            <li class="menu-item menu-item-type-post_type menu-item-object-page menu-item-82">
                                <a href="https://grains.org/news-events/charts-analysis/">{{ __('main.menu.news-charts') }}</a>
                            </li>
                            <li class="menu-item menu-item-type-post_type menu-item-object-page menu-item-36764">
                                <a href="https://grains.org/tradeschool/">{{ __('main.menu.news-trade') }}</a>
                            </li>
                            <li class="menu-item menu-item-type-custom menu-item-object-custom menu-item-8939">
                                <a href="https://grains.org/2020-annual-report">{{ __('main.menu.news-usgc') }}</a>
                            </li>
                            <li class="menu-item menu-item-type-post_type menu-item-object-page menu-item-249">
                                <a href="https://grains.org/news-events/multimedia-resources/">{{ __('main.menu.news-resources') }}</a>
                            </li>
                            <li class="menu-item menu-item-type-post_type menu-item-object-page menu-item-601">
                                <a href="https://grains.org/why-trade-matters/success-stories/">{{ __('main.menu.news-success') }}</a>
                            </li>
                        </ul>
                    </li>
                    <li class="menu-item menu-item-type-post_type menu-item-object-page menu-item-has-children menu-item-84">
                        <a>{{ __('main.menu.council') }}</a>
                        <ul class="sub-menu">
                            <li class="menu-item menu-item-type-post_type menu-item-object-page menu-item-has-children menu-item-86">
                                <a href="https://grains.org/about/about-the-council/">{{ __('main.menu.council-about') }}</a>
                                <ul class="sub-menu">
                                    <li class="menu-item menu-item-type-post_type menu-item-object-page menu-item-8659">
                                        <a href="https://grains.org/about/about-the-council/mission-and-values/">{{ __('main.menu.council-about-mission') }}</a>
                                    </li>
                                    <li class="menu-item menu-item-type-post_type menu-item-object-page menu-item-603">
                                        <a href="https://grains.org/about/about-the-council/bylaws/">{{ __('main.menu.council-about-bylaws') }}</a>
                                    </li>
                                    <li class="menu-item menu-item-type-post_type menu-item-object-page menu-item-604">
                                        <a href="https://grains.org/about/about-the-council/employment/">{{ __('main.menu.council-about-employment') }}</a>
                                    </li>
                                </ul>
                            </li>
                            <li class="menu-item menu-item-type-custom menu-item-object-custom menu-item-has-children menu-item-36769">
                                <a href="#">{{ __('main.menu.council-presence') }}</a>
                                <ul class="sub-menu">
                                    <li class="menu-item menu-item-type-post_type menu-item-object-page menu-item-87">
                                        <a href="https://grains.org/about/about-the-council/usgc-offices/">{{ __('main.menu.council-presence-offices') }}</a>
                                    </li>
                                    <li class="menu-item menu-item-type-custom menu-item-object-custom menu-item-36771">
                                        <a href="https://grains.org/u-s-worldwide-offices/u-s-headquarters-office/">{{ __('main.menu.council-presence-headquarters') }}</a>
                                    </li>
                                </ul>
                            </li>
                            <li class="menu-item menu-item-type-post_type menu-item-object-page menu-item-has-children menu-item-85">
                                <a href="https://grains.org/about/leadership/">{{ __('main.menu.council-leadership') }}</a>
                                <ul class="sub-menu">
                                    <li class="menu-item menu-item-type-post_type menu-item-object-page menu-item-621">
                                        <a href="https://grains.org/about/leadership/board-of-directors/">{{ __('main.menu.council-leadership-board') }}</a>
                                    </li>
                                    <li class="menu-item menu-item-type-post_type menu-item-object-page menu-item-623">
                                        <a href="https://grains.org/about/leadership/advisory-team-leaders/">{{ __('main.menu.council-leadership-leaders') }}</a>
                                    </li>
                                    <li class="menu-item menu-item-type-post_type menu-item-object-page menu-item-622">
                                        <a href="https://grains.org/about/leadership/past-chairmen/">{{ __('main.menu.council-leadership-chairmen') }}</a>
                                    </li>
                                    <li class="menu-item menu-item-type-post_type menu-item-object-page menu-item-624">
                                        <a href="https://grains.org/about/leadership/lifetime-achievement-award-winners/">{{ __('main.menu.council-leadership-winners') }}</a>
                                    </li>
                                </ul>
                            </li>
                            <li class="hidden mdblock menu-item menu-item-type-post_type menu-item-object-page menu-item-has-children menu-item-7424">
                                <a href="https://grains.org/membership/">{{ __('main.menu.council-membership') }}</a>
                                <ul class="sub-menu">
                                    <li class="menu-item menu-item-type-post_type menu-item-object-page menu-item-7425">
                                        <a href="https://grains.org/membership/member-directory/">{{ __('main.menu.council-membership-directory') }}</a>
                                    </li>
                                    <li class="menu-item menu-item-type-post_type menu-item-object-page menu-item-7426">
                                        <a href="https://grains.org/membership/about-usgc-membership/">{{ __('main.menu.council-membership-about') }}</a>
                                    </li>
                                </ul>
                            </li>
                            <li class="menu-item menu-item-type-post_type menu-item-object-page menu-item-has-children menu-item-611">
                                <a href="https://grains.org/about/the-councils-work/">{{ __('main.menu.council-work') }}</a>
                                <ul class="sub-menu">
                                    <li class="menu-item menu-item-type-post_type menu-item-object-page menu-item-612">
                                        <a href="https://grains.org/about/the-councils-work/developing-markets/">{{ __('main.menu.council-work-markets') }}</a>
                                    </li>
                                    <li class="menu-item menu-item-type-post_type menu-item-object-page menu-item-has-children menu-item-615">
                                        <a href="https://grains.org/about/the-councils-work/enabling-trade/">{{ __('main.menu.council-work-enabling') }}</a>
                                        <ul class="sub-menu">
                                            <li class="menu-item menu-item-type-post_type menu-item-object-page menu-item-618">
                                                <a href="https://grains.org/about/the-councils-work/enabling-trade/trade-agreements/">{{ __('main.menu.council-work-enabling') }}</a>
                                            </li>
                                            <li class="menu-item menu-item-type-post_type menu-item-object-page menu-item-6320">
                                                <a href="https://grains.org/about/the-councils-work/enabling-trade/innovation-sustainibility/">{{ __('main.menu.council-work-production') }}</a>
                                            </li>
                                            <li class="menu-item menu-item-type-post_type menu-item-object-page menu-item-29910">
                                                <a href="https://grains.org/about/the-councils-work/enabling-trade/sustainability/">{{ __('main.menu.council-work-sustainability') }}</a>
                                            </li>
                                        </ul>
                                    </li>
                                    <li class="menu-item menu-item-type-post_type menu-item-object-page menu-item-620">
                                        <a href="https://grains.org/about/the-councils-work/improving-lives/">{{ __('main.menu.council-work-improving') }}</a>
                                    </li>
                                </ul>
                            </li>
                            <li class="menu-item menu-item-type-post_type menu-item-object-page menu-item-has-children menu-item-625">
                                <a href="https://grains.org/about/advisory-teams/">{{ __('main.menu.council-advisory') }}</a>
                                <ul class="sub-menu">
                                    <li class="menu-item menu-item-type-post_type menu-item-object-page menu-item-626">
                                        <a href="https://grains.org/about/advisory-teams/asia/">{{ __('main.menu.council-advisory-asia') }}</a>
                                    </li>
                                    <li class="menu-item menu-item-type-post_type menu-item-object-page menu-item-6297">
                                        <a href="https://grains.org/about/advisory-teams/ethanol/">{{ __('main.menu.council-advisory-ethanol') }}</a>
                                    </li>
                                    <li class="menu-item menu-item-type-post_type menu-item-object-page menu-item-627">
                                        <a href="https://grains.org/about/advisory-teams/innovation-sustainability/">{{ __('main.menu.council-advisory-innovation') }}</a>
                                    </li>
                                    <li class="menu-item menu-item-type-post_type menu-item-object-page menu-item-628">
                                        <a href="https://grains.org/about/advisory-teams/middle-east-africa-south-asia/">{{ __('main.menu.council-advisory-middle-east') }}</a>
                                    </li>
                                    <li class="menu-item menu-item-type-post_type menu-item-object-page menu-item-6298">
                                        <a href="https://grains.org/about/advisory-teams/trade-policy/">{{ __('main.menu.council-advisory-policy') }}</a>
                                    </li>
                                    <li class="menu-item menu-item-type-post_type menu-item-object-page menu-item-629">
                                        <a href="https://grains.org/about/advisory-teams/value-added/">{{ __('main.menu.council-advisory-value') }}</a>
                                    </li>
                                    <li class="menu-item menu-item-type-post_type menu-item-object-page menu-item-630">
                                        <a href="https://grains.org/about/advisory-teams/western-hemisphere/">{{ __('main.menu.council-advisory-western') }}</a>
                                    </li>
                                </ul>
                            </li>
                        </ul>
                    </li>
                </ul>
                <ul id="menu-full-utility" class="main-menu main-menu--utility pl-4 lg:pl-8 w-1/4 border-l">
                    <li class="menu-item menu-item-type-post_type menu-item-object-page menu-item-has-children menu-item-102">
                        <a href="https://grains.org/membership/" class="py-2 px-4">{{ __('main.menu.council-membership') }}</a>
                        <ul class="sub-menu">
                            <li class="menu-item menu-item-type-post_type menu-item-object-page menu-item-256">
                                <a href="https://grains.org/membership/member-directory/" class="py-2 px-4">{{ __('main.menu.council-membership-directory') }}</a>
                            </li>
                            <li class="menu-item menu-item-type-post_type menu-item-object-page menu-item-633">
                                <a href="https://grains.org/membership/about-usgc-membership/" class="py-2 px-4">{{ __('main.menu.council-membership-about') }}</a>
                            </li>
                        </ul>
                    </li>
                    <li class="menu-item menu-item-type-post_type menu-item-object-page menu-item-103">
                        <a href="https://grains.org/u-s-worldwide-offices/" class="py-2 px-4">{{ __('main.menu.global-presence') }}</a>
                    </li>
                </ul>
            </nav>
        </div>
        <button type="button" aria-label="Close Menu" class="plain-button close-menu-full bg-transparent hover:bg-transparent pin-t pin-r p-4 absolute">
            <svg aria-hidden="true" class="mg-icon mg-icon--large"><use href="#icon-close" xlink:href="#icon-close"></use></svg>
        </button>
    </div>
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
