@php
    $text = get_field('review_text', 'option') ?: "Excellent";
    $rating = get_field('review_rating', 'option')['url'] ?: App\asset_path('images/testimonial/four-point-five-stars.svg');
    $review_count = number_format(get_field('review_count', 'option')); // NOT related to counter (for section IDs)
	$section = isset($count) ? "section" . $count : "";
@endphp

<div id="{{ $section }}" class="getapp container">
	<section>
		<div class="getapp-widget">
			<strong>{{ $text }}</strong>
			<img src="{{ $rating }}" alt="breadcrumb-arrow" class="arrow">
			<span class="nowrap">
				(Based on <a href="https://www.getapp.com/finance-accounting-software/a/freshbooks/" target="_blank" rel="nofollow">{{ $review_count }} GetApp reviews)</a>
			</span>
		</div>
	</section>
</div>
