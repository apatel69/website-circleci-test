@php
	// Page Values
	$custom_content = get_sub_field('custom_content');
	$title = get_sub_field('title') ? strtolower(preg_replace("/[^a-zA-Z]+/", "", get_sub_field('title'))) : 'cpy-cta-full-width';
	$adobeInsightsExitLink = isset($adobeInsightsExitLink) ? $adobeInsightsExitLink : '';

	// Trial Values
	if (get_post_type()==='lpat_pages' || get_post_type()==='education') {
		$trial_length = !empty(get_field('trial_length')) ? get_field('trial_length') : 30;
		$trial_cta_copy = !empty(get_field('trial_cta_copy')) ? get_field('trial_cta_copy') : "Try It Free";
		$trial_url = get_field('trial_url');
	}
@endphp

<div class="container no-side-pad cta-full-wrap">
	<section class="cta-full-width" id="{{$title}}">
		<div class="two-col">
			<div class="col">
				<h2 class="cta-heading">{{ $custom_content ? get_sub_field('cta_title') : get_field('cta_title', 'option') }}</h2>
				<div class="cta-button">
					@if(get_post_type()==='lpat_pages' || get_post_type()==='education')
						<a href="{{ $trial_url }}" class="primary-cta full-width-cta" target="_blank" rel="noopener" data-subscription-days="{{ $trial_length }}">{{ $trial_cta_copy }}</a>
                    @else
                        @include('partials.components.global-link', ['btn' => $custom_content ? get_sub_field('cta_btn') : get_field('cta_btn', 'option'), 'classes' => 'full-width-cta '.$adobeInsightsExitLink])
                    @endif
				</div>
				<div class="cta-description">
					<span>{!! $custom_content ? get_sub_field('cta_subtext') : get_field('cta_subtext', 'option') !!}</span>
				</div>
			</div>
			<div class="col">
				@include('partials.components.global-image', ['img' => $custom_content ? get_sub_field('cta_image') : get_field('cta_image', 'option')])
			</div>
		</div>
	</section>
</div>
