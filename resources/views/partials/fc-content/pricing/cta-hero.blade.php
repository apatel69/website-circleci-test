@php
    $long = get_sub_field('long_text') ? 'hero-long' : '';
    $title = get_sub_field('title') ? strtolower(preg_replace('/[^A-Za-z0-9]/', '', get_sub_field('title'))) : 'cta-hero';
    $textOnlyHero = get_sub_field('text_only_hero');
@endphp
@if ($textOnlyHero)
    <div id="{{ $title }}" class="hero-text-only container">
        <section>
            @if (get_sub_field('title'))
                <h2>{{ get_sub_field('title') }}</h2>
            @endif
            {!! get_sub_field('description') !!}
        </section>
    </div>
@else
    <div class="container hero-bg-img hero-short {{ $long }}">
        <section id="{{ $title }}" class="cpy-hero">
            <div class="content">
                @if (get_sub_field('title'))
                    <h2>{{ get_sub_field('title') }}</h2>
                @endif
                {!! get_sub_field('description') !!}
            </div>
            @if (get_sub_field('add_call_to_action'))
                <div class="cta-subtext-assurance">
                    <div class="cta-subtext">
                        @include('partials.components.global-link', ['btn' => get_sub_field('cta')])
                        @if (get_sub_field('add_secondary_call_to_action'))
                            <p>{{ get_sub_field('cta_dividing_copy') }}</p>
                            @include('partials.components.global-link', ['btn' => get_sub_field('secondary_cta'),  'classes' => 'ghost-button'])
                        @endif
                     </div>
                </div>
            @endif
    	</section>
    </div>
@endif
