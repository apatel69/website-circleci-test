@php
	global $post;
	$term = current(wp_get_post_terms( $post->ID, 'addons_categories'));
@endphp
<nav class="addons addons-breadcrumbs addons-grey-bg">
    <div class="wrapper">
		<a class="back-link" href="{{ get_permalink(get_field('addons_main_page', 'option')->ID) }}">Integrations</a>
		@if ($term)
			 <span class="breadcrumb-sep">&bull;</span> <a class="category" href="{{ get_term_link($term->term_id) }}">{{ $term->name }}</a>
		@endif
	</div>
</nav>