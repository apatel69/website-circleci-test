<div class="container addons-footer">
	<section>
		<div class="content">
			@if (get_field('integrations_full_cta_title', 'option'))		
				<h2>{{ get_field('integrations_full_cta_title', 'option') }}</h2>
			@endif

			{!! get_field('integrations_full_cta_description', 'option') !!}
			
			@if (get_field('integrations_full_cta_image', 'option'))
				@include('partials.components.global-image', ['img' => get_field('integrations_full_cta_image', 'option')])
			@endif
		</div>
	</section>
</div>
