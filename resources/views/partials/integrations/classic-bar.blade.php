<style>
    header {
        margin-top: 40px;
    }
    .privacy-alert-banner {
      top: 40px;
    }
</style>
<div class="sticky-bar-classic">
	{!! get_field('classic_bar_text', 'option') !!}

    @if (get_field('bar_hover_image', 'option'))
        @include('partials.components.global-image', ['img' => get_field('bar_hover_image', 'option'), 'classes' => 'hover-img'])
    @endif
</div>
