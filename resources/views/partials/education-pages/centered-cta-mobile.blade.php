@php
    $trial_length = !empty(get_field('trial_length')) ? get_field('trial_length') : 30;
    $trial_cta_copy = !empty(get_field('trial_cta_copy')) ? get_field('trial_cta_copy') : "Try It Free";
    $trial_url = get_field('trial_url');
    $trial_outlined_subtext = get_field('trial_cta_outlined')['subtext'];
@endphp

<div class="container hide-desktop">
    <section>
        <a href="{{ $trial_url }}" class="primary-cta mobile-only-cta" target="_blank" rel="noopener">{{ $trial_cta_copy }}</a>
        @if ($trial_outlined_subtext)
            <p class="centered-text-cta__subtext--mobile text-center">{{ $trial_outlined_subtext }}</p>
        @endif
    </section>
</div>
