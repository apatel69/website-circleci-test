<div class="progressiveRevealForm">
    <div class="progressiveRevealForm-content">
        <h3>{{ get_sub_field('form_header') }}</h3>
        <span>{{ get_sub_field('form_subheader') }}</span>
        @include('partials/fc-content/global/simple-sign-up-form')
    </div>
    <div class="progressiveRevealForm-miceType">
        <p class="mice-type">
            <small>By continuing, you agree to the <a href="/policies/terms-of-service" target="blank">Terms of Service</a>.</small>
            <small class="security">
                <img class="security-icon" src='data:image/svg+xml;utf8,<svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 10 12" width="10px" height="12px"><defs><style>.a{fill:%238495a2;}</style></defs><title>lock_2</title><path class="a" d="M7.18,5.45V3.82a2.18,2.18,0,0,0-4.36,0V5.45Zm2.73,5.73a.82.82,0,0,1-.82.82H.91a.82.82,0,0,1-.82-.82V6.27a.82.82,0,0,1,.82-.82h.27V3.82a3.82,3.82,0,0,1,7.64,0V5.45h.27a.82.82,0,0,1,.82.82Z"/></svg>'>
                <a href="https://www.freshbooks.com/policies/security-safeguards" target="blank">Security Safeguards</a>
            </small>
        </p>
    </div>
    @if (get_sub_field('include_recommendation'))
        @include('partials.components.global-image', ['classes' => 'recommend-image', 'img' => get_sub_field('recommendation_image')])
    @endif
</div>

<div class="progressiveRevealForm-successMessage hidden">
    <div class="progressiveRevealForm-successMessage-content">
        @include('partials.components.global-image', ['classes' => 'confirmation-image', 'img' => get_sub_field('confirmation_image')])
        <h4 class="confirmation-header">{{ get_sub_field('confirmation_header') }}</h4>
        <p class="confirmation-body">{!! get_sub_field('confirmation_body') !!}</p>
        <button type="button" name="button" class="btn-ghost-select btn-continue">
            {{ get_sub_field('confirmation_cta') ?: 'Continue' }}
        </button>
    </div>
</div>
