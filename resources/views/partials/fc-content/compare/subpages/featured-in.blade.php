<div class="container">
    <section>
        <div class="featured-in-min column-parent">
            @if (get_field('featured_in_title', 'option'))
                <h4 class="copy">{{ get_field('featured_in_title', 'option') }}</h4>
            @endif
            @if (have_rows('featured_in_images', 'options'))
                @while (have_rows('featured_in_images', 'options')) @php(the_row())
                    @include('partials.components.global-image', ['img' => get_sub_field('featured_in_image'), 'classes' => 'logo' . ' ' . get_sub_field('featured_in_custom_class') ])
                @endwhile
            @endif
        </div>
    </section>
</div>
