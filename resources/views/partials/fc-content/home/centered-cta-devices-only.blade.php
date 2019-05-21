<div class="container hide-desktop">
	<section>
		@if(get_sub_field('cta_tablet_and_mobile'))
            @include('partials.components.global-link', ['btn' => get_sub_field('cta_tablet_and_mobile'), 'classes' => 'primary-cta mobile-only-cta'])
        @endif 
	</section>
</div>

