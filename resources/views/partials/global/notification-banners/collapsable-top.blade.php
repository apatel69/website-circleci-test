@php
    $collapsed = $content['collapsed_content'];
    $expanded = $content['expanded_content'];
    $cta = $content['expandable_cta'];
@endphp
<div id="{{ $bid }}" class="banner-collapsable {{ $cookie ? 'banner-collapsed' : ''}}">

    {{-- Expanded --}}
    <div class="banner banner-lg banner-blue banner-top">

        @if (!$cookie)
            <div class="banner-lg-close">
                <span>&times;</span>
            </div>
            <div class="banner-lg-row" style="display: none;">
                <div class="banner-lg-col">
                    <img class="banner-lg-header-image" src="{{ $expanded['global_image']['url'] }}" alt="banner-image">
                    <div class="banner-lg-copy">
                        <p class="banner-exp-header">{!! $expanded['message_content']['header'] !!}</p>
                        <p class="banner-exp-p">{!! $expanded['message_content']['body'] !!}</p>
                        <p class="banner-exp-sub">{!! $expanded['message_content']['subtext'] !!}</p>
                    </div>
                    <a href="{{ $cta['url'] ?: '#' }}" {{!empty($cta['target']) ? 'target='.$cta['target'] : ''}} class="banner-lg-cta">
                        {{ $cta['title'] ?: 'Okay' }}
                    </a>
                </div>
                <div class="banner-lg-col content-desktop">
                    @if (!empty($expanded['large_image_global_image']))
                        <img class="banner-lg-image" src="{{ $expanded['large_image_global_image']['url'] }}" alt="banner-image">
                    @endif
                </div>
            </div>
        @endif

        {{-- Collapsed --}}
        <div class="banner banner-md banner-blue banner-top banner-sticky {{ $cookie ? 'banner-sticky-visible' : '' }}">
            <div class="banner-md-copy">
                <img class="banner-header-image content-desktop" src="{{ $expanded['global_image']['url'] }}" alt="banner-image">
                <p class="content-desktop">{!! $collapsed['message_text'] ?: "" !!}</p>
                <p class="content-mobile">{!! $collapsed['message_text_mobile'] !!}</p>
                @if ($collapsed['button_text'])
                    <a href="{{ $cta['url'] ?: '#' }}" {{!empty($cta['target']) ? 'target='.$cta['target'] : ''}} class="banner-md-cta">
                        {{ $collapsed['button_text'] ?: "Okay" }}
                    </a>
                @endif
            </div>
        </div>

    </div>

</div>
<script type="text/javascript">
    var bannerCollapsable = document.querySelector('.banner-collapsable');
    var stickyBanner = bannerCollapsable.querySelector(".banner-sticky");
    var bannerCollapsed = document.cookie.indexOf('banner-{{ $bid }}-dismissed') !== -1;

    if ( bannerCollapsed ) {
        bannerCollapsable.classList.add("banner-collapsed");
        stickyBanner.classList.add("banner-sticky-visible");
    } else {
        bannerCollapsable.querySelector('.banner-lg-row').style.display='';
    }

    window.addEventListener('load', function() {

        var sticky = bannerCollapsed ? 0 : getElOffset(stickyBanner).top;

        window.addEventListener('scroll', makeSticky);

        window.addEventListener('resize', function() {
            sticky = bannerCollapsed ? 0 : getElOffset(stickyBanner).top
        });

        function makeSticky() {;
            if (window.pageYOffset >= sticky) {
                stickyBanner.classList.add("banner-sticky-visible");
            } else {
                stickyBanner.classList.remove("banner-sticky-visible");
            }
        }

        jQuery('.banner-lg-close').click(function() {
            jQuery('.banner-lg-row').animate({height: stickyBanner.clientHeight + 'px'}, {duration: 200, complete: function() {
                sticky = getElOffset(stickyBanner).top;
                makeSticky();
            } } );
            createCookie('banner-' + bannerCollapsable.id + "-dismissed", "true", 365);
        });

    });

</script>
