@php
$element_id = preg_replace("/[^a-zA-Z]+/", "", get_sub_field("cta_text"));
@endphp

@if (get_sub_field('background_image'))
    @include('partials.components.global-image', ['img' => get_sub_field('background_image'), 'is_background_image' => true, 'background_element_id' => $element_id])
@endif

<div id="{{$element_id}}" class="select-footer-full-width-cta">
    <div class="select-footer-full-width-cta-content">
        @if (get_sub_field('cta_text'))
            <h3>{{get_sub_field('cta_text')}}</h3>
        @endif
        @if (get_sub_field('cta_link'))
            @include('partials.components.global-link', ['btn' => get_sub_field('cta_link')])
        @endif
    </div>
</div>
