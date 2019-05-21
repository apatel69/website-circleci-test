@php
	$appleClasses = isset($app_store_classes) ? $app_store_classes : '';
	$googleClasses = isset($play_store_classes) ? $play_store_classes : '';
@endphp

@if(get_field('apple_app_store', 'option'))
	@php 
		$appStore = get_field('apple_app_store', 'option');
		$appStoreUrl = isset($appleUrl['app_store_url']) ? $appleUrl['app_store_url'] : $appStore['app_store_url'];
		$appStoreIcon = isset($appleIcon['global_link_text']) ? $appleIcon['global_link_text'] : $appStore['app_store_icon'];
	@endphp
@endif

@if(get_field('google_play_store', 'option'))
	@php 
		$playStore = get_field('google_play_store', 'option');
		$googleStoreUrl = isset($googleUrl['global_cta_subtext']) ? $googleUrl['global_cta_subtext'] : $playStore['google_play_url'];
		$googleStoreIcon = isset($googleUrl['global_link_action']) ? $googleUrl['global_link_action'] : $playStore['google_play_icon'];
	@endphp
@endif

@if ($appStoreUrl)
	<a href="{{$appStoreUrl}}" class="{{ $appleClasses }}" target="_blank" rel="noopener">
		@if ($appStoreIcon)
			<img src="{{ $appStoreIcon['url'] }}" alt="{{ $appStoreIcon['alt'] }}">
		@endif
	</a>
@endif

@if ($googleStoreUrl)
	<a href="{{$googleStoreUrl}}" class="{{ $googleClasses }}" target="_blank" rel="noopener">
		@if ($googleStoreIcon)
			<img src="{{ $googleStoreIcon['url'] }}" alt="{{ $googleStoreIcon['alt'] }}">
		@endif
	</a>
@endif
