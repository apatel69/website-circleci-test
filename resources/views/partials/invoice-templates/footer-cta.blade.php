<div class="container">
	<section>
		<div class="background-img-cta" style="background-image:url('{{ get_field('invoice_templates_cta_background_image', 'option')['url'] }}')">
			<div class="background-img-cta-content">
				<span>{{ get_field('invoice_templates_footer_cta_title', 'option') }}</span>
				<p>{{ get_field('invoice_templates_footer_cta_text', 'option') }}</p>
			</div>
            @if (get_field('invoice_templates_footer_cta', 'option'))
				<div class="cta-subtext-assurance">
					<div class="cta-subtext">
						@include('partials.components.global-link', ['btn' => get_field('invoice_templates_footer_cta', 'option')])
					</div>
				</div>
            @endif
		</div>
	</section>
</div>