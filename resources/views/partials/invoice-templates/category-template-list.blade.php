@php
    $tax = $term->taxonomy;
    $post_type = $tax == 'invoice_templates_categories' ? 'invoice_templates' : ($tax == 'accounting_software_categories' ? 'accounting_software' : '');
    $args = array(
        'post_type' => $post_type,
        'post_status' => 'publish',
        'posts_per_page' => -1,
        'order' => 'ASC',
        'meta_key' => 'profession',
        'orderby' => 'meta_value',
        'tax_query' => array(
            array(
                'taxonomy' => $tax,
                'terms' => $term->term_id
            )
        )
    );
    $cpt_cat_query = new WP_Query( $args );
@endphp

<section>
    <div class="general category-profession-list">
        @if ($tax == 'invoice_templates_categories')
            <h3>Free {{ get_field('label_type', $term) == 'hidden' ? '' : (get_field('label_type', $term) == 'custom' ? get_field('custom_label', $term) : $term->name) }} Invoice Templates</h3>
        @elseif ($tax == 'accounting_software_categories')
            <h3><a href="{{ get_term_link($term) }}">Accounting Software For {{ get_field('footer_menu_label', $term) }}</a></h3>
        @endif
        @if ($cpt_cat_query->have_posts())
            <ul>
                @while ( $cpt_cat_query->have_posts() )
                    @php $cpt_cat_query->the_post(); @endphp
                    <li class="no-style">
                        <a href="{{ get_permalink() }}" class="profession-link">{{ get_field('profession', get_the_ID()) }}</a>
                    </li>
                @endwhile
            </ul>
        @endif
    </div>
</section>

@php wp_reset_postdata(); @endphp