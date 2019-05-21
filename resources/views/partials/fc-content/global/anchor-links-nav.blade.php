@if (have_rows('anchor_links'))
    <div class="container">
        <section class="anchor-navigation">
            <div class="column-parent anchor-links">
                @while (have_rows('anchor_links')) @php (the_row())
                    @include('partials.components.global-link', ['btn' => get_sub_field('link') ])
                @endwhile
            </div>
        </section>
    </div>
@endif
	