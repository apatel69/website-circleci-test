@php
    $trial_length = !empty(get_field('trial_length')) ? get_field('trial_length') : 30;
    $trial_cta_copy = !empty(get_field('trial_cta_copy')) ? get_field('trial_cta_copy') : "Try It Free";
    $trial_url = get_field('trial_url');
    $trial_outlined_text = !empty(get_field('trial_cta_outlined')['text']) ? get_field('trial_cta_outlined')['text'] : get_field('lpat_centered_text', 'options');
    $trial_outlined_subtext = !empty(get_field('trial_cta_outlined')['subtext']) ? get_field('trial_cta_outlined')['subtext'] : get_field('lpat_centered_sub_text', 'options');
@endphp


<div class="container centered-content">
    <section class="centered-text-cta">
        <div class="centered-text-cta__content">

            <div class="centered-text-cta__text">
                @if ($trial_outlined_text)
                    <p class="centered-text-cta__message">{!! $trial_outlined_text !!}</p>
                @endif
                @if ($trial_outlined_subtext)
                    <p class="centered-text-cta__subtext">{{ $trial_outlined_subtext }}</p>
                @endif
            </div>

            <div class="centered-text-cta__cta">
                <a href="{{ $trial_url }}" class="primary-cta" target="_blank" rel="noopener" data-subscription-days="{{ $trial_length }}">{{ $trial_cta_copy }}</a>
            </div>

            @if ($trial_outlined_subtext)
                <p class="centered-text-cta__subtext--mobile">{{ $trial_outlined_subtext }}</p>
            @endif

        </div>
    </section>
</div>
