@php
    function get_posts_by_acf_category($category) {
        $args = array(
            'posts_per_page'	=> -1,
            'post_type'			=> 'api',
            'meta_key'		=> 'api_category',
            'meta_value'	=> $category,
            'orderby' => 'menu_order',
            'order' => 'ASC',
        );
        $query = new WP_Query( $args );
        return $query->posts;
    }
    wp_reset_postdata();
@endphp

<div class="navigation">
    <div class="desktop-only">
        @if(have_rows('api_categories', 'option'))
            @while(have_rows('api_categories', 'option'))
                @php
                    the_row();
                    $category_name = get_sub_field('category_name');
                    $category_value = strtolower(preg_replace('/\s*/', '_', $category_name));
                @endphp
                <a href="javascript:;" data-target="{{ $category_value }}" class="accordion-toggle active"><span>{{ $category_name }}</span></a>
                <div class="accordion-content" data-name="{{ $category_value }}">
                    @php $posts = get_posts_by_acf_category($category_value); @endphp
                    @foreach($posts as $post)
                        <a href="{{ $post->post_name}}">{{ $post->post_title }}</a>
                    @endforeach
                </div>
            @endwhile
        @endif
    </div>
    <div class="mobile-only">
        <div class="select-wrap">
            <select class="select-nav">
            @php
                global $post;
                $current_post_slug = $post->post_name;
                $args = array(
                    'posts_per_page'	=> -1,
                    'post_type'			=> 'api',
                    'orderby' => 'menu_order',
                    'order' => 'ASC',
                );
                $query = new WP_Query( $args );
                $posts = $query->posts;
            @endphp
            @foreach( $posts as $item )
                <option value="{{ $item->post_name }}" {{ $current_post_slug === $item->post_name ? "selected" : null }}>{{ $item->post_title }}</option>
            @endforeach
            </select>
        </div>
    </div>
</div>

@php wp_reset_postdata(); @endphp
