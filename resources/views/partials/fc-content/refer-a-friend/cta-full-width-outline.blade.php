@php
$cta = get_sub_field('cta');
$cta_copy = $cta['global_cta_subtext'];
@endphp

<div class="container">
	<section id="cpy-feature-cta-1">
		<div class="outline-content">
			<div class="cta-text">
				{!! get_sub_field('cta_outline_text') !!}
				<span class="subtext">{{$cta_copy}}</span>
			</div>
			
			@if(get_sub_field('cta'))
			<div class="cta-button">
				@include('partials.components.global-link', ['btn' => $cta])
			</div>
			@endif
		</div>
	</section>
</div>