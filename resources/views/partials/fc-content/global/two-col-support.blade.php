<div class="container no-side-pad anchored-content content-{{ get_sub_field('layout') }}">
	<section class="support">
		<div class="two-col">
			<div class="col">
				@if (get_sub_field('two-col-content_header'))
					<h2>{!! get_sub_field('two-col-content_header') !!}</h2>
				@endif
				{!! get_sub_field('two-col-content') !!}
				@if (get_sub_field('contact_support_heading'))
					<p class="support-heading"><strong>{{ get_sub_field('contact_support_heading') }}</strong></p>
				@endif
				<div class="contact-details">
					@if (get_sub_field('support_phone'))
						<p><a><span class="phone">{{ get_sub_field('support_phone') }}</span></a></p>
					@endif
					@if (get_sub_field('support_email'))
						<p><a href="mailto:{{ get_sub_field('support_email') }}"><span class="email">{{ get_sub_field('support_email') }}</span></a></p>
					@endif
				</div>
			</div>
			<div class="col">
				@if(get_sub_field('two-col-image'))
					@include('partials.components.global-image', ['img' => get_sub_field('two-col-image'), 'classes' => 'content-img ' . (get_sub_field('image_no_padding') ? 'no-pad' : '') . (get_sub_field('custom_image_class') ? get_sub_field('custom_image_class') : '')])
				@endif
			</div>
		</div>
	</section>
</div>