@php($title = get_sub_field('title') ? strtolower(preg_replace("/[^a-zA-Z]+/", "", get_sub_field('title'))) : 'cpy-main-content')
<div class="container custom-footer-centered">
	<section id="{{$title}}">

        @if (get_sub_field('title'))
			<h2>{{ get_sub_field('title') }}</h2>
		@endif

		@if (get_sub_field('title'))
    		{!! get_sub_field('description') !!}
    	@endif

    	@if (get_sub_field('image'))
			@include('partials.components.global-image', ['img' => get_sub_field('image')])
		@endif

		@if (get_sub_field('include_cta'))
			@if (get_sub_field('cta'))
				@include('partials.components.global-link', ['btn' => get_sub_field('cta'), 'classes' => 'primary-cta learn-more'])
			@endif
		@endif

        @include('partials.fc-content.global.featured-in', ['custom' => get_sub_field('featured_in')])

	</section>
</div>
