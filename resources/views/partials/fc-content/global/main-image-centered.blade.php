@php($title = get_sub_field('title') ? strtolower(preg_replace("/[^a-zA-Z]+/", "", get_sub_field('title'))) : 'main-image-centered')
<div class="container main-content" id="{{$title}}">
	<section id="cpy-main-content">
		  @if (get_sub_field('image'))
			@include('partials.components.global-image', ['img' => get_sub_field('image')])
		@endif

	</section>
</div>
