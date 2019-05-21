@php
    $data = get_field('cta_full_width_centered');
    $title = $data['title'];
    $cta = $data['cta'];
@endphp

<div class="container no-side-pad cta-full-width-centered">
	<section class="cta-full-width" id="{{ $title }}">

        <h2 class="cta-heading">{{ $title }}</h2>

        <div class="cta-button">
            @include('partials.components.global-link', ['btn' => $cta, 'classes' => 'full-width-cta'])
        </div>

	</section>
</div>
