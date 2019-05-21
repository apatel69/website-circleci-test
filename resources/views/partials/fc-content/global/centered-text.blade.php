@include('partials.fc-content.global.divider')
@php
    $section = isset($count) ? 'section' . $count : '';
@endphp
<div id="{{ $section }}" class="container no-side-pad centered-text">
	<div class="cta-text-take-a-tour">
		{!! get_sub_field('text') !!}
	</div>
</div>
