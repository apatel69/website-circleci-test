<article class="addons addons-post-body" data-swiftype-name="body" data-swiftype-type="text">
    @if (get_field('app_description'))
        <section class="overview">
            {!! get_field('app_description') !!}
        </section>
    @endif

    @if (get_field('how_it_works_with_freshbooks'))
        <section class="how-it-works">
            <h2>How it Works with FreshBooks</h2>
            {!! get_field('how_it_works_with_freshbooks') !!}
        </section>
    @endif

    @if (get_field('include_testimonial'))
        @php $testimonial = get_field('testimonial') @endphp
        <div class="addons addons-testimonial">
            <div class="wrapper">
                <figure>
                    <figcaption>
                        @if ($testimonial['photo'])
                            @include('partials.components.global-image', ['img' => $testimonial['photo']])
                        @endif
                    </figcaption>
                    <div class="quote">
                        <blockquote>{!! $testimonial['testimonial'] !!}</blockquote>
                        <cite>
                            <strong> {{ $testimonial['name'] }}</strong> <br>
                            {{ $testimonial['job_title'] }}
                        </cite>
                    </div>
                </figure>
            </div>
        </div>
    @endif

    @if (get_field('how_to_get_started'))
        <section class="setup">
            <h2>How to Get Started</h2>
            @if (get_field('include_how_to_get_started_video'))
                <div class="tile">
                    <div class="video">
                        @php
                            $iframe = get_field('how_to_get_started_video');

                            // add extra attributes to iframe html
                            $attributes = 'width="100%" height="400" frameborder="0"';

                            $iframe = str_replace('></iframe>', ' ' . $attributes . '></iframe>', $iframe);
                        @endphp
                        {!! $iframe !!}
                    </div>
                </div>
            @endif
            {!! get_field('how_to_get_started') !!}
        </section>
    @endif

    @if (get_field('questions'))
        <section class="support">
            <h2>Questions?</h2>
            {!! get_field('questions') !!}
        </section>
    @endif

    @if (get_field('similar_apps'))
        @php($posts = get_field('similar_apps'))
        <section class="related">
            <h2>Similar Apps</h2>
            <div class="addons-list">
                @foreach( $posts as $p) 
                    <div class="addons-list-item tile">
                        <div class="addon-list-item-image">
                            <a href="{{ get_permalink($p->ID) }}">
                                @if(get_field('addon_logo', $p->ID))
                                    @include('partials.components.global-image', ['img' => get_field('addon_logo', $p->ID)])
                                @endif
                            </a>
                        </div>
                        @if (get_field('description_summary', $p->ID))
                            <p class="addon-list-description">
                                {{ get_field('description_summary', $p->ID) }}
                            </p>
                        @endif
                        <p class="addons-link text-center">
                            <a href="{{ get_permalink($p->ID) }}">More about {{ get_the_title($p->ID) }}</a>
                        </p>
                    </div>
                @endforeach
            </div>
        </section>
    @endif

</article>