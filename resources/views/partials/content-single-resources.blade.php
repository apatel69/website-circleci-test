@php
	$title = get_the_title();
	$url = get_field('app_url');
	$id = get_the_id();

	$content = get_the_content();
	$read_time = estimated_reading_time(get_the_content());

	$rating = (int) get_field('article_rating');
	$author = get_the_author();
	$date = date(' F j, Y', strtotime(get_the_date()));

	$tags = get_the_terms($id, 'resource_tags');
	$main_page = get_field('resources_listing_page', 'option');
	$main_page_url = get_permalink($main_page->ID);

	$post_categories = get_post_primary_category($post->ID, 'resource_categories');
	$primary_category = $post_categories['primary_category'];

	$freshly_picked_articles = new WP_Query(
		[
			'post__not_in' => [$id],
			'post_type' => 'resources',
			'orderby' => 'menu_order',
            'order' => 'ASC',
			'posts_per_page' => 6,
			'page' => 1
		]
	);
@endphp

<div class="container" id="main-content">
	<section>
		<div class="two-col">
			<div class="col">
				<nav class="article-categories">
					@include ('partials.resources.sidebar', ['current_category_slug' => $primary_category->slug])
				</nav>
			</div>
			<div class="col main-col single">
				<div class="article-read-time">
					{{$read_time}} Min. Read
				</div>
				<h1 data-swiftype-name="title" data-swiftype-type="string">{{ $title }}</h1>
				<div class="article-meta">
					<div class="article-rating">
						@for ($i = 0; $i < 5; $i++)
              @if ($i >= $rating)
                  <img class="rating-star" src="@asset('images/icons/star-gold-transparent.svg')" alt="star-unchecked">
              @else
                  <img class="rating-star" src="@asset('images/icons/star-gold.svg')" alt="star-checked">
              @endif
				@endfor
					</div>
				{{-- <div class="article-creator-info">
					{{$date}} <span class="creator-divider">|</span> <i>{{$author}}</i>
				</div> --}}
				</div>
				<div class="breadcrumbs-wrap">
					<a href="{{ $main_page_url }}" class="breadcrumbs">{{ get_field('resources_breadcrumb_label', 'option') }}</a>
					@if (isset($primary_category->slug) && isset($primary_category->name))
						<a href="{{ $main_page_url }}/{{ $primary_category->slug }}" class="breadcrumbs"><span class="crumb-arrow">></span> {{ $primary_category->name }}</a>
					@endif
				</div>
				<div class="article-hero-image">
					@if (get_field('article_hero_image'))
						@php
              $image = get_field('article_hero_image');
            @endphp
						<img src="{{ $image['url'] }}" alt="{{ $image['alt'] }}">
					@endif
				</div>
				<div class="article-content">
					@php
						the_content();
					@endphp
				</div>
				<div class="rule"></div>
				@if ($freshly_picked_articles)
					<div class="article-freshly-picked">
						<h2>RELATED ARTICLES</h2>
						<div class="card-collection-wrap">
							<div class="card-collection">
								@while( $freshly_picked_articles->have_posts() )
									@php
										$freshly_picked_articles->the_post();
										global $post;
									@endphp
									@include ('partials.resources.freshly-picked-article-card', ['post' => $post])
								@endwhile
                @php
                  wp_reset_postdata();
                @endphp
							</div>
						</div>
					</div>
				@endif
			</div>
		</div>
	</section>
</div>
