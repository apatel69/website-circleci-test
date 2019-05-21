<?php
$customtext = get_field('custom_text'); // boolean field to check if to override centered text for particular post of Data research or Press release
?>

@if (get_field('press_centered_text', 'option') || $customtext)
    @include('partials.fc-content.global.divider')
    <div class="container no-side-pad">
        <div class="cta-text-take-a-tour">
            @if ($customtext)
                {!! get_field('centered_text_cta')['text'] !!}
            @else
                {!! get_field('press_centered_text', 'option') !!}
            @endif
        </div>
    </div>
@endif
