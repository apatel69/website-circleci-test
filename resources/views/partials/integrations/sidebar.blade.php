@php
    global $wp_query;
    
    if (isset($wp_query->query['integration_categories'])) {
        $current_category_slug = $wp_query->query['integration_categories'];
    }

    $terms = get_terms( array(
        'taxonomy' => 'integration_categories',
    ) );

    $main_page = get_field('integrations_listing_page', 'option');
    $main_page_url = get_permalink($main_page->ID);
@endphp

<a href="{{ $main_page_url }}" {!! !isset($current_category_slug) ? 'class="active"' : '' !!}>All Apps</a>

@foreach ($terms as $term)
    @if ($term->name == 'Top Picks')
        <a href="{{ $main_page_url }}/{{ $term->slug }}#main-content" {!! isset($current_category_slug) && $current_category_slug == $term->slug ? 'class="active"' : '' !!}>{{ $term->name }}</a>
        @break
    @endif
@endforeach

@foreach ($terms as $term)
    @if ($term->name !== 'Top Picks')
        <a href="{{ $main_page_url }}/{{ $term->slug }}#main-content" {!! isset($current_category_slug) && $current_category_slug == $term->slug ? 'class="active"' : '' !!}>{{ $term->name }}</a>
    @endif
@endforeach