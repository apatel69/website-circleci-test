@php

/**
* @partial, displays image and retina image based on params given
* @param $img[] array from ACF
* @param $classes custom classes to include on image element
*/
	$image = isset($img['global_image']['url']) ? $img['global_image']['url'] : get_sub_field('global_image')['url'];
	$has_retina = isset($img['global_include_retina_image']) ? $img['global_include_retina_image'] : get_sub_field('global_include_retina_image');
	$retina_image = isset($img['global_retina_image']['url']) ? $img['global_retina_image']['url'] : get_sub_field('global_retina_image')['url'];
	$lazy = isset($lazy_load) ? $lazy_load : (isset($img['global_disable_lazy_load']) ? !$img['global_disable_lazy_load'] : !get_sub_field('global_disable_lazy_load'));
	$display_as_background = isset($is_background_image) ? $is_background_image : 'false';
	$background_element_id = isset($background_element_id) ? $background_element_id : '';
	$title = isset($img['global_image']['title']) ? preg_replace("/[^a-zA-Z]+/", "", $img['global_image']['title']) : false;
	$caption = isset($caption) ? $caption : '';

	$classes = isset($img['custom_image_class']) ?
		$img['custom_image_class'] . ' ' . (isset($classes) ? $classes :
		get_sub_field('custom_image_class')) :
		(isset($classes) ? $classes : '');

	$alt = isset($img['global_image']['alt']) ? $img['global_image']['alt'] : get_sub_field('global_image')['alt'];

@endphp
@if ($image)
	@if ($display_as_background == 'true')
		<style>
		{{"#".$background_element_id}}{
			background-image: url({{$image}});
		}
        @if ($retina_image)
    		@media all and (-webkit-min-device-pixel-ratio : 1.5),
    	 		all and (-o-min-device-pixel-ratio: 3/2),
    	 		all and (min--moz-device-pixel-ratio: 1.5),
    	 		all and (min-device-pixel-ratio: 1.5) {
    				{{"#".$background_element_id}}{
    					background-image: url({{$retina_image}});
    				}
        @endif
		</style>
	@else
		<img {!! $lazy ? 'data-src=' . $image . ' src=""' : 'src="'. $image . '"'!!} {!! $title ? 'id="' . $title . '"' : '' !!} class="{{ $lazy ? 'lazy' : '' }} {{ $classes }}" alt="{{ $alt }}" {!! $has_retina == 1 ? ($lazy ? 'data-' : '') . 'srcset="' . $image . ' 1x, ' . $retina_image . ' 2x"' : '' !!}>
		@if ($caption)
			<span class="image-caption">{{$caption}}</span>
		@endif
	@endif
@endif
