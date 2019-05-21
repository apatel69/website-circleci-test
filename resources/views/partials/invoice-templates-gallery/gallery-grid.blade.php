@php
    $custom_cat = get_query_var( 'template_category' );
    $paged = ( get_query_var('paged') ) ? get_query_var('paged') : 1;
    $search = get_query_var('search');

    $args = array(
        'post_type' => 'invoice_templates',
        'post_status' => 'publish',
        'posts_per_page' => 5,
        'order' => 'ASC',
        'meta_key' => 'profession',
        'orderby' => 'meta_value',
        'paged' => $paged
    );

    if ((int)$custom_cat) {
        $args['tax_query'] = array(
            array(
                'taxonomy' => 'invoice_templates_categories',
                'field' => 'term_id',
                'terms' => (int)$custom_cat
            )
        );
    }

    if($search && $custom_cat == 'all') {
        $args['s'] = $search;
    }

    $query = new WP_Query( $args );
@endphp

<div class="container three-col-invoice-temp invoice-temp-gallery-grid">
    <div id="AjaxifyModal">
        <div class="gallery-loader-container">
            <div class="loader-wrapper">
                <img src="@asset('images/loaders/loading.gif')" alt="loading">
            </div>
        </div>

        <section>
            @if ($search && $custom_cat == 'all')
                <div id="search-header">
                    @if ($query->have_posts())
                        <p>Search results for "{{$search}}"</p>
                    @else
                        <p>Sorry, no results were found.</p>
                    @endif
                </div>
            @endif

            <div class="outer-content-wrapper gallery">
                @while( $query->have_posts() ) @php $query->the_post(); @endphp
                    @while (have_rows('gallery_templates')) @php the_row(); @endphp
                        @while (have_rows('global_cta_download_templates')) @php the_row(); @endphp
                            
                            @include('partials.invoice-templates-gallery.gallery-grid-details')

                        @endwhile
                    @endwhile
                @endwhile
            </div>
            <div id="loadmoreContainer"></div>
        </section>
    </div>
</div>

@php wp_reset_postdata(); @endphp