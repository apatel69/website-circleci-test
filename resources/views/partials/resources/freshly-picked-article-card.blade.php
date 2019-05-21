@php
	$id = $post;
	$title = get_the_title();
@endphp
<div class="freshly-picked-article-card" data-date="{{ $date }}" data-name="{{ $data_title }}" data-order="{{ $menu_order }}">
	<div class="freshly-picked-image responsive-image-fill" style="background-image: url('{{ get_field('article_listing_image', $id)['url'] }}');" alt="{{ get_field('article_listing_image', $id)['alt'] }}"></div>
	<div class="freshly-picked-title">
		<a href="{{ get_permalink($id) }}">
			{{$title}}
		</a>
	</div>
</div>
