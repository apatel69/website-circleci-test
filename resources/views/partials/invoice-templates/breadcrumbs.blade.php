@php
    if (is_single()) {
        $post_type = get_post_type();
        $primary_category = get_post_primary_category($post->ID, $post_type . '_categories')['primary_category'];
        $breadcrumb = get_field('breadcrumb_label', $primary_category) ? get_field('breadcrumb_label', $primary_category) : $primary_category->name;
    } else {
        $term = get_queried_object();
        $tax = $term->taxonomy;
        if ($tax == 'invoice_templates_categories') {
            $post_type = 'invoice_templates';
            $breadcrumb = $term->name;
        } elseif ($tax == 'accounting_software_categories') {
            $post_type = 'accounting_software';
            $breadcrumb = get_field('breadcrumb_label', $term);
        }
    }

    $main_page = get_field($post_type . '_listing_page', 'option');
    $main_page_url = get_permalink($main_page->ID);
@endphp

<div class="container">
	<section>
		<div class="breadcrumbs">
            <a href="{{ $main_page_url }}">{{ get_field($post_type . '_breadcrumb_label', 'option') }}</a>
			@if (isset($primary_category->slug) && $breadcrumb)
                <img src="@asset('images/icons/breadcrumb-direction.svg')" alt="breadcrumb-arrow" class="arrow">
				<a href="{{ get_term_link($primary_category) }}">{{ $breadcrumb }}</a>
            @elseif (is_tax())
                <img src="@asset('images/icons/breadcrumb-direction.svg')" alt="breadcrumb-arrow" class="arrow">
				<span class="current capitalize">{{ $breadcrumb }}</span>
			@endif
            @if (get_field('profession'))
                <img src="@asset('images/icons/breadcrumb-direction.svg')" alt="breadcrumb-arrow" class="arrow">
                <span class="current">{{ get_field('profession') }}</span>
            @endif
		</div>
	</section>
</div>