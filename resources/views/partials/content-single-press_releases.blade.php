@php 
  $title = get_the_title();
  $date = get_the_date('d/m/Y');
  $main_page = get_field('press_listings_page', 'option');
  $main_page_id = $main_page->ID;
  $main_page_url = get_permalink($main_page_id);
@endphp

<div class="container">
	<div class="heading-social">
		<div class="press-row">
			<p>{{ $date }}</p>
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
				<a class="head-back" href="{{ $main_page_url }}">Back to Press Releases</a>
			</div>
		</div>
		<div class="flex-2">
			<h3>Most Recent</h3>
			@include('partials/press/sidebar-recent-posts', ['number_of_posts' => get_field('press_number_of_most_recent_posts', 'option')])
		</div>
	</div>
</div>