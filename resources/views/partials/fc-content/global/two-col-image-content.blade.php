@php

/**
* @param $count from flexible-content.blade.php used for styling
*/

global $post;
$post_id = $post->ID;

$layouts = get_post_meta($post_id, 'flexible_content');
$layout_counts = array_count_values($layouts[0]);
$total_layouts = $layout_counts['two_col_image_content'];
$section = isset($count) ? 'section' . $count : '';
$headingWeight = get_sub_field('heading_weight') ? get_sub_field('heading_weight') : 'h2' ;

@endphp

@php($title = get_sub_field('title') ? strtolower(str_replace(' ', '', get_sub_field('title'))) : 'cpy-feature-cta')

<div id="{{ $section }}" class="container two-col-image-content no-side-pad anchored-content content-{{ get_sub_field('layout') }} {{ isset($count) ? ($count == 1 ? "first-container" : ($count == $total_layouts ? "last-container" : "")) : '' }}">
	<section id="{{$title}}">
		<div class="two-col">
			<div class="col">
				@if (get_sub_field('two-col-content_header'))
					<{{$headingWeight}}>{!! get_sub_field('two-col-content_header') !!}</{{$headingWeight}}>
				@endif
				{!! get_sub_field('two-col-content') !!}
				@if (get_sub_field('content_include'))
					@php($includeContent = get_sub_field('content_include'))
                    @if ($includeContent == 'cta')
						@if(get_sub_field('cta'))
							@include('partials.components.global-link', ['btn' => get_sub_field('cta')])
						@endif
                    @elseif ($includeContent == 'mobile')
						<div class="mobile-icons-download-section">
							@include('partials.components.global-mobile-apps')
						</div>
                    @endif
                @endif
			</div>
			<div class="col">
				@if (get_sub_field('enable_tabs'))
					@if (have_rows('two-col_tab_content'))
						<div class="payment-tab-content">
							<div class="tabs">
								@while (have_rows('two-col_tab_content')) @php(the_row())
									@php ($row = get_row_index())
									<a href="#" class="btn-content-toggle tab {{ $row == 1 ? "active" : ""}}" data-target="tab-{{ $row }}">{{ get_sub_field('tab_title') }}</a>
								@endwhile
							</div>
							<div class="payment-infos">
								@while (have_rows('two-col_tab_content')) @php(the_row())
									<div class="tab-{{ get_row_index() }} payment-info">
										{!! get_sub_field('tab_content') !!}
									</div>
								@endwhile
							</div>
						</div>
					@endif
				@elseif(get_sub_field('two-col-image'))
					@include('partials.components.global-image', ['img' => get_sub_field('two-col-image'), 'classes' => 'content-img ' . (get_sub_field('image_no_padding') ? 'no-pad' : '') . (get_sub_field('custom_image_class') ? get_sub_field('custom_image_class') : '')])
				@endif
			</div>
		</div>
	</section>
</div>
