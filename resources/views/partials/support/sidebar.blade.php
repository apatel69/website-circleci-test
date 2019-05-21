<div class="support-sidebar">
    <div class="support-contact-callout">
        {!! get_field('support_sidebar_contact_callout', 'option') !!}
    </div>
    <nav class="support-categories">
        @php
            global $wp_query;

            $main_page = get_field('support_listing_page', 'option');
            $main_page_url = get_permalink($main_page->ID);

            if (isset($wp_query->query['support_categories'])) {
                $current_category_slug = $wp_query->query['support_categories'];
            }

            $terms = array(
                array(
                    'link'   => get_permalink($main_page->ID),
                    'name'   => get_field( 'support_featured_posts_title', 'option' ),
                    'active' => !(isset($current_category_slug) || is_single()),
                )
            );

            foreach ( get_terms(array('taxonomy' => 'support_categories')) as $term ) {
                $terms[] = array(
                    'link'   => get_category_link($term->term_id),
                    'name'   => $term->name,
                    'active' => isset($current_category_slug) && $current_category_slug == $term->slug,
                );
            }
        @endphp

        @foreach ($terms as $term)
            <a href="{{ $term['link'] }}" class="{{ $term['active'] ? 'active' : '' }}"><span>{{ $term['name'] }}</span></a>
        @endforeach
    </nav>
</div>
<div class="support-mobile-nav">
    <div class="select-wrap">
        <select class="support-categories">
            <option value="">Select a category</option>
            @foreach ($terms as $term)
                <option value="{{ $term['link'] }}">{{ $term['name'] }}</option>
            @endforeach
        </select>
    </div>
</div>
