@php ($background = get_field('resources_hero_background_image', 'option')['url'])

<div class="container masthead" {!! $background ? 'style="background-image: url(' . $background . ');"' : '' !!}>
	<section>
		<div class="content">
            @if (get_field('resources_hero_title', 'option'))
			    <h1>{{ get_field('resources_hero_title', 'option') }}</h1>
            @endif
			<input type="text" name="articles_search" class="st-default-search-input articles-search" placeholder="{{ get_field('resources_search_field_placeholder_text', 'option')}}">
		</div>
	</section>
</div>
