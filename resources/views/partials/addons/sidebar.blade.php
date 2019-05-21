@php
    global $wp;
    $current_url = home_url( $wp->request );
    $main_page_url = get_permalink(get_field('addons_main_page', 'option')->ID);
@endphp

<div class="addons-categories tile">
    <h2>Explore</h2>
    <a href="#" data-toggle="categories" class="show-mobile-only browse-categories">Explore</a>
    <ul data-target="categories">
        @php
            $terms = get_terms( array(
                'taxonomy' => 'addons_categories',
                'hide_empty' => false,
            ) );
        @endphp
            <li>
                <a href="{{ $main_page_url }}" class="{{ $current_url === $main_page_url ? 'is-active' : '' }}">Featured</a>
            </li>
        @foreach ($terms as $term)
            @php($term_url = get_term_link($term->term_id))
            <li>
                <a href="{{ $term_url }}" class="{{ $term_url === $current_url ? 'is-active' : ''}}">{{ $term->name }}</a>
            </li>
        @endforeach
    </ul>
</div>