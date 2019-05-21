@php
    $custom_button_text = isset($signup_button_text) ? $signup_button_text : false;
    if (!empty(get_field('trial_length'))) {
        $trial_length = get_field('trial_length');
    } elseif (!empty(get_sub_field('trial_length'))) {
        $trial_length = get_sub_field('trial_length');
    } elseif (!empty(get_field('lpat_trial_length'))) {
        $trial_length = get_field('lpat_trial_length');
    } else {
        $trial_length = 30;
    }
    $trial_length_data_attribute = 'data-tl="'.$trial_length.'"';

    $abobeInsightsTrackingElement = isset($abobeInsightsTrackingElement) ? $abobeInsightsTrackingElement : '';
    $adobeInsightsExitLink = isset($adobeInsightsExitLink) ? $adobeInsightsExitLink : '';
    $actionDomain = App\getFormActionDomain() ?: 'my.freshbooks.com';
@endphp

<script>
    (function() {var gs = document.createElement('script');gs.src = 'https://snippet.growsumo.com/growsumo.min.js';gs.type = 'text/javascript';gs.async = 'true';gs.onload = gs.onreadystatechange = function() {var rs = this.readyState;if (rs && rs != 'complete' && rs != 'loaded') return;try {growsumo._initialize('pk_90faa148c68d490d95f329abd0943230');if (typeof(growsumoInit) === 'function') {growsumoInit();}} catch (e) {}};var s = document.getElementsByTagName('script')[0];s.parentNode.insertBefore(gs, s);})();
</script>

<div class="inline-form-hero">
    @if (get_field('form_error_message', 'option'))
        <div class="error-general">{{ get_field('form_error_message', 'option') }}</div>
    @endif

    <form class="inline-form-subtext-assurance" id="inline-form-hero" {!! $trial_length_data_attribute !!}  action="https://{!! $actionDomain !!}/service/auth/api/v1/smux/registrations">
        @if (get_sub_field('cta_side_image')['enable_side_image'])
            <div class="cta-side-mobile">
                @include('partials.components.global-image', ['img' => get_sub_field('cta_side_image')['side_image'], 'caption' => get_sub_field('cta_side_image')['caption']])
            </div>
        @endif
        <div class="fieldset fieldset-email">
        <input required id="inline_email_hero" type="email" name="email" class="{{ $abobeInsightsTrackingElement }}" placeholder=" " pattern="^([^\x00-\x20\x22\x28\x29\x2c\x2e\x3a-\x3c\x3e\x40\x5b-\x5d\x7f-\xff]+|\x22([^\x0d\x22\x5c\x80-\xff]|\x5c[\x00-\x7f])*\x22)(\x2e([^\x00-\x20\x22\x28\x29\x2c\x2e\x3a-\x3c\x3e\x40\x5b-\x5d\x7f-\xff]+|\x22([^\x0d\x22\x5c\x80-\xff]|\x5c[\x00-\x7f])*\x22))*\x40([^\x00-\x20\x22\x28\x29\x2c\x2e\x3a-\x3c\x3e\x40\x5b-\x5d\x7f-\xff]+|\x5b([^\x0d\x5b-\x5d\x80-\xff]|\x5c[\x00-\x7f])*\x5d)(\x2e([^\x00-\x20\x22\x28\x29\x2c\x2e\x3a-\x3c\x3e\x40\x5b-\x5d\x7f-\xff]+|\x5b([^\x0d\x5b-\x5d\x80-\xff]|\x5c[\x00-\x7f])*\x5d))*(\.\w{2,})+$" autocomplete="email">
            @if (get_field('email_field_label', 'option'))
                <label for="inline_email_hero">{{ get_field('email_field_label', 'option') }}</label>
            @endif
            @if (get_field('invalid_email_error_message', 'option'))
            <div class="error-state">
                <div class="error-message client-message">{{ get_field('invalid_email_error_message', 'option') }}</div>
                <div class="error-message server-message"></div>
            </div>
            @endif
        </div>
        <div class="fieldset fieldset-password">
            <input required id="inline_password_hero" type="password" name="password" placeholder=" " minlength="8" autocomplete="new-password">
            @if (get_field('password_field_label', 'option'))
                <label for="inline_password_hero">{{ get_field('password_field_label', 'option') }}</label>
            @endif
            @if (get_field('invalid_password_error_message', 'option'))
                <div class="error-state">
                <div class="error-message client-message">{{ get_field('invalid_password_error_message', 'option') }}</div>
                <div class="error-message server-message"></div>
                </div>
            @endif
        </div>
        <div class="cta-subtext">
            <div class="submit-assurance">
                <button id="signup-cta" type="submit" class="primary-cta {{ $adobeInsightsExitLink }}">
                    @if ($custom_button_text || get_field('submit_button_text', 'option'))
                        <span>{{ $custom_button_text ?: get_field('submit_button_text', 'option') }}</span>
                    @endif
                </button>
                @if (get_sub_field('cta_side_image')['enable_side_image'])
                    <div class="side-image-container">
                        @if (get_sub_field('cta_side_image')['caption'])
                            <p class="side-image-caption">
                                @include('partials.components.global-image', ['img' => get_sub_field('cta_side_image')['side_image'], 'caption' => get_sub_field('cta_side_image')['caption']])
                            </p>
                        @else
                            @include('partials.components.global-image', ['img' => get_sub_field('cta_side_image')['side_image']])
                        @endif
                    </div>
                @elseif (get_field('form_side_image', 'option'))
                    @include('partials.components.global-image', ['img' => get_field('form_side_image', 'option')])
                @endif
            </div>
            {!! get_field('form_subtext', 'option') !!}
        </div>
    </form>
</div>
