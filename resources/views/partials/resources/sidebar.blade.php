@php
    global $wp_query;

    if (isset($wp_query->query['resource_categories'])) {
        $current_category_slug = $wp_query->query['resource_categories'];
    }

    $main_page = get_field('resources_listing_page', 'option');

    $terms = [
        [
            'link'   => get_permalink($main_page->ID),
            'name'   => 'All Articles',
            'active' => !(isset($current_category_slug) || is_single()),
        ]
    ];

    foreach ( get_terms(['taxonomy' => 'resource_categories']) as $term ) {
        $terms[] = [
            'link'   => get_category_link($term->term_id) . "#main-content",
            'name'   => $term->name,
            'active' => isset($current_category_slug) && $current_category_slug == $term->slug,
        ];
    }
@endphp

@foreach ($terms as $term)
    <a href="{{ $term['link'] }}" class="{{ $term['active'] ? 'active' : '' }}"><span>{{ $term['name'] }}</span></a>
@endforeach
