<div class="stickyBannerCTA">
    {!! get_field('resources_banner_text', 'option') !!}
    @if (get_field('resources_banner_cta', 'option'))
        @include ('partials.components.global-link', ['btn' => get_field('resources_banner_cta', 'option'), 'classes' => 'stickyBannerCTA__button'])
    @endif
</div>
<div class="stickyBannerCTA__spacer"></div>
