<div class="container" id="main-content">
    <section>
        <div class="two-col">
            <div class="col nav-col">
                @include ('partials.support.sidebar')
            </div>
            <div class="col main-col">
                <div class="support-post-list content-item">
                    @php
                    if (is_archive()) {
                        $category = get_queried_object();
                        $heading_text = $category->name;
                        $loop = new WP_Query(
                            array(
                                'post_type'      => 'support',
                                'posts_per_page' => -1,
                                'orderby'        => ['meta_value_num' => 'DESC', 'menu_order' => 'ASC'],
                                'meta_key'       => 'is_category_featured',
                                'tax_query' => array(
                                    array (
                                        'taxonomy' => 'support_categories',
                                        'field' => 'slug',
                                        'terms' => $category->slug,
                                    )
                                ),
                            )
                        );
                        $all_posts = $loop->posts;

                        $posts = [];
                        $more_posts = [];

                        foreach ($all_posts as $post_object) {
                            if ( get_field('is_category_featured', $post_object->ID) ) {
                                $posts[] = $post_object;
                            } else {
                                $more_posts[] = $post_object;
                            }
                        }
                    } else {
                        $heading_text = get_field( 'support_featured_posts_title', 'option' );
                        $posts = get_field( 'support_featured_posts', 'option' );
                    }
                    @endphp
                    <h2 class="support-post-page-heading">{{ $heading_text }}</h2>
                    @if ( !empty($posts) )
                        @foreach ($posts as $post_object)
                        @php
                            global $post;
                            $post = $post_object;
                            setup_postdata( $post );
                        @endphp
                        <div class="support-post">
                            <h3 class="support-post-title"><a href="{!! get_permalink() !!}">{{ get_the_title() }}</a></h3>
                            <p class="support-post-excerpt">{{ get_the_excerpt() }}</p>
                        </div>
                        @endforeach
                    @endif
                    @if ( !empty($more_posts) )
                    <div id="more-posts" class="more-posts">
                        @foreach ($more_posts as $post_object)
                        @php
                        global $post;
                        $post = $post_object;
                        setup_postdata( $post );
                        @endphp
                        <div class="support-post">
                            <h3 class="support-post-title"><a href="{!! get_permalink() !!}">{{ get_the_title() }}</a></h3>
                            <p class="support-post-excerpt">{{ rtrim( mb_substr( html_entity_decode( get_the_excerpt() ), 0, 100 ) ) }}...</p>
                        </div>
                        @endforeach
                    </div>
                    <a href="#more-posts" class="show-all-posts">See all {{ count($posts) + count($more_posts) }} posts</a>
                    @endif
                    @php
                    wp_reset_postdata();
                    @endphp
                </div>
            </div>
        </div>
    </section>
</div>
