@php
    $main_page = get_field('press_listings_page', 'option');
    $main_page_id = $main_page->ID; 
    $limit = get_sub_field('number_of_cards');
    $count = 0;
    $post_type = get_sub_field('post_type');
    if ($post_type == 'news') {
        $listings_page = get_permalink(get_field('press_news_coverage_page', 'option')->ID);
    } elseif ($post_type == 'press_releases') {
        $listings_page = get_permalink(get_field('press_release_page', 'option')->ID);
    } elseif ($post_type = 'data_research') {
        $listings_page = get_permalink(get_field('press_data_research_page', 'option')->ID);
    }
@endphp

<div class="container{{ get_sub_field('background_color') == 'blue' ? ' blue-background' : ''}}">
	<section id="{{ get_sub_field('anchor_id') }}" class="recent-post-listing">
		<h2 class="text-center">{{ get_sub_field('section_title') }}</h2>
        <div class="article-lists">
            @if ($post_type == 'news') 
                @if (have_rows('news_coverage_posts', 'option'))
                    @while (have_rows('news_coverage_posts', 'option'))
                        @php the_row(); @endphp
                        @if ($count < $limit)
                            @php
                                $news_array = array(
                                    'post_publication' => get_sub_field('publication_name'),
                                    'post_date' => get_sub_field('article_date'),
                                    'post_title' => get_sub_field('article_headline'),
                                    'post_url' => get_sub_field('article_url'),
                                    'post_type' => 'news'
                                );
                                $count++
                            @endphp
                            @include('partials/press/article-card', ['post' => $news_array])
                        @endif
                    @endwhile
                @endif
            @else
                @php 
                    $recent_posts = wp_get_recent_posts(array(
                        'post_type' => $post_type,
                        'numberposts' => $limit
                    ));
                @endphp
                @foreach ($recent_posts as $post)
                    @include('partials/press/article-card', ['post' => $post])
                @endforeach
            @endif
        </div>

		<span class="see-more-btn">
            <a href="{{ $listings_page }}" class="ghost-button no-width see-more-btn">{{ get_sub_field('see_more_button_label') }}</a>
        </span>
	</section>
</div>