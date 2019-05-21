<div class="developers-sidebar">
    @foreach (get_field( 'developers_sidebar_sections', 'option' ) as $section)
    <nav class="developers-links">
        @php
            $current_page_slug = parse_url(get_permalink())['path'];
        @endphp
        <h4>{{ $section['heading'] }}</h4>
        <ul>
        @foreach ($section['links'] as $link)
            @php
                $link_url = get_permalink($link['link']->ID);
                $link_slug = parse_url($link_url)['path'];
            @endphp
            <li><a href="{{ $link_url }}" class="{{ $current_page_slug === $link_slug ? 'active' : '' }}"><span>{{ $link['title'] ?: $link['link']->post_title }}</span></a></li>
        @endforeach
        </ul>
    </nav>
    @endforeach
</div>
