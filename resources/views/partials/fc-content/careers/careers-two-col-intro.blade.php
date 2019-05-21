<div class="container">
    <section>
        <div class="column-parent two-col-intro-wrapper">
            <div class="content">
                @if (get_sub_field('title'))
                    <h2>{{ get_sub_field('title') }}</h2>
                @endif
                @if (get_sub_field('description'))
                    <p><strong>{!! get_sub_field('description') !!}</strong></p>
                @endif
                @if (have_rows('content_image_repeater'))
                    <div class="column-parent image-links">
                    @while(have_rows('content_image_repeater'))
                    @php(the_row())
                        @if (get_sub_field('accolade_image'))
                            <a href="{{ get_sub_field('accolade_link') ? get_sub_field('accolade_link') : 'javascript:;'}}" target="_blank" rel="noopener" class="image-link">
                                @include('partials.components.global-image', ['img' => get_sub_field('accolade_image') ])
                            </a>
                        @endif
                    @endwhile
                    </div>
                @endif
                {!! get_sub_field('content') !!}
            </div>
            <div class="image">
                @include('partials.components.global-image', ['img' => get_sub_field('image') ])
            </div>
        </div>
    </section>
</div>
