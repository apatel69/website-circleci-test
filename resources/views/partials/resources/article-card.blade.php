@php
	$id = $post;
	$top_pick = get_field('app_top_pick', $id);
	$post = get_post($id);
	$categories = get_the_terms($id, 'resource_categories');
	$category = "";
	if ($categories) {
		$category = strtoupper($categories[0]->name);
	}
	$read_time = estimated_reading_time(get_the_content());
	$menu_order = $post->menu_order;
	$title = get_the_title();
	$data_title = str_replace(' ', '-', strtolower($title));
	$date = get_the_date('U');
	$rating = (int) get_field('article_rating');
    $article_image = get_field('article_listing_image', $id) ? get_field('article_listing_image', $id) : false;
@endphp
<a href="{{ get_permalink($id) }}">
    <div class="card" data-date="{{ $date }}" data-name="{{ $data_title }}" data-order="{{ $menu_order }}">
        {{-- Keep next line all inline for top-logo:empty to function correctly --}}
        <div class="top-logo">@if ($article_image)<div class="responsive-image-fill" style="background-image: url('{{ $article_image['url'] }}');" alt="{{ $article_image['alt'] }}"></div>@endif</div>
    	<div class="top-category">
    		{{$category}}
    	</div>
    	<div class="content">
    		<h3>{{$title}}</h3>
    		<div class="clr"></div>

    		<div class="bottom-info">
    			<div class="bottom-info-left">
    				{{ $read_time }} Min. Read
    				<div class="article-rating">
    					@for ($i = 0; $i < 5; $i++)
    						@if ($i >= $rating)
    							<img class="rating-star" src="@asset('images/icons/star-gold-transparent.svg')" alt="star-unchecked">
    						@else
    							<img class="rating-star" src="@asset('images/icons/star-gold.svg')" alt="star-checked">
    						@endif
    					@endfor
    				</div>
    			</div>
    			<a href="{{ get_permalink($id) }}" class="btn bottom-info-right">Read More</a>
    		</div>
    	</div>
    </div>
</a>
