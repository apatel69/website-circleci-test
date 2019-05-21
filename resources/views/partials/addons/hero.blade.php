<div class="hero-background addons">
    @if (get_field('addons_classic_hero_title', 'option'))
        <h1>{{ get_field('addons_classic_hero_title', 'option') }}</h1>
    @endif
    @if (get_field('addons_classic_hero_subtitle', 'option'))
        <p class="subheader">{{ get_field('addons_classic_hero_subtitle', 'option') }}</p>
    @endif
    @if (get_field('addons_classic_hero_image', 'option'))
        @include('partials.components.global-image', ['img' => get_field('addons_classic_hero_image', 'option'), 'classes' => 'addons-hero-image'])
    @endif
</div>