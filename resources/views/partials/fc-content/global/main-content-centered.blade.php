<div class="container main-content">
	<section id="cpy-main-content">
    	@if (get_sub_field('title'))
			<h2>{{ get_sub_field('title') }}</h2>
		@endif

		{!! get_sub_field('description') !!}

    	@if (get_sub_field('image'))
			@include('partials.components.global-image', ['img' => get_sub_field('image')])
		@endif

		@if (get_sub_field('features_exist') && get_sub_field('features'))
			<div class="features-wrapper">
				@while(have_rows('features')) @php(the_row())
					<div class="feature">
						@if (get_sub_field('icon'))
							@include('partials.components.global-image', ['img' => get_sub_field('icon')])
						@endif
						@if(get_sub_field('icon_text'))
							<div class="text-wrapper">{{get_sub_field('icon_text')}}</div>
						@endif
					</div>
				@endwhile
			</div>
		@endif


		@if (get_sub_field('include_cta'))
			@if (get_sub_field('cta'))
				@include('partials.components.global-link', ['btn' => get_sub_field('cta'), 'classes' => 'ghost-button learn-more'])
			@endif
		@endif
	</section>
</div>
