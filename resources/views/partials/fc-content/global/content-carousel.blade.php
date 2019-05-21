@php
    $page_template = basename(get_page_template());
    $post_id = 'option';
    $post_type = get_post_type();
    $adobeInsightsExitLink = isset($adobeInsightsExitLink) ? $adobeInsightsExitLink : '';

    if ($post_type === 'lpat_pages' || $post_type === 'education') {
        $trial_length = !empty(get_field('trial_length')) ? get_field('trial_length') : 30;
		$trial_cta_copy = !empty(get_field('trial_cta_copy')) ? get_field('trial_cta_copy') : "Try It Free";
		$trial_url = get_field('trial_url');
    }
@endphp


@if (get_sub_field('use_custom_slides'))
	@php($post_id = $post->ID)
@endif

@if (have_rows('carousel_slides', $post_id))
	<div class="container no-side-pad">
		<section id="cpy-carousel">
			<a id="section{{ $counter }}" class="anchor"></a>
			<div class="container blue-background carousel-nav">
				<section>
					<div class="features-nav">
						@while (have_rows('carousel_slides', $post_id)) @php(the_row())
							<a href="#" class="tab {{ get_row_index() == 1 ? 'active' : ''}}" data-target="{{ get_row_index() }}">{{ get_sub_field('carousel_slide_label', $post_id) }}</a>
						@endwhile
					</div>
				</section>
			</div>
			<div class="blue-white-background container">
				<div class="feature-arrow left-arrow">
					<img src="@asset('images/carousel/arrow-left.svg')" alt="Next Feature">
				</div>
				<section class="features">
					@while (have_rows('carousel_slides', $post_id)) @php(the_row())
						<div class="slide" data-target="{{ get_row_index() }}">
							<div class="feature invoicing">

								<div class="feature-content">
									@if (get_sub_field('carousel_slide_title', $post_id))
										<h3>{{ get_sub_field('carousel_slide_title', $post_id) }}</h3>
									@endif

                                    @if (get_sub_field('carousel_slide_content', $post_id))
                                        <p>{{ get_sub_field('carousel_slide_content', $post_id) }}</p>
                                    @endif

                                    @if (get_sub_field('carousel_slide_cta', 'options'))
                                        @if (($page_template != 'home-page.blade.php' && !get_sub_field('carousel_sign_up_link', $post_id)) && $post_type !== 'lpat_pages' && $post_type !== 'education')
                                            @include('partials.components.global-link', ['btn' => get_field('carousel_sign_up_link', $post_id), 'classes' => $adobeInsightsExitLink])
                                        @elseif ($post_type === 'lpat_pages' || $post_type === 'education')
                                            <a href="{{ $trial_url }}" class="primary-cta lpat-carousel-cta" target="_blank" rel="noopener" data-subscription-days="{{ $trial_length }}">{{ $trial_cta_copy }}</a>
                                        @else
                                            @include('partials.components.global-link', ['btn' => get_sub_field('carousel_slide_cta', $post_id), 'classes' => 'ghost-button no-width info-button'])
                                        @endif
                                    @endif
                                </div>

                                <div class="feature-image">
                                    @if (get_sub_field('carousel_slide_image', $post_id))
                                        @include('partials.components.global-image', ['img' => get_sub_field('carousel_slide_image', $post_id)])
                                    @endif
								</div>

							</div>
						</div>
					@endwhile
				</section>
				<div class="feature-arrow right-arrow">
					<img src="@asset('images/carousel/arrow-right.svg')" alt="Previous Feature">
                </div>
                @if($post_type==='lpat_pages')
                    <div class="centered-cta-mobile">
                        @include('partials.lpat.centered-cta-mobile')
                    </div>
                @endif
            </div>
        </section>
    </div>
@endif
