@php
	$text = isset($btn['global_link_text']) ? $btn['global_link_text'] : get_sub_field('global_link_text');
	$type = isset($btn['global_link_type']) ? $btn['global_link_type'] : get_sub_field('global_link_type');
	$classes = isset($classes) ? $classes : ''; // custom classes
	$url = isset($btn['global_link_url']) ? $btn['global_link_url'] : get_sub_field('global_link_url');
	$display = isset($btn['global_link_or_cta']) ? $btn['global_link_or_cta'] : get_sub_field('global_link_or_cta');

	if ($type === 'internal') {
		$page = isset($btn['global_page_link']) ? $btn['global_page_link'] : get_sub_field('global_page_link');
        $url = $page;
    } elseif ($type === 'file') {
		$file = isset($btn['global_link_file']['url']) ? $btn['global_link_file']['url'] : get_sub_field('global_link_file')['url'];
		$download = 'download';
        $url = $file;
    } elseif ($type === 'external') {
		$action = isset($btn['global_link_action']) ? $btn['global_link_action'] : get_sub_field('global_link_action');
		if ($action) {
			$linkTarget = ' target="_blank" rel="noopener" ';
		}
	} elseif ($type === 'anchor') {
		$anchor = isset($btn['global_anchor_hash']) ? $btn['global_anchor_hash'] : get_sub_field('global_anchor_hash');
		$classes .= ' anchor-link';
		$url = $anchor;
	}

	if ($display === 'cta') {
		$subtext = isset($btn['global_cta_subtext']) ? $btn['global_cta_subtext'] : get_sub_field('global_cta_subtext');
		$classes .= ' primary-cta';
	}

@endphp

@if ($text)
	<a href="{{$url}}" class="{{ $classes }}"{!! isset($linkTarget) ? $linkTarget : '' !!}{!! isset($download) ? $download : '' !!}>{{ $text }}</a>

	@if (isset($subtext) && $subtext !== '')
		@if ($subtext != strip_tags($subtext))
			<span class="subtext">{!! $subtext !!}</span>
		@else
			<span class="subtext">{{ $subtext }}</span>
		@endif
	@endif
@endif
