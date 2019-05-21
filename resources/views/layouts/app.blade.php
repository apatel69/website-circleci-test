<!doctype html>
<html @php(language_attributes())>
    @include('partials.head')
    <body @php(get_field('full_width_layout') ? body_class('fullWidthLayout') : body_class())>
        @if(defined('WP_ENV') && WP_ENV  == 'production') @include('partials/GTM-Body-Tag') @endif
        @include('partials.global.android-banner-smart')
        @php(do_action('get_header'))
        @include('partials.global.notification-banners.banners')
        @include('partials.header')
        <div class="main-container">
            <div class="overlay"></div>
            <main class="main">
                @yield('content')
            </main>
        </div>
        @php(do_action('get_footer'))
        @include('partials.footer')
        @php(wp_footer())
    </body>
</html>
