@extends('layouts.main', [
    'route_name' => 'routes.home'
])

@section('title', __('main.title'))

@section('scriptvars')
    <script type="application/javascript">
        var _url_home = "{{ route(__('routes.home')) }}";
        var _url_post_register = "{{ route('register') }}";
        var _url_post_login = "{{ route('login') }}";
        var _url_post_request_token = "{{ route('password.email') }}";
        var _url_post_reset_pass = "{{ route('password.update') }}";
        var _url_tools = "{{ route(__('routes.tools'), ['tab' => 1]) }}";
        var _csrf_token = "{{ csrf_token() }}";
        var _is_logged = @auth true @else false @endauth;
        var _auth_modal = null;
        var _tools_modal = null;
        var _reset_pass_modal = null;
        var _token_form_modal = null;
        var _show_reset_form = {{ $token ? 'true' : 'false' }};
        var _getPDFUrl = function (id) {
            return '{{ route('get-PDF') }}' + '/' + id;
        };
    </script>
@endsection

@push('scripts')
    <script src="{{ asset('js/home.js') }}"></script>
@endpush

@section('content')
    <div class="site-content-contain z-10">
        <div id="content" class="site-content">
            <div id="primary" class="content-area mg-banded-secondary-lightest mg-noise">
                <main id="main" role="main" class="site-main">
                    <div class="mg-banded-primary-darkest text-white white-links antialiased">
                    </div>
                    <div class="back-blue text-center">
                        <h2 class="h1 uppercase text-2xl md:text-5xl text-white container oswald">{{ __('main.content.profiles') }} <br> {{ __('main.content.profiles-2') }}</h2>
                        <h3 class="text-white mt-0 pt-0 oswald">{{ __('main.content.america') }}</h3>
                        <p class="text-white text-center">
                            {{ __('main.content.detail') }}
                        </p>
                    </div>
                    <div class="header-img">
                        <div class="w-full mg-wrap mx-auto px-6 box-sizing-content flex flex-col items-center justify-center py-14 relative z-10">
                            <div class="text-center w-full box-sizing-border">
                                <div class="dynamic-flex-area md:flex flex-wrap justify-center mt-12 md:mt-40 xl:mx-18 col-lg-9 mx-auto text-shadow">
                                    <a href="/buying-selling/corn/commercial-grain-suppliers/" id="reports" class="flex-1 mg-button mg-button--larger mg-button--tertiary mx-4 p-3 flex  items-center text-base md:text-lg lg:text-3xl " style="flex-direction: column;">
                                        <div class="d-flex justify-content-between align-items-center w-100 pb-3">
                                            <img src="{{ asset('images/map.png') }}" alt="" class="hero-sec-img">
                                            <span class="fs-4">{{ __('main.content.report') }}</span>
                                            <svg class="mg-icon w-6 h-6 md:w-12 md:h-12"><use href="#icon-angle-right" xlink:href="#icon-angle-right"></use></svg>
                                        </div>
                                        <p class="card-p">
                                            {{ __('main.content.report-detail') }}
                                        </p>
                                    </a>
                                    <a href="#" id="tools" class="flex-1 mg-button mg-button--larger mg-button--tertiary mx-4 p-3 flex  items-center text-base md:text-lg lg:text-3xl" style="flex-direction: column;">
                                        <div class="d-flex justify-content-between align-items-center w-100 pb-3">
                                            <img src="{{ asset('images/graph.png') }}" alt="" class="hero-sec-img-2 ms-3">
                                            <span class="fs-4">{{ __('main.content.dynamic-tool') }} <br> {{ __('main.content.dynamic-tool-2') }}</span>
                                            <svg class="mg-icon w-6 h-6 md:w-12 md:h-12"><use href="#icon-angle-right" xlink:href="#icon-angle-right"></use></svg>
                                        </div>
                                        <p class="card-p">
                                            {{ __('main.content.dynamic-tool-detail') }}
                                        </p>
                                    </a>
                                </div>
                            </div>
                        </div>
                    </div>
                </main>
            </div>
        </div>
        <div id="reports-container" class="off-white pb-5">
            <div class="container">
                <div class="user-info text-right brown-line @auth() @else hidden @endauth logout-container">
                    <a href="{{ route('logout') }}" id="logout-button-2"><img src="{{ asset('images/logout.png') }}" class="img-fluid" style="max-width: 10px; color: rgb(64, 47, 21);">{{ __('main.modals.logout') }}</a>
                </div>
                <div class="row mx-0 pt-3">
                    <div class="col-lg-6">
                        <h3 class="mb-0">{{ __('main.content.america') }}</h3>
                        <p>{{ __('main.content.report-section.description') }}</p>
                        <strong>{{ __('main.content.report-section.sections') }}</strong>
                        <div class="ps-lg-4 pt-2">
                            <p class="mb-0"><small class="text-warning">●</small> {{ __('main.content.report-section.sections-options-1') }}</p>
                            <p class="mb-0"><small class="text-warning">●</small> {{ __('main.content.report-section.sections-options-2') }}</p>
                            <p class="mb-0"><small class="text-warning">●</small> {{ __('main.content.report-section.sections-options-3') }}</p>
                            <p class="mb-0"><small class="text-warning">●</small> {{ __('main.content.report-section.sections-options-4') }}</p>
                        </div>
                        <p class="pt-4" style="font-weight: 500;">{{ __('main.content.report-section.description-2') }}</p>
                        <p class="pt-4 @if(app()->getLocale() == 'en' || app()->getLocale() == 'en_US') hidden @endif" style="font-weight: 500; font-size: 18px;">{{ __('main.content.report-section.select-country') }}</p>
                        <select name="country" class="form-select" id="country">
                            @foreach($reports as $report)
                                <option value="{{ $report->id }}">{{ __('countries.' . $report->country->name) }}</option>
                            @endforeach
                        </select>
                        <div class="d-flex justify-content-center pt-4">
                            <button id="download-report" type="submit" class="btn btn-primary">{{ __('main.content.report-section.download-button') }}</button>
                        </div>
                        <div class="card mt-5">
                            <div class="card-header">
                                {{ __('main.content.report-section.what-you-need') }}
                            </div>
                            <div class="card-body">
                                <p class="mb-0 d-flex "><small class="text-warning pe-2">●</small>
                                    {{ __('main.content.report-section.what-you-need-element-1') }}
                                </p>
                                <p class="mb-0 d-flex pt-3"><small class="text-warning pe-2 ">●</small>
                                    {{ __('main.content.report-section.what-you-need-element-2') }}
                                </p>
                                <p class="mb-0 d-flex pt-3"><small class="text-warning pe-2 ">●</small>
                                    {{ __('main.content.report-section.what-you-need-element-3') }}
                                </p>
                                <p class="mb-0 d-flex pt-3"><small class="text-warning pe-2 ">●</small>
                                    {{ __('main.content.report-section.what-you-need-element-4') }}
                                </p>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-6">
                        <img src="{{ asset(__('main.content.report-section.image-url')) }}" class="img-fluid" alt="">
                    </div>
                </div>
            </div>
        </div>
        <div id="content" class="site-content">
            <div id="primary" class="content-area mg-banded-secondary-lightest mg-noise">
                <main id="main" role="main" class="site-main">
                    <div class="mg-banded-primary-darkest text-white white-links antialiased">
                    </div>
                    <div class="footer-img">
                        <div class="w-full mg-wrap mx-auto px-6 box-sizing-content flex flex-col items-center justify-center py-14 relative z-10">
                            <div class="text-center w-full box-sizing-border">
                                <div class="dynamic-flex-area md:flex flex-wrap justify-center  xl:mx-18 col-lg-5 mx-auto text-shadow">
                                    <h1 style="font-size: 30px; font-weight:800 !important; letter-spacing: unset;">{{ __('main.content.explore-dynamic-tool') }}</h1>
                                    <a id="tools-secondary" href="#" class="flex-1 mg-button mg-button--larger mg-button--tertiary mx-4 p-3 flex  items-center text-base md:text-lg lg:text-3xl " style="flex-direction: column;">
                                        <div class="d-flex justify-content-between align-items-center w-100 ">
                                            <img src="{{ asset('images/graph.png') }}" alt="" class="hero-sec-img ms-3">
                                            <span class="fs-4">{{ __('main.content.explore-dynamic-tool-button') }}</span>
                                            <svg class="mg-icon w-6 h-6 md:w-12 md:h-12"><use href="#icon-angle-right" xlink:href="#icon-angle-right"></use></svg>
                                        </div>
                                    </a>
                                </div>
                            </div>
                        </div>
                    </div>
                </main>
            </div>
            <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                <div class="modal-dialog modal-lg">
                    <div class="modal-content border-0">
                        <ul class="nav nav-tabs d-flex " id="myTab" role="tablist">
                            <li class="nav-item col-6" role="presentation">
                                <span class="nav-link-2 active oswald" id="home-tab" data-bs-toggle="tab" data-bs-target="#home" type="span" role="tab" aria-controls="home" aria-selected="true">{{ __('main.modals.login') }}</span>
                            </li>
                            <li class="nav-item col-6" role="presentation">
                                <span class="nav-link-2 oswald" id="profile-tab" data-bs-toggle="tab" data-bs-target="#profile" type="span" role="tab" aria-controls="profile" aria-selected="false">{{ __('main.modals.sign-up') }}</span>
                            </li>
                        </ul>
                        <div class="tab-content" id="myTabContent">
                            <div class="tab-pane fade show active" id="home" role="tabpanel" aria-labelledby="home-tab">
                                <div class="d-flex justify-content-center pb-5 mb-5">
                                    <form id="login-form" method="post" action="{{ route('login') }}" class="px-3 py-5 col-lg-8 col-12 pb-5">
                                        <input type="hidden" name="user_locale" value="{{ app()->getLocale() }}" />
                                        <div class="login-errors-container mb-3 d-none">
                                            <label for="" class="form-label login-errors"></label>
                                        </div>
                                        <div class="mb-3">
                                            <label for="exampleInputEmail1" class="form-label">{{ __('main.modals.email') }}</label>
                                            <input name="email" type="email" class="form-control ws-cs" aria-describedby="emailHelp" required>
                                        </div>
                                        <div class="mb-3">
                                            <label for="exampleInputPassword1" class="form-label ">{{ __('main.modals.password') }}</label>
                                            <input name="password" type="password" class="form-control ws-cs" id="exampleInputPassword1" required>
                                        </div>
                                        <div class="d-flex justify-content-center pt-4">
                                            <button type="submit" class="btn btn-primary px-4 oswald">{{ __('main.modals.login-button') }}</button>
                                        </div>
                                        <p class="text-center m-1"><small><a id="forgot-your-password-link" href="#">{{ __('main.modals.forgot-question') }}</a></small></p>
                                        <p class="ws-p pt-4">
                                            {{ __('main.modals.privacy-text') }} <a href="https://grains.org/privacy/">https://grains.org/privacy/</a>
                                        </p>
                                    </form>
                                </div>
                            </div>
                            <div class="tab-pane fade" id="profile" role="tabpanel" aria-labelledby="profile-tab">
                                <div class="d-flex justify-content-center pb-5 mb-5">
                                    <form id="registry-form" method="post" action="{{ route('register') }}" class="pt-4 col-10">
                                        <input type="hidden" name="user_locale" value="{{ app()->getLocale() }}" />
                                        <div>
                                            <p class="ws-p">
                                                {{ __('main.modals.sign-up-text') }} <strong>{{ __('main.modals.sign-up-text-bold') }}</strong>
                                            </p>
                                        </div>
                                        <div class="text-right ws-form-head pb-1 mb-4">
                                            <small class="text-danger"> {{ __('main.modals.mandatory-fields') }}</small>
                                        </div>
                                        <div class="sign-up-errors-container mb-2 d-none">
                                            <label class="form-label sign-up-errors"></label>
                                        </div>
                                        <div class="mb-2 mx-0">
                                            <label for="exampleInputEmail1" class="form-label">{{ __('main.modals.fullname') }} <small class="text-danger">*</small></label>
                                            <input type="text" class="form-control" aria-describedby="emailHelp" name="name" required />
                                        </div>
                                        <div class="row mx-0">
                                            <div class="mb-2 col-lg-6 ps-0 pe-lg-2 pe-0">
                                                <label for="exampleInputEmail1" class="form-label">{{ __('main.modals.company') }} <small class="text-danger">*</small></label>
                                                <input type="text" class="form-control" aria-describedby="emailHelp" name="company" required />
                                            </div>
                                            <div class="mb-2 col-lg-6 pe-0 ps-0">
                                                <label for="exampleInputEmail1" class="form-label">{{ __('main.modals.job-title') }} <small class="text-danger">*</small></label>
                                                <input type="text" class="form-control" aria-describedby="emailHelp" name="position" required />
                                            </div>
                                        </div>
                                        <div class="row mx-0">
                                            <div class="mb-2 col-lg-4 ps-0 pe-lg-2 pe-0">
                                                <label for="exampleInputEmail1" class="form-label">{{ __('main.modals.country') }}<small class="text-danger">*</small></label>
                                                <input type="text" class="form-control" aria-describedby="emailHelp" name="country" required />
                                            </div>
                                            <div class="mb-2 col-lg-8 pe-0 ps-0">
                                                <label for="exampleInputEmail1" class="form-label d-flex justify-content-between align-items-center">
                                                    <div>
                                                        {{ __('main.modals.phone') }} <small class="text-danger">*</small>
                                                    </div>
                                                    <div id="emailHelp" class="form-text">
                                                        {{ __('main.modals.phone-rules') }}
                                                    </div>
                                                </label>
                                                <input type="text" class="form-control" aria-describedby="emailHelp" name="phone" required />
                                            </div>
                                        </div>
                                        <div class="mb-2">
                                            <label for="exampleInputEmail1" class="form-label d-flex justify-content-between align-items-center">
                                                <div>
                                                    {{ __('main.modals.registry-email') }} <small class="text-danger">*</small>
                                                </div>
                                                <div id="emailHelp" class="form-text">
                                                    {{ __('main.modals.registry-email-rules') }}
                                                </div>
                                            </label>
                                            <input type="text" class="form-control" aria-describedby="emailHelp" name="email" required />
                                        </div>
                                        <div class="mb-2">
                                            <label for="exampleInputEmail1" class="form-label d-flex justify-content-between align-items-center">
                                                <div>
                                                    {{ __('main.modals.registry-password') }} <small class="text-danger">*</small>
                                                </div>
                                                <div id="emailHelp" class="form-text">
                                                    {{ __('main.modals.registry-password-rules') }}
                                                </div>
                                            </label>
                                            <input type="password" class="form-control" aria-describedby="emailHelp" name="password" required />
                                        </div>
                                        <div class="mb-2">
                                            <label for="exampleInputEmail1" class="form-label d-flex justify-content-between align-items-center">
                                                <div>
                                                    {{ __('main.modals.registry-password-confirmation') }} <small class="text-danger">*</small>
                                                </div>
                                                <div id="emailHelp" class="form-text">
                                                    {{ __('main.modals.registry-password-confirmation-rules') }}
                                                </div>
                                            </label>
                                            <input type="password" class="form-control" aria-describedby="emailHelp" name="password_confirmation" required />
                                        </div>
                                        <div class="d-flex justify-content-center pt-3">
                                            <button type="submit" class="btn btn-primary oswald" id="registry-button">
                                                {{ __('main.modals.registry-button') }}
                                            </button>
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="modal fade" id="exampleModal2" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                <div class="modal-dialog modal-lg">
                    <div class="modal-content text-center border-0">
                        <h2 class="my-5">{{ __('main.modals.coming-soon') }}</h2>
                    </div>
                </div>
            </div>
            <div class="modal fade" id="reset-password" tabindex="-1" aria-labelledby="#Restore-password" aria-hidden="true">
                <div class="modal-dialog modal-lg">
                    <div class="modal-content text-center border-0">

                        <div class="d-flex justify-content-center pb-5 mb-5">
                            <form id="reset-token-form" class="px-3 py-5 col-lg-8 col-12 pb-5">
                                <input type="hidden" name="token" value="{{ $token ?: '' }}">
                                <input type="hidden" name="user_locale" value="{{ app()->getLocale() }}">
                                <h3>{{ __('main.modals.reset-form-title') }}</h3>
                                <div class="reset-form-errors-container mb-3 d-none">
                                    <label for="" class="form-label reset-form-errors"></label>
                                </div>
                                <div class="mb-3">
                                    <label for="email" class="form-label ">{{ __('main.modals.reset-form-email') }}</label>
                                    <input type="email" class="form-control ws-cs" name="email" id="email" required>
                                </div>
                                <div class="mb-3">
                                    <label for="password" class="form-label ">{{ __('main.modals.reset-form-password') }}</label>
                                    <input type="password" name="password" class="form-control ws-cs" id="password" required>
                                </div>
                                <div class="mb-3">
                                    <label for="password_confirmation" class="form-label ">{{ __('main.modals.reset-form-password-confirmation') }}</label>
                                    <input type="password" class="form-control ws-cs" name="password_confirmation" id="password_confirmation" required>
                                </div>
                                <div class="d-flex justify-content-center pt-4">
                                    <button type="submit" class="btn btn-primary px-4 oswald">{{ __('main.modals.reset-form-send') }}</button>
                                </div>
                                <p class="ws-p pt-4">
                                    {{ __('main.modals.reset-form-privacy') }} <a href="https://grains.org/privacy/">https://grains.org/privacy/</a>
                                </p>
                            </form>
                        </div>

                    </div>
                </div>
            </div>
            <div class="modal fade" id="request-reset" tabindex="-1" aria-labelledby="#Restore-password" aria-hidden="true">
                <div class="modal-dialog modal-lg">
                    <div class="modal-content text-center border-0">
                        <div class="d-flex justify-content-center pb-5 mb-5">
                            <form id="reset-request-form" class="px-3 py-5 col-lg-8 col-12 pb-5">
                                <input type="hidden" name="user_locale" value="{{ app()->getLocale() }}">
                                <h3>{{ __('main.modals.request-reset-title') }}</h3>
                                <p class="wp-p">
                                    {{ __('main.modals.request-reset-instructions') }}
                                </p>
                                <div class="reset-request-errors-container mb-3 d-none">
                                    <label for="" class="form-label reset-request-errors"></label>
                                </div>
                                <div class="mb-3">
                                    <label for="exampleInputEmail1" class="form-label ">{{ __('main.modals.request-reset-email') }}</label>
                                    <input type="email" name="email" class="form-control ws-cs" id="email" required>
                                </div>
                                <div class="d-flex justify-content-center pt-4">
                                    <button type="submit" class="btn btn-primary px-4 oswald">{{ __('main.modals.request-reset-send') }}</button>
                                </div>
                                <p class="ws-p pt-4">
                                    {{ __('main.modals.request-reset-privacy') }} <a href="https://grains.org/privacy/">https://grains.org/privacy/</a>
                                </p>
                            </form>
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
