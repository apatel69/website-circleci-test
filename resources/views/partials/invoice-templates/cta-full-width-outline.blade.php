@php
    if (isset($count) && get_field('cta_full_width_outline_' . $count)) {
        $data = get_field('cta_full_width_outline_' . $count);
        $cta = $data['cta'] ? true : false;
        $cta_text = $data['text'];
        $cta_btn = $data['cta'];
    } else {
        $cta = get_sub_field('cta') || get_sub_field('cta_full_width_outline') || get_field('cta_full_width_outline')['cta'] ? true : false;
        $cta_text = get_sub_field('cta_outline_text') ?: get_sub_field('cta_full_width_outline')['text'] ?: get_field('cta_full_width_outline')['text'];
        $cta_btn = get_sub_field('cta') ?: get_sub_field('cta_full_width_outline')['cta'] ?: get_field('cta_full_width_outline')['cta'];
    }
@endphp
<div class="container">
    <section id="cpy-feature-cta-1" class="full-width-cta-outline">
        <div class="outline-content">
            {!! $cta_text !!}
            @if($cta)
                @include('partials.components.global-link', ['btn' => $cta_btn])
            @endif
        </div>
    </section>
</div>
