<div class="container" id="main-content">
    <section>
        <div class="two-col">
            <div class="col">
                <nav class="article-categories">
                    @include ('partials.resources.sidebar')
                </nav>
            </div>
            <div class="col main-col">
                <div class="article-highlight-text">
                    TOP STORIES
                </div>
                <div class="sort-wrap">
                    <a class="visible" href="#"><span class="label-desktop">Sort By</span><span class="label-tablet">Filter &amp; Sort</span></a>
                    <div class="clr"></div>
                    <div class="spacer">
                        <div class="inner-sort">
                            <div class="label-tablet">
                                <span class="title">Filter By Category</span>
                                    @include ('partials.resources.sidebar')
                                <span class="title">Sort By</span>
                            </div>
                            <a href="#" class="btn-content-toggle active" data-target="popular">Popular</a>
                            <a href="#" class="btn-content-toggle" data-target="alpha">A-Z</a>
                            <a href="#" class="btn-content-toggle" data-target="time">Newest - Oldest</a>
                        </div>
                    </div>
                </div>
                <div class="card-collection-wrap">
                    <div class="card-collection content-item">
                        @php
                            if (is_archive()) {
                                $category = get_queried_object()->slug;
                                $loop = new WP_Query(
                                    array(
                                        'post_type' => 'resources',
                                        'posts_per_page' => 18,
                                        'post_status' => 'publish',
                                        'paged' => get_query_var('paged'),
                                        'orderby' => 'menu_order',
                                        'order' => 'ASC',
                                        'tax_query' => array(
                                            array (
                                            'taxonomy' => 'resource_categories',
                                            'field' => 'slug',
                                            'terms' => $category,
                                            )
                                        ),
                                    )
                                );
                            } else {
                                $category = get_queried_object()->slug;
                                $loop = new WP_Query(
                                    array(
                                        'post_type' => 'resources',
                                        'posts_per_page' => 6,
                                        'orderby' => 'menu_order',
                                        'order' => 'ASC',
                                        'paged' => get_query_var('paged'),
                                        'post_status' => 'publish',
                                    )
                                );
                            }
                        @endphp
                        @while( $loop->have_posts() )
                            @php
                                $loop->the_post();
                                global $post;
                            @endphp
                            @include ('partials.resources.article-card', ['post' => $post])
                        @endwhile
                    </div>
                </div>

                @include('partials.resources.pagination', ['posts' => $loop])
                @php wp_reset_postdata(); @endphp
            </div>
        </div>
    </section>
</div>
