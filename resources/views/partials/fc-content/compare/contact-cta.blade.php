<div class="container">
	<section class="contact-cta">
        @if (get_field('contact_cta_title', 'option'))
            <h2>{{ get_field('contact_cta_title', 'option') }}</h2>
        @endif
		{!! get_field('contact_cta_content', 'option') !!}
		@if (get_field('contact_cta_image', 'option'))
            @include('partials.components.global-image', ['img' => get_field('contact_cta_image', 'option')])            
        @endif
	</section>
</div>