@php ($background = get_field('integrations_hero_background_image', 'option')['url'])
<div class="container masthead" {!! $background ? 'style="background-image: url(' . $background . ');"' : '' !!}>
	<section>
		<div class="content">
            @if (get_field('integrations_hero_title', 'option'))
			    <h1>{{ get_field('integrations_hero_title', 'option') }}</h1>
            @endif
            @if (get_field('integrations_subtitle', 'option'))
                <p>{{ get_field('integrations_subtitle', 'option') }}</p>
            @endif
			<input type="text" name="addons_search" class="st-default-search-input addons-search" placeholder="{{ get_field('integrations_search_field_placeholder_text', 'option')}}">
		</div>
	</section>
</div>
