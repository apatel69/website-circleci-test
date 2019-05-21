<div class="container hero hero-bg{!! isset($page) && $page == 'press' ? '' : ' hero-bg-solid' !!}" {!! get_sub_field('background_image')['url'] ? 'style="background-image:url(' . get_sub_field('background_image')['url'] . ')"' : '' !!}>
	<section>
		<div class="hero-title">
			<h1 class="hero-h1">
				@if (get_sub_field('hero_super_text'))
					<span class="super-text">{{ get_sub_field('hero_super_text') }}</span>
				@endif
				@if (get_sub_field('hero_title'))
					{{ get_sub_field('hero_title') }}
				@endif
			</h1>
			{!!get_sub_field('hero_content')!!}
			@if ( get_sub_field('press_hero_email') || get_sub_field('press_hero_phone'))
				<div class="press-hero-links">
					@if (get_sub_field('press_hero_email'))
						<span><a class="link-icon link-mail" href="mailto:pr@freshbooks.com">{{ get_sub_field('press_hero_email') }}</a></span>
					@endif
					@if (get_sub_field('press_hero_phone'))
						<span><a class="link-icon link-phone">{{ get_sub_field('press_hero_phone') }}</a></span>
					@endif
				</div>
			@endif
		</div>
	</section>
</div>