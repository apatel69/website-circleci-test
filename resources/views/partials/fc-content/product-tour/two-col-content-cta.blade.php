<div class="container">
	<section class="more-features">
		<div class="column-parent features-section" id="cta-block-container">
			<div class="feature-details">
				@if (get_sub_field('content_title'))
					<h2>{{ get_sub_field('content_title') }}</h2>
				@endif
				{!! get_sub_field('content_desc') !!}
			</div>
			<div class="cta-block">
				@if (get_sub_field('cta_block_image'))
					<img src="{{ get_sub_field('cta_block_image') }}" class="cta-block-image">
				@endif
				<div class="cta-block-container">
					@if (get_sub_field('cta_block_title'))
						<h2>{{ get_sub_field('cta_block_title') }}</h2>
					@endif
					{!! get_sub_field('cta_block_content') !!}
					@if (get_sub_field('cta'))
						@include('partials.components.global-link', ['btn' => get_sub_field('cta'), 'classes' => 'full-width-cta'])
          @endif
          @if(get_sub_field('add_app_store_badge'))
            <p class="app-store-badge"> 
              @include('partials.components.global-mobile-apps')
            </p>
          @endif  
				</div>
			</div>
		</div>
	</section>
</div>
