@php
    $cta_image = get_field('hero_card_cta_image');
    $title = get_sub_field('title') ? strtolower(preg_replace("/[^a-zA-Z]+/", "", get_sub_field('title'))) : 'two-col-hero'
@endphp

@if (have_rows('hero_columns'))
    <div class="container template-gallery-alt hero-card">
        <section id="{{ $title }}">
            <div class="inner-wrap">
                @while (have_rows('hero_columns'))
                    @php
                        the_row()
                    @endphp
                    <div class="{{ get_row_index() == 1 ? 'col' : 'card' }}">
                        @if (get_row_index() == 2)
                            <div class="content">
                        @endif
                            @if (get_row_index() == 2)
                                <{{ get_sub_field('column_title_weight') }}>{{ get_sub_field('column_title') }}</{{ get_sub_field('column_title_weight') }}>
                            @else
                                <{{ get_sub_field('column_title_weight') }}>{{ get_sub_field('column_title') }}</{{ get_sub_field('column_title_weight') }}>
                            @endif

                            <p>{{ get_sub_field('column_content') }}</p>

                            @if (get_sub_field('column_content_secondary'))
                                <p class="secondary">{{ get_sub_field('column_content_secondary') }}</p>
                            @endif

                            @if (get_row_index() == 2)
                                <div class="cta-subtext">
                            @endif

                            @if (get_sub_field('column_cta'))
                                @php
                                    $btn_classes = 'btn-med';
                                    if (get_row_index() == 2) {
                                        $btn_classes .= ' btn-with-arrow';
                                    }
                                    if (get_row_index() == 1) {
                                        $btn_classes .= ' ghost-button';
                                    }
                                @endphp
                                @include('partials.components.global-link', ['btn' => get_sub_field('column_cta'), 'classes' => $btn_classes])
                            @endif

                            @if (get_row_index() == 2)
                                @if ($cta_image)
                                    <img src="{{ $cta_image['url'] }}" alt="{{ $cta_image['alt'] }}" class="img-subtext">
                                @endif
                                </div>
                            @endif

                        @if (get_row_index() == 2)
                            </div>
                        @endif

                        @if (get_sub_field('column_cta') && get_sub_field('column_image'))
                            <a href="{{ get_sub_field('column_cta')['global_link_type'] === 'file' ? get_sub_field('column_cta')['global_link_file']['url'] : get_sub_field('column_cta')['global_link_url'] }}" target="blank">
                                @include('partials.components.global-image', ['img' => get_sub_field('column_image')])
                                @php($img_id = get_sub_field('column_image')['global_image']['title'] ? preg_replace("/[^a-zA-Z]+/", "", get_sub_field('column_image')['global_image']['title']) : false)
                                @if (get_sub_field('column_background_image'))
                                    @include('partials.components.global-image', ['img' => get_sub_field('column_background_image'), 'is_background_image' => true, 'background_element_id' => $img_id])
                                @endif
                            </a>
                        @endif
                        @if (get_sub_field('column_footer_text')['global_link_text'] && get_row_index() === 1)
                            <p class="secondary-link">{{ get_sub_field('column_footer_text')['global_link_text'] }}</p>
                        @endif

                    </div>
                @endwhile
            </div>
        </section>
    </div>
@endif
