@include('partials/press/global-hero-sub-header-menu')

@php
  	$title = get_the_title();
	$post_type = $post->post_type;
	if ($post_type == 'news') {
		$listings_page = get_permalink(get_field('press_news_coverage_page', 'option')->ID);
	} elseif ($post_type == 'press_releases') {
		$listings_page = get_permalink(get_field('press_release_page', 'option')->ID);
	} elseif ($post_type = 'data_research') {
		$listings_page = get_permalink(get_field('press_data_research_page', 'option')->ID);
	}
@endphp

<div class="container">
	<div class="heading-social">
		<div class="press-row">
			<h2 class="press-heading">{{ $title }}</h2>
		</div>
		@include('partials/press/social-share')
	</div>
</div>

<div class="container">
	<div class="content-container">
		<div class="flex-1">
			{{ the_content() }}
			<div class="content-social">
				@include('partials/press/social-share')
				<a class="head-back" href="{{ $listings_page }}">Back to Data and Research</a>
			</div>
		</div>
		<div class="flex-2">
			<h3>Most Recent</h3>
			@include('partials/press/sidebar-recent-posts', ['number_of_posts' => get_field('press_number_of_most_recent_posts', 'option')])
		</div>
	</div>
</div>
