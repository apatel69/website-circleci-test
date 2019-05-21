@php
    $hero_image = get_field('support_hero_image', 'option');
    $background_colour = get_field('support_hero_background_colour', 'option');
@endphp

@if ( get_field('support_hero_image_full_width_background', 'option') )
    @include('partials.components.global-image', [
        'img' => $hero_image,
        'is_background_image' => true,
        'background_element_id' => 'support-hero'
    ])
@endif

<div id="support-hero" class="container masthead" style="{!! $background_colour ? 'background-color:' . $background_colour : '' !!}">
    <section id="support-hero-inner">
        <div class="content">
            @if (get_field('support_hero_title', 'option'))
                <h1>{{ get_field('support_hero_title', 'option') }}</h1>
            @endif
            @if (get_field('support_subtitle', 'option'))
                <p>{{ get_field('support_subtitle', 'option') }}</p>
            @endif
            <input type="text" name="support_search" class="st-default-search-input support-search" placeholder="{{ get_field('support_search_field_placeholder_text', 'option')}}">
        </div>
        <div class="support-hero-image">
            @include('partials.components.global-image', ['img' => $hero_image])
        </div>
    </section>
</div>
