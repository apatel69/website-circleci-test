@php
    $is_tax = is_tax();
    $term = $is_tax ? get_queried_object() : null;
@endphp
<section class="addons-wrapper addons">
    <div class="addons-row">
        @include('partials.addons.sidebar')
        <div class="addons-body">
            <h2>{{ $is_tax ? $term->name : 'Featured'}}</h2>
            <p class="category-desc">{!! $is_tax ? $term->description : '' !!}</p>
            <div class="addons-list">
                @if ($is_tax)
                    @php
                        $category_id = get_queried_object()->term_id;
                        $args = array(
                            'posts_per_page'      => -1,
                            'post_type'           => 'addons',
                            'orderby' => 'menu_order',
                            'order' => 'ASC',
                            'tax_query' => array(
                                array (
                                    'taxonomy' => 'addons_categories',
                                    'field' => 'term_id',
                                    'terms' => $category_id,
                                )
                            ),
                        );
                        $query = new WP_Query( $args );
                    @endphp
                    @if($query->have_posts())
                        @while ($query->have_posts())
                            @php $query->the_post(); @endphp
                            @include('partials.addons.addon-card')
                        @endwhile
                    @endif
                @else
                    @php
                        $args = array(
                            'posts_per_page'      => -1,
                            'post_type'           => 'addons',
                            'meta_key'		      => 'addon_featured',
	                        'meta_value'	      => true,
                            'orderby' => 'menu_order',
                            'order' => 'ASC',
                        );
                        $query = new WP_Query( $args );
                    @endphp
                    @if($query->have_posts())
                        @while($query->have_posts())
                            @php $query->the_post(); @endphp
                            @include('partials.addons.addon-card')
                        @endwhile
                    @endif
                @endif
                @php(wp_reset_query())
            </div>
        </div>
    </div>
</section>
