<div class="wide-cta">
    <div class="cta-wrap">
        @if (get_field('integrations_about_cta_text', 'option'))
            <p>{!! get_field('integrations_about_cta_text', 'option') !!}</p>
        @endif
        @include('partials.components.global-link', ['btn' => get_field('integrations_about_cta', 'option'), 'classes' => 'btn-primary'])
    </div>
</div>