@php
    if (is_single()) {
        $post_type = get_post_type();
        $primary_category = get_post_primary_category($post->ID, $post_type . '_categories')['primary_category'];
        $breadcrumb = get_field('breadcrumb_label', $primary_category) ? get_field('breadcrumb_label', $primary_category) : $primary_category->name;
    } else {
        $term = get_queried_object();
        $tax = $term->taxonomy;
        if ($tax == 'support_categories') {
            $post_type = 'support';
            $breadcrumb = $term->name;
        }
    }

    $main_page = get_field($post_type . '_listing_page', 'option');
    $main_page_url = get_permalink($main_page->ID);
    $main_page_title = get_the_title($main_page->ID);
@endphp
<nav class="breadcrumbs">
    <ol>
        <li><a href="{{ $main_page_url }}">{{ get_field($post_type . '_breadcrumb_label', 'option') ?: $main_page_title }}</a></li>
        @if (isset($primary_category->slug) && $breadcrumb)
            <li><a href="{{ get_term_link($primary_category) }}">{{ $breadcrumb }}</a></li>
        @elseif (is_tax())
            <li><span class="current" aria-current="page">{{ $breadcrumb }}</span></li>
        @endif
    </ol>
</nav>
