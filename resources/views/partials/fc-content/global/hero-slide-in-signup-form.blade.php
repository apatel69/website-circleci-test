@php
    $default_trial_length = 30;
    $trial_length = !empty(get_field('trial_length')) ? get_field('trial_length') : $default_trial_length;
    $trial_length_data_attribute = 'data-tl="'.$trial_length.'"';
    $abobeInsightsTrackingElement = isset($abobeInsightsTrackingElement) ? $abobeInsightsTrackingElement : '';
    $adobeInsightsExitLink = isset($adobeInsightsExitLink) ? $adobeInsightsExitLink : '';
    $actionDomain = App\getFormActionDomain() ?: 'my.freshbooks.com';
@endphp

<script>
    (function() {var gs = document.createElement('script');gs.src = 'https://snippet.growsumo.com/growsumo.min.js';gs.type = 'text/javascript';gs.async = 'true';gs.onload = gs.onreadystatechange = function() {var rs = this.readyState;if (rs && rs != 'complete' && rs != 'loaded') return;try {growsumo._initialize('pk_90faa148c68d490d95f329abd0943230');if (typeof(growsumoInit) === 'function') {growsumoInit();}} catch (e) {}};var s = document.getElementsByTagName('script')[0];s.parentNode.insertBefore(gs, s);})();
</script>

<div id="slide-in-signup-modal" class="inline-form-hero slideInSignup__slideIn">
    <div class="slideInSignup__wrapper">
        <img src="@asset('images/icons/signup-close.svg')" id="signup-close" class="slideInSignup__close" alt="Close" />
        <div class="slideInSignup__slideIn">
            <img src="@asset('images/navigation/default-logo.svg')" alt="FreshBooks Cloud Accounting" class="slideInSignup__logo" />

            @if (get_field('slide_in_form_title', 'option'))
                <h2>{{ get_field('slide_in_form_title', 'option') }}</h2>
            @endif

            @if (get_field('slide_in_form_error_message', 'option'))
                <div class="error-general">{{ get_field('slide_in_form_error_message', 'option') }}</div>
            @endif

            <form class="inline-form-subtext-assurance" id="inline-form-hero" {!! $trial_length_data_attribute !!}  action="https://{!! $actionDomain !!}/service/auth/api/v1/smux/registrations">
                <div class="fieldset fieldset-email">
                <input required id="inline_email_hero" type="email" name="email" class="{{ $abobeInsightsTrackingElement }}" placeholder="{{ get_field('slide_in_email_field_label', 'option') }}" pattern="^([^\x00-\x20\x22\x28\x29\x2c\x2e\x3a-\x3c\x3e\x40\x5b-\x5d\x7f-\xff]+|\x22([^\x0d\x22\x5c\x80-\xff]|\x5c[\x00-\x7f])*\x22)(\x2e([^\x00-\x20\x22\x28\x29\x2c\x2e\x3a-\x3c\x3e\x40\x5b-\x5d\x7f-\xff]+|\x22([^\x0d\x22\x5c\x80-\xff]|\x5c[\x00-\x7f])*\x22))*\x40([^\x00-\x20\x22\x28\x29\x2c\x2e\x3a-\x3c\x3e\x40\x5b-\x5d\x7f-\xff]+|\x5b([^\x0d\x5b-\x5d\x80-\xff]|\x5c[\x00-\x7f])*\x5d)(\x2e([^\x00-\x20\x22\x28\x29\x2c\x2e\x3a-\x3c\x3e\x40\x5b-\x5d\x7f-\xff]+|\x5b([^\x0d\x5b-\x5d\x80-\xff]|\x5c[\x00-\x7f])*\x5d))*(\.\w{2,})+$" autocomplete="email">
                    @if (get_field('slide_in_invalid_email_error_message', 'option'))
                    <div class="error-state">
                        <div class="error-message client-message">{{ get_field('slide_in_invalid_email_error_message', 'option') }}</div>
                        <div class="error-message server-message"></div>
                    </div>
                    @endif
                </div>
                <div class="fieldset fieldset-password">
                    <input required id="inline_password_hero" type="password" name="password" placeholder="{{ get_field('slide_in_password_field_label', 'option') }}" minlength="8" autocomplete="new-password">
                    @if (get_field('slide_in_invalid_password_error_message', 'option'))
                        <div class="error-state">
                        <div class="error-message client-message">{{ get_field('slide_in_invalid_password_error_message', 'option') }}</div>
                        <div class="error-message server-message"></div>
                        </div>
                    @endif
                </div>
                <div class="cta-subtext">
                    <div class="submit-assurance">
                        <button id="signup-cta" type="submit" class="primary-cta {{ $adobeInsightsExitLink }}">
                            @if (get_field('slide_in_submit_button_text', 'option'))
                                <span>{{ get_field('slide_in_submit_button_text', 'option') }}</span>
                            @endif
                        </button>
                    </div>
                </div>
            </form>
        </div>

        <div class="slideInSignup__slideUpOne">
            @include('partials.fc-content.global.getapp')
        </div>

        @if (get_field('slide_in_testimonial_quote', 'option'))
            <div class="slideInSignup__testimonial slideInSignup__slideUpTwo">
                @if (get_field('slide_in_testimonial_image', 'option'))
                    @include('partials.components.global-image', ['img' => get_field('slide_in_testimonial_image', 'option') ])
                @endif
                <div>
                    <q>{{ get_field('slide_in_testimonial_quote', 'option') }}</q>
                    @if (get_field('slide_in_testimonial_quote_name', 'option'))
                        <p class="slideInSignup__testimonialName">{{ get_field('slide_in_testimonial_quote_name', 'option') }}</p>
                    @endif
                    @if (get_field('slide_in_testimonial_job_title', 'option'))
                        <p class="slideInSignup__testimonialJob">{{ get_field('slide_in_testimonial_job_title', 'option') }}</p>
                    @endif
                </div>
            </div>
        @endif

        <div class="slideInSignup__footer">
            <div class="slideInSignup__slideIn">
                {!! get_field('slide_in_form_subtext', 'option') !!}
            </div>
        </div>
    </div>
</div>
