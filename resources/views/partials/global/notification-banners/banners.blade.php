@php
    $banners = get_field('active_banners', 'option');
@endphp

@if (!empty($banners))
    @foreach ($banners as $banner)

        @php
            $settings = $banner['banner_settings'];
            $start = DateTime::createFromFormat('Y-m-d H:i:s', $settings['start_time'], new DateTimeZone('America/Toronto'));
            $now = new DateTime("now", new DateTimeZone('America/Toronto') );
            $end = DateTime::createFromFormat('Y-m-d H:i:s', $settings['end_time'], new DateTimeZone('America/Toronto'));
            $timed = $settings['timed'];
            $expired = $timed && ($now < $start || $now > $end) ? true : false;
            $here = false;
            $global = $settings['global'];
            $style = $banner['banner_content']['banner_style']['value'] ?: false;

            $id = "";
            if (isset($settings['title'])) {
                $id = strtolower($settings['title']);
                $id = preg_replace("/[^0-9a-zA-Z ]/m", "", $id);
                $id = preg_replace("/ /", "-", $id);
            }

            $cookie = isset($_COOKIE['banner-' . $id . '-dismissed']) ? true : false;
        @endphp

        @if (!$global)
            @php
                $here = count( array_filter($settings['location'], function($location) {
                    global $post;
                    return isset($location->ID) && isset($post->ID) && $location->ID === $post->ID;
                }) );
            @endphp
        @elseif ($global)
            @php
                $ignore = count( array_filter($settings['exceptions'], function($exception) {
                    global $post;
                    return isset($exception->ID) && isset($post->ID) && $exception->ID === $post->ID;
                }))
            @endphp
        @endif

        @if ($here > 0 || ($global && !$ignore))
            @if (!$expired && $style == 'simple top')

                {{-- Simple Top Banner (Yellow) --}}
                @include('partials.global.notification-banners.simple-top', ['bid' => $id, 'settings' => $settings, 'content' => $banner['banner_content']])

            @elseif (!$expired && $style == 'simple bottom')

                {{-- Simple Bottom Banner (Blue) --}}
                @include('partials.global.notification-banners.simple-bottom', ['bid' => $id, 'settings' => $settings, 'content' => $banner['banner_content']])

            @elseif (!$expired && $style == 'expandable top')

                {{-- Collapsable Large Top Banner --}}
                @include('partials.global.notification-banners.collapsable-top', ['bid' => $id, 'settings' => $settings, 'content' => $banner['banner_content'], 'cookie' => $cookie])

            @elseif (!$expired && $style == 'custom')

                {{-- Custom Banner (Blue) --}}
                @include('partials.global.notification-banners.custom-banner', ['bid' => $id, 'settings' => $settings, 'content' => $banner['banner_content']])

            @elseif (!$expired && $style == 'popup')

                {{-- Popup --}}
                @include('partials.global.notification-banners.popup', ['bid' => $id, 'settings' => $settings, 'content' => $banner['banner_content']])

            @endif
        @endif

    @endforeach
@endif

<script type="text/javascript">

    function hideShow(id) {
        if (!jQuery('#' + id).hasClass('expired')) {
            if (id) {
                var cookie = readCookie(id + '-dismissed');
                if (!cookie) {
                    jQuery('#' + id).show();
                    jQuery('#' + id).find('.banner-close').on('click', function() {
                        createCookie(id + "-dismissed", "true", 365);
                        jQuery('#' + id).hide();
                    });
                }
            }
        }
    }

    window.addEventListener('load', function() {

        var banners = document.querySelectorAll('.banner');

        // Show banners that are not expired, or previously closed by the user
        Array.prototype.slice.call(banners).forEach(function(banner) {
            var id = banner.id;
            if (jQuery('#' + id).hasClass('show-delay')) {
                var delayLength = jQuery('#' + id).attr('delay-length');
                setTimeout(
                    function() {
                        return hideShow(id);
                    }
                , delayLength);
            } else {
                hideShow(id);
            }
        });

    });
</script>
