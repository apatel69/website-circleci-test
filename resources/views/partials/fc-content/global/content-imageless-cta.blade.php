<div class="container main-content content-image-cta">
    <section id="cpy-main-content">
        @if (get_sub_field('title'))
            <h2>{{ get_sub_field('title') }}</h2>
        @endif
        @if (get_sub_field('content'))
            <p>{!! get_sub_field('content') !!}</p>
        @endif
        @if (get_sub_field('cta'))
            @include('partials.components.global-link', ['btn' => get_sub_field('cta'), 'classes' => 'extra-padding'])
        @endif
    </section>
</div>
