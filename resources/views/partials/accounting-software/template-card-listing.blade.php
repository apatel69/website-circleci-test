@php
    $term = get_queried_object();
    $args = array(
        'post_type' => 'accounting_software',
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
@endphp

<div class="rule"></div>

@if (get_field('getapp'))
    @include('partials/fc-content/global/getapp')
@endif

<div class="container main-content template-card-listing">
	<section>
        @if (get_field('accounting_software_category_intro_header', 'option'))
            <h2>{{ get_field('accounting_software_category_intro_header', 'option') }}</h2>
        @endif

        {!! get_field('accounting_software_intro_content', 'option') !!}
    </section>
</div>

<div class="container">
    <section>
        <div class="card-container">
            @if ($query->have_posts())
                @while($query->have_posts())
                    @php $query->the_post(); @endphp
                    @include('partials.invoice-templates.single-card', ['term' => $term, 'hover' => false])
                @endwhile
            @endif
        </div>
    </section>
</div>
<div class="container main-content">
	<section>
        @if (get_field('accounting_software_body_content_title', 'option'))
            <h2>{{ get_field('accounting_software_body_content_title', 'option') }}</h2>
        @endif
        {!! get_field('accounting_software_body_content', 'option') !!}
        @if (get_field('accounting_software_content_image', 'option'))
            @include('partials.components.global-image', ['img' => get_field('accounting_software_content_image', 'option')])
        @endif
    </section>
</div>

@php wp_reset_postdata(); @endphp
