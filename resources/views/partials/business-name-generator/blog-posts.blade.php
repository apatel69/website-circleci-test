<div id='starting-small-business' class='starting-small-business'>
    <section>
        @if (get_field('blog_posts_title'))
            <h2 class='section-heading-secondary'>{{ get_field('blog_posts_title') }}</h2>
        @endif
        @if (have_rows('blog_posts'))
            <div class='three-blog-posts-row'>
                @while(have_rows('blog_posts')) @php(the_row())
                    <div class='blog-post'>
                        @if (get_sub_field('post_image'))
                            <a href='{{ get_sub_field('post_url') }}' target="_blank">
                                @include('partials.components.global-image', ['img' => get_sub_field('post_image'), 'classes' => 'blog-image'])
                            </a>
                        @endif
                        @if (get_sub_field('post_url') && get_sub_field('post_title'))
                            <h3 class='blog-title'><a class="blog-title-link" href='{{ get_sub_field('post_url') }}' target="_blank">{{ get_sub_field('post_title') }}</a></h3>
                        @endif
                        @if (get_sub_field('post_summary'))
                            <p class='blog-excerpt'>{{ get_sub_field('post_summary') }}</p>
                        @endif
                        @if (get_sub_field('post_url'))
                            <p class='blog-read-more'><a href='{{ get_sub_field('post_url') }}' target="_blank">{{ get_field('read_more_text') }}</a></p>
                        @endif
                    </div>
                @endwhile
            </div>
        @endif
    </section>
</div>