@php $term = ''; @endphp

@if (is_single())
    @php 
        $primary_category = get_post_primary_category($post->ID, 'invoice_templates_categories')['primary_category'];
        $term = $primary_category->taxonomy . '_' . $primary_category->term_id; 
    @endphp
@elseif (is_tax())
    @php $term = get_queried_object(); @endphp
@endif

<div class="container hero blue-background">
	<section class="zero-bottom-padding">
        <div class="two-col">
            <div class="content">
                @if (is_single())
                    <h1>{{ get_the_title() }}</h1>
                @elseif (is_tax())
                    <h1>{!! get_field('invoice_templates_category_hero_titles', 'option') !!}</h1>
                @else 
                    <h1>{{ get_field('hero_title') }}</h1>
                @endif

                @if(is_single())
                    @if (get_field('use_custom_hero_content')))
                        {!! get_field('custom_hero_content') !!}
                    @else
                    {!! get_field('invoice_templates_global_hero_content', 'option') !!}
                    @endif
                @elseif (is_tax())
                    @if (get_field('custom_invoice_templates_category_hero_text', $term) && get_field('invoice_templates_category_hero_text', $term))
                        <p>{!! get_field('invoice_templates_category_hero_text', $term) !!}</p>
                    @else
                        {!! get_field('invoice_templates_global_hero_content', 'option') !!}
                    @endif
                @else
                    {!! get_field('hero_content') !!}
                @endif

                @if (is_single() && $primary_category)
                    <span class="download-template">{{ get_field('invoice_templates_download_templates_label', 'option') }}</span>
                    <div class="download-button">
                        <a href="{{ get_field('invoice_templates_pdf_file', $term)['url'] }}" class="format-link ghost-button" download>PDF</a>
                        <a href="{{ get_field('invoice_templates_word_file', $term)['url'] }}" class="format-link ghost-button" download>Word</a>
                        <a href="{{ get_field('invoice_templates_excel_file', $term)['url'] }}" class="format-link ghost-button" download>Excel</a>
                    </div>
                @elseif(!is_single() && !is_tax())
                    <span class="download-template">{{ get_field('download_label') }}</span>
                    <div class="download-button">
                        <a href="{{ get_field('pdf_template')['url'] }}" class="format-link ghost-button" download>PDF</a>
                        <a href="{{ get_field('word_template')['url'] }}" class="format-link ghost-button" download>Word</a>
                        <a href="{{ get_field('excel_template')['url'] }}" class="format-link ghost-button" download>Excel</a>
                    </div>
                @endif

                @if (is_single() && get_field('invoice_templates_hero_cta', 'option'))
                    @include('partials.components.global-link', ['btn' => get_field('invoice_templates_hero_cta', 'option'), 'classes' => 'full-width-cta'])
                @elseif(get_field('hero_cta'))
                    @include('partials.components.global-link', ['btn' => get_field('hero_cta'), 'classes' => 'full-width-cta'])
                @endif

                @if (is_tax())
                    @php
                        $invoice_templates_categories = get_terms( array(
                            'taxonomy' => $term->taxonomy,
                            'hide_empty' => false,
                        ) );
                    @endphp
                    @if ($invoice_templates_categories)
                        <div class="select-wrap">
                            <select class="select-nav">
                            @php 
                                global $wp;
                                $current_url = home_url( $wp->request );
                            @endphp
                            @foreach ($invoice_templates_categories as $cat)
                                <option value="{{ get_term_link($cat->term_id) }}" {{ get_term_link($cat->term_id) == $current_url ? 'selected' : '' }}>{{ get_field('category_gallery_listing_label', $cat->taxonomy . '_' . $cat->term_id) }}</option>
                            @endforeach
                            </select>
                        </div>
                    @endif
                @endif
            </div>
            <div class="hero-image">
                <picture>
                    @if (get_field('hero_image_full', $term))
                        @php $img_full = get_field('hero_image_full', $term); @endphp
                        <source media="(max-width: 1024px) and (min-width: 769px)" srcset="{{ $img_full['global_image']['url'] }}, {{ $img_full['global_retina_image']['url'] ? $img_full['global_retina_image']['url'] . '2x' : ''}}">
                    @endif
                    @if (get_field('hero_image_tablet', $term))
                        @php $img_tablet = get_field('hero_image_tablet', $term); @endphp
                        <source media="(max-width: 768px)" srcset="{{ $img_tablet['global_image']['url'] }}, {{ $img_tablet['global_retina_image']['url'] ? $img_tablet['global_retina_image']['url'] . ' 2x' : ''}}">
                        @include('partials.components.global-image', ['img' => $img_tablet ])
                    @endif
                </picture>
            </div>
        </div>
	</section>
</div>