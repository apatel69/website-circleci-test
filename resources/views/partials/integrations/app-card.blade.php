@php 
	$id = $post;
	$top_pick = get_field('app_top_pick', $id);
	$post = get_post($id);
	$menu_order = $post->menu_order;
	$data_title = str_replace(' ', '-', strtolower(get_the_title()));
	$date = get_the_date('U');
@endphp

<div class="card" data-date="{{ $date }}" data-name="{{ $data_title }}" data-order="{{ $menu_order }}">
<a href="{{ get_permalink($id) }}">
	<div class="top-cap {!! $top_pick ? 'premium' : '' !!}">
		@if ($top_pick)
			@if (get_field('app_white_logo', $id))
				<img class="logo" src="{{ get_field('app_white_logo', $id)['url'] }}" alt="{{ get_field('app_white_logo', $id)['alt'] }}">
			@endif
			@if (get_field('integrations_top_pick_badge', 'option'))
				<img class="badge" src="{{ get_field('integrations_top_pick_badge', 'option')['url'] }}" alt="{{ get_field('app_logo')['alt'] }}">
			@endif
		@else 
			@if (get_field('app_logo', $id))
				<img class="logo" src="{{ get_field('app_logo', $id)['url'] }}" alt="{{ get_field('app_logo', $id)['alt'] }}">
			@endif
		@endif
	</div>
	<div class="content">
		@if (get_field('app_freshbooks_tested', $id))
			<span class="tested-flag">FreshBooks Tested</span>
		@endif
		<div class="clr"></div>
		@if (get_field('app_excerpt', $id))
			<p>{!! substr(get_field('app_excerpt', $id),0,100).'...' !!}</p>
		@endif
	</div>
	<div class="btn-wrap">
		<span class="btn">Learn More</span>
	</div>
</a>
</div>