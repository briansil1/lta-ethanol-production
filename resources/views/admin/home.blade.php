@extends('layouts.admin-main')

@section('title', __('admin.home.title'))

@section('scriptvars')
    <script type="application/javascript">
        let _error = false;
        @error('password')
            _error = true;
        @enderror
    </script>
@endsection

@push('styles')
    <link rel="stylesheet" href="{{ asset('css/admin/home.css') }}">
@endpush

@push('scripts')
    <script src="{{ asset('js/admin/home.js') }}"></script>
@endpush

@section('content')
    <div class="site-content-contain z-10">
        <div id="content" class="site-content">
            <div id="primary" class="content-area mg-banded-secondary-lightest mg-noise">
                <main id="main" role="main" class="site-main">
                    <div class="mg-banded-primary-darkest text-white white-links antialiased">
                    </div>
                    <div class="back-blue text-center">
                        <h2 class="h1 uppercase text-2xl md:text-5xl container oswald"><a href="{{ route(__('routes.home')) }}" class="text-white">{{ __('dynamic.content.profiles') }}</a></h2>
                    </div>
                    <div class="header-img">
                        <div class="w-full mg-wrap mx-auto px-6 box-sizing-content flex flex-col items-center justify-center py-14 relative z-10">
                            <div class="text-center w-full box-sizing-border">
                                <div class="dynamic-flex-area md:flex flex-wrap justify-center mt-20 col-lg-5 mx-auto text-shadow">
                                    <a href="#" id="reports" class="flex-1 mg-button mg-button--larger mg-button--tertiary mx-4 p-3 flex  items-center text-base md:text-lg lg:text-3xl " style="flex-direction: column;">
                                        <div class="d-flex justify-content-between align-items-center w-100 py-3 px-4">
                                            <span class="fs-4">{{ __('admin.content.download-report') }}</span>
                                            <svg class="mg-icon w-6 h-6 md:w-12 md:h-12"><use href="#icon-angle-right" xlink:href="#icon-angle-right"></use></svg>
                                        </div>
                                    </a>
                                </div>
                            </div>
                        </div>
                    </div>
                </main>
            </div>
        </div>
        <div id="content" class="site-content">
            <div class="modal fade" id="passModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                <div class="modal-dialog modal-lg">
                    <div class="modal-content border-0">
                        <ul class="nav nav-tabs d-flex " id="myTab" role="tablist">
                            <li class="nav-item col-12" role="presentation">
                                <span class="nav-link-2 active oswald">{{ __('admin.main.verify') }}</span>
                            </li>
                        </ul>
                        <div class="tab-content">
                            <div class="tab-pane fade show active" id="verify-pass">
                                <div class="d-flex justify-content-center pb-5 mb-5">
                                    <form id="download-form" method="post" action="{{ route('admin-get-users') }}" class="px-3 py-5 col-lg-8 col-12 pb-5">
                                        @csrf
                                        @error('password')
                                            <div class="login-errors-container mb-3">
                                                <label for="" class="form-label login-errors">
                                                    {{$message}}
                                                </label>
                                            </div>
                                        @enderror
                                        <div class="mb-3">
                                            <label for="password" class="form-label">{{ __('admin.main.password') }}</label>
                                            <input name="password" type="password" class="form-control ws-cs" required>
                                        </div>
                                        <div class="d-flex justify-content-center pt-4">
                                            <button type="submit" class="btn btn-primary px-4 oswald">{{ __('admin.main.submit') }}</button>
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <footer id="colophon" role="contentinfo" class="relative text-white site-footer mg-banded-primary antialiased uppercase text-base border-0 z-10 sm:text-left print-break-avoid">
                <div class="wrap xl:flex items-center">
                    <div class="flex-1 text-sm leading-normal lg:leading-loose">
                        <aside role="complementary" aria-label="Footer" class="widget-area">
                            <picture>
                                <source data-lazy-srcset="{{ asset('images/grains-symbol.svg') }}" srcset="{{ asset('images/grains-symbol.svg') }}" />
                                <img src="{{ asset('images/grains-symbol.png') }}" alt="flat graphic symbolizing a grain plant" data-lazy-src="{{ asset('images/grains-symbol.png') }}" data-ll-status="loading" class="mg-icon--larger md:float-left mt-1 md:mr-4 no-print lazyloading" />
                                <noscript>
                                    <img src="{{ asset('images/grains-symbol.png') }}" alt="flat graphic symbolizing a grain plant" class="mg-icon--larger md:float-left mt-1 md:mr-4 no-print" />
                                </noscript>
                            </picture>
                            <div class="site-copyright">{{ __('main.footer.site-name') }}</div>
                            <section id="custom_html-2" class="widget_text widget widget_custom_html">
                                <h2 class="widget-title">USGC Info</h2>
                                <div class="textwidget custom-html-widget">
                                    20 F Street NW, Suite 900, Washington, DC 20001 | TEL: <a href="tel:202.789.0789">202.789.0789</a> | FAX: <a href="tel:202.898.0522">202.898.0522</a>
                                    <p>
                                        <a href="https://grains.org/privacy/">{{ __('main.footer.privacy-policy') }}</a> | <a href="https://grains.org/cookies/">{{ __('main.footer.cookies-policy') }}</a> | <a href="https://grains.org/employment/">{{ __('main.footer.eeo-policy') }}</a> | <a href="https://www.usda.gov/non-discrimination-statement">{{ __('main.footer.non-discrimination-policy') }}</a>
                                    </p>
                                </div>
                            </section>
                        </aside>
                    </div>
                    <div class="xl:w-1/3 xl:flex xl:justify-end text-sm">
                        <nav role="navigation" aria-label="Social Links Menu" class="social-navigation mt-4 xl:mt-0">
                            <ul id="menu-social" class="social-links-menu mg-hover-menu social-icons">
                                <div class="menu-social-container">
                                    <li id="menu-item-88" class="menu-item menu-item-type-custom menu-item-object-custom menu-item-88">
                                        <a href="https://www.facebook.com/usgrainscouncil">
                                            <svg class="icon-social icon"><use xlink:href="#icon-facebook"></use></svg>
                                            <span class="screen-reader-text">Facebook</span>
                                        </a>
                                    </li>
                                    <li id="menu-item-89" class="menu-item menu-item-type-custom menu-item-object-custom menu-item-89">
                                        <a href="http://twitter.com/usgc">
                                            <svg class="icon-social icon"><use xlink:href="#icon-twitter"></use></svg>
                                            <span class="screen-reader-text">Twitter</span>
                                        </a>
                                    </li>
                                    <li id="menu-item-91" class="menu-item menu-item-type-custom menu-item-object-custom menu-item-91">
                                        <a href="https://www.instagram.com/usgrains/">
                                            <svg class="icon-social icon"><use xlink:href="#icon-instagram"></use></svg>
                                            <span class="screen-reader-text">Instagram</span>
                                        </a>
                                    </li>
                                    <li id="menu-item-90" class="menu-item menu-item-type-custom menu-item-object-custom menu-item-90">
                                        <a href="http://www.youtube.com/user/USGrainsCouncil">
                                            <svg class="icon-social icon"><use xlink:href="#icon-youtube"></use></svg>
                                            <span class="screen-reader-text">Youtube</span>
                                        </a>
                                    </li>
                                    <li id="menu-item-92" class="menu-item menu-item-type-custom menu-item-object-custom menu-item-92">
                                        <a href="https://usgrains.photoshelter.com/galleries">
                                            <svg class="icon-social icon"><use xlink:href="#icon-photoshelter"></use></svg>
                                            <span class="screen-reader-text">Photoshelter</span>
                                        </a>
                                    </li>
                                    <li id="menu-item-5106" class="menu-item menu-item-type-custom menu-item-object-custom menu-item-5106">
                                        <a href="https://soundcloud.com/usgc">
                                            <svg class="icon-social icon"><use xlink:href="#icon-soundcloud"></use></svg>
                                            <span class="screen-reader-text">Soundcloud</span>
                                        </a>
                                    </li>
                                </div>
                            </ul>
                        </nav>
                    </div>
                </div>
            </footer>
        </div>
    </div>
@endsection
