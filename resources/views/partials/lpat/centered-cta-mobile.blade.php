@php
    $trial_length = !empty(get_field('trial_length')) ? get_field('trial_length') : 30;
    $trial_cta_copy = !empty(get_field('trial_cta_copy')) ? get_field('trial_cta_copy') : "Try It Free";
    $trial_url = get_field('trial_url');
@endphp
<div class="container hide-desktop">
    <section>
        <a href="{{ $trial_url }}" class="primary-cta mobile-only-cta" target="_blank" rel="noopener" data-subscription-days="{{ $trial_length }}">{{ $trial_cta_copy }}</a>
        @if(get_field('lpat_centered_sub_text', 'options'))
            <p class="centered-text-cta__subtext--mobile text-center">{{ get_field('lpat_centered_sub_text','options') }}</p>
        @endif
    </section>
</div>
