@php
  $cta = get_sub_field('cta') || get_sub_field('cta_full_width_outline') || get_field('cta_full_width_outline')['cta'] ? true : false;
  $cta_text = get_sub_field('cta_outline_text') ?: get_sub_field('cta_full_width_outline')['text'] ?: get_field('cta_full_width_outline')['text'];
  $cta_btn = get_sub_field('cta') ?: get_sub_field('cta_full_width_outline')['cta'] ?: get_field('cta_full_width_outline')['cta'];
  if (!isset($adobeInsightsExitLink)) {
            $adobeInsightsExitLink = '';
    }
@endphp

<div class="container">
    <section id="cpy-feature-cta-1" class="full-width-cta-outline">
        <div class="outline-content">
            {!! $cta_text !!}
            @if($cta)
                @include('partials.components.global-link', ['btn' => $cta_btn], ['classes' => $adobeInsightsExitLink])
            @endif
        </div>
    </section>
</div>
