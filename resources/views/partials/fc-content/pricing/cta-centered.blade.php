<div class="container">
	<section class="cta-only-section">
		<div class="cta-subtext">
            @if (get_sub_field('cta'))
                @include('partials.components.global-link', ['btn' => get_sub_field('cta')])
            @endif
		</div>
	</section>
</div>