@php
    $main_page = get_field('press_listings_page', 'option');
    $main_page_id = $main_page->ID;
    $post_type = get_field('post_type');
    if ($post_type == 'news') {
        $listings_page = rtrim(get_permalink(get_field('press_news_coverage_page', 'option')->ID), '/');
    } elseif ($post_type == 'press_releases') {
        $listings_page = rtrim(get_permalink(get_field('press_release_page', 'option')->ID), '/');
    } elseif ($post_type = 'data_research') {
        $listings_page = rtrim(get_permalink(get_field('press_data_research_page', 'option')->ID), '/');
    };

    // Query all press posts
    if ($post_type == 'news') {
        $all_posts = [];
        if (have_rows('news_coverage_posts', 'option')) {
            while (have_rows('news_coverage_posts', 'option')) {
                the_row();
                $news_post = array(
                    'post_publication' => get_sub_field('publication_name'),
                    'post_date' => get_sub_field('article_date'),
                    'post_title' => get_sub_field('article_headline'),
                    'post_url' => get_sub_field('article_url'),
                    'post_type' => 'news',
                    'post_year' => intval(date_format(date_create_from_format('d/m/Y', get_sub_field('article_date')), 'Y'))
                );
                $all_posts[] = $news_post;
            }
        }
    } else {
        $all_posts = get_posts(array(
            'post_type' => $post_type,
            'numberposts' => -1,
        ));
    }

    // Array of available post years
    $sort_by_year = get_sub_field('sort_by_year');

    if ($sort_by_year) {
        $post_years = [];
        foreach($all_posts as $post) {
            if ($post_type == 'news') {
                $year = $post['post_year'];
            } else {
                $year = intval($post->post_date);
            }

            if (!in_array($year, $post_years))  {
                $post_years[] = $year;
            }
        };
        rsort($post_years);

        // Check for year filter via url param
        if (isset($_GET['date'])) {
            $filter_year = intval(sanitize_text_field($_GET['date']));
        } else {
            $filter_year = max($post_years);
        };
    }

@endphp

@if ($sort_by_year)
    <div class="container">
        <section class="anchor-navigation">
            <div class="column-parent anchor-links">
                @foreach ($post_years as $menu_year)
                    <a class="{{ $menu_year === $filter_year ? 'active' : '' }}" href="{{ $listings_page }}?date={{ $menu_year }}">{{ $menu_year }}</a>
                @endforeach
            </div>
        </section>
    </div>
@endif
<div class="container">
	<div class="articles-wrapper">
		<div class="article-lists">
            @foreach ($all_posts as $post)
                @if ($sort_by_year && in_array($filter_year, $post_years))
                    @if ($post_type == 'news')
                        @if ($post['post_year'] === $filter_year)
                            @include('partials/press/article-card', ['post' => $post])
                        @endif
                    @else
                        @if (intval($post->post_date) === $filter_year)
                            @php $post = (array)$post; @endphp
                            @include('partials/press/article-card', ['post' => $post])
                        @endif
                    @endif
                @else
                    @if ($post_type !== 'news')
                        @php $post = (array)$post; @endphp
                    @endif
                    @include('partials/press/article-card', ['post' => $post])
                @endif
            @endforeach
		</div>
	</div>

	<div class="footer-link">
        @if (get_sub_field('back_to_page'))
            @include('partials.components.global-link', ['btn' => get_sub_field('back_to_page'), 'classes' => 'head-back'])
        @endif
	</div>
</div>
