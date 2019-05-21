@php
    if (is_tax()) {
        $term = get_queried_object();
        $args = array(
            'post_type' => 'invoice_templates',
            'post_status' => 'publish',
            'posts_per_page' => -1,
            'order' => 'ASC',
            'meta_key' => 'profession',
            'orderby' => 'meta_value',
            'tax_query' => array(
                array(
                    'taxonomy' => $term->taxonomy,
                    'terms' => $term->term_id
                )
            )
        );
        $query = new WP_Query( $args );
    } else {
        $tax = 'invoice_templates_categories';
        $categories = get_terms( array(
            'taxonomy' => $tax,
            'hide_empty' => false,
        ) );
    }
@endphp

@if(is_tax())
    <div class="container">
        <div class="rule"></div>
    </div>
@endif

<div class="container main-content template-card-listing">
	<section>
        @if(is_tax())
            @if (get_field('invoice_templates_category_intro_header', 'option'))
                <h2>{{ get_field('invoice_templates_category_intro_header', 'option') }}</h2>
            @endif
            @if (get_field('custom_invoice_templates_category_intro_text', $term) && get_field('invoice_templates_category_intro_text', $term))
                <p>{!! get_field('invoice_templates_category_intro_text', $term) !!}</p>
            @else
                @if (get_field('invoice_templates_category_intro_text', 'option'))
                    <p>{!! get_field('invoice_templates_category_intro_text', 'option') !!}</p>
                @endif
            @endif
        @else
            @if (get_field('intro_header'))
                <h2>{{ get_field('intro_header') }}</h2>
            @endif
            @if (get_field('intro_text'))
                <p>{!! get_field('intro_text') !!}</p>
            @endif
        @endif
    </section>
    <section>
        <div class="card-container">
            @if (is_tax() && $query->have_posts())
                @while($query->have_posts())
                    @php $query->the_post(); @endphp
                    @include('partials.invoice-templates.single-card', ['term' => $term])
                @endwhile
            @elseif (!is_tax() && $categories)
                @foreach ($categories as $cat)
                    @if ($cat->slug !== 'other')
                        @include('partials.invoice-templates.single-card', ['term' => $cat])
                    @else
                        @php
                            $other = $cat;
                        @endphp
                    @endif
                @endforeach
                @if (isset($other) && $other)
                    @include('partials.invoice-templates.single-card', ['term' => $other])
                @endif
            @endif
        </div>
    </section>
</div>

@php wp_reset_postdata(); @endphp
