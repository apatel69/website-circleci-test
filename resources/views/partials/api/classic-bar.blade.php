@php($classic_bar = get_field('api_classic_bar', 'option'))

<div class="sticky-bar-classic">
	{!! $classic_bar['text'] !!}

    @if ($classic_bar['hover_image'])
        @include('partials.components.global-image', ['img' => $classic_bar['hover_image'], 'classes' => 'hover-img'])
    @endif
</div>
