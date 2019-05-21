<div class="container blue-background">
    <section class="freshbooks-compares">
        @if (get_sub_field('section_title'))
            <h2>{{ get_sub_field('section_title') }}</h2>
        @endif
        @if (have_rows('comparisons'))
            @while (have_rows('comparisons')) @php(the_row())
                <div class="freshbooks-compare">
                    <div class="freshbooks-compare-content">
                        @if (get_sub_field('comparison_page') && get_sub_field('comparison_title'))
                            <a href="{{ get_sub_field('comparison_page') }}">
                                <h3>{{ get_sub_field('comparison_title') }}</h3>
                            </a>
                        @endif
                        {!! get_sub_field('description') !!}
                        @if (get_sub_field('cta_text') && get_sub_field('comparison_page'))
                            @include('partials.components.global-link', ['btn' => ['global_link_text' => get_sub_field('cta_text'), 'global_link_url' => get_sub_field('comparison_page')], 'classes' => 'ghost-button'])
                        @endif
                    </div>
                </div>
            @endwhile
        @endif
    </section>
</div>