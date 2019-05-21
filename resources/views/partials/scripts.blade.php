

<script>(function(w,d,s,l,i){w[l]=w[l]||[];w[l].push({'gtm.start':new Date().getTime(),event:'gtm.js'});var f=d.getElementsByTagName(s)[0],j=d.createElement(s),dl=l!='dataLayer'?'&l='+l:'';j.async=true;j.src='//www.googletagmanager.com/gtm.js?id='+i+dl;f.parentNode.insertBefore(j,f);})(window,document,'script','dataLayer','GTM-MCH68J');</script>

<!-- Schema Markup -->
@if (get_field('schema_markup'))
	@php
		echo get_field('schema_markup')
	@endphp
@endif

<!-- Load page-specific scripts-->
@if (get_field('include_page_specific_scripts'))
	@foreach (get_field('page_specific_scripts') as $script)
		@php
			echo $script['script_code']
		@endphp
	@endforeach
@endif
