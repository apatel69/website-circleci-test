<div class="container">
    <section class="competitor-menu">
        @if (get_sub_field('menu_title'))
            <h2>{{ get_sub_field('menu_title') }}</h2>
        @endif
        @if ($post->post_parent)
            <ul class="column-parent">        
                @php
                    $args = array(
                        'exclude' => [$post->ID],
                        'child_of' => $post->post_parent,
                        'post_type' => 'page',
                        'post_status' => 'publish'
                    );
                    $pages = get_pages($args);
                @endphp
                @foreach ($pages as $page)
                    @php($id = $page->ID)
                    <li><a href="{{ get_permalink($id) }}">{{ get_field('competitor_menu_label', $id) }}</a></li>
                @endforeach
            </ul>
        @endif
    </section>
</div>