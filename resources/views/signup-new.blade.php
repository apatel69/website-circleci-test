{{--
Template Name: Signup (New)
--}}

@php
    parse_str($_SERVER['QUERY_STRING'], $query_string);
    $trialLength = get_field('trial_length') ? get_field('trial_length') : 30;
    $trialAttr = 'data-tl="' . $trialLength . '"';
    $abobeInsightsTrackingElement = isset($abobeInsightsTrackingElement) ? $abobeInsightsTrackingElement : '';
    $adobeInsightsExitLink = isset($adobeInsightsExitLink) ? $adobeInsightsExitLink : '';
    $actionDomain = App\getFormActionDomain() ?: 'my.freshbooks.com';
@endphp

@extends('layouts.app')

@section('content')

<div class="signupContent">
    <div class="signup-row">

        <div class="signupContainer">

            <div class="logo"></div>

            <div class="header">
                <h2>Try FreshBooks Free</h2>
                <p>No credit card required. Cancel anytime.</p>
            </div>

            @if (get_field('form_error_message', 'option'))
                <div class="errorGeneral">{{ get_field('form_error_message', 'option') }}</div>
            @endif

            <form id="signupForm" class="signupForm" method="post" action="https://{!! $actionDomain !!}/service/auth/api/v1/smux/registrations" {!! $trialAttr !!} novalidate>
                <input type="hidden" name="partner[package]" value="" id="uuid-populated-by-cookie">

                <div class="formElement fieldset fieldset-email">
                    <input type="text" name="email" placeholder="Email" maxlength="50" class="form-input input-email" autocomplete="email" required>
                    @if (get_field('invalid_email_error_message', 'option'))
                        <div class="formError error-email errorState">
                            <div class="errorMessage clientMessage">
                                {{ get_field('invalid_email_error_message', 'option') }}
                            </div>
                            <div class="errorMessage serverMessage"></div>
                        </div>
                    @endif
                </div>

                <div class="formElement fieldset fieldset-password">
                    <input type="password" name="password" placeholder="Password (min. 8 characters)" class="form-input input-password" autocomplete="new-password" required>
                    @if (get_field('invalid_password_error_message', 'option'))
                        <div class="formError error-password errorState">
                            <div class="errorMessage clientMessage">
                                {{ get_field('invalid_password_error_message', 'option') }}
                            </div>
                            <div class="errorMessage serverMessage"></div>
                        </div>
                    @endif
                </div>

                <button type="submit" name="submit" class="buttonPrimary">
                    <span class="buttonPrimary-text">Get Started</span>
                </button>
            </form>

            <p class="buttonSubtext">By continuing, you agree to the <a href="/policies/terms-of-service" target="_blank">Terms of Service</a>.</p>

            <div class="accountLinks">
                <p class="signup-text textRow">Already have an account? <a class="signup-link" href="https://secure.freshbooks.com/login">Log In</a></p>
            </div>

        </div>

        <div class="signupFooter">
            <img class="securityIcon" src='data:image/svg+xml;utf8,<svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 10 12" width="10px" height="12px"><path fill="%23b6daf5" class="a" d="M7.18,5.45V3.82a2.18,2.18,0,0,0-4.36,0V5.45Zm2.73,5.73a.82.82,0,0,1-.82.82H.91a.82.82,0,0,1-.82-.82V6.27a.82.82,0,0,1,.82-.82h.27V3.82a3.82,3.82,0,0,1,7.64,0V5.45h.27a.82.82,0,0,1,.82.82Z"/></svg>'>
            <a target="_blank" href="/policies/security-safeguards">Security Safeguards</a>
        </div>

    </div>
</div>
@endsection
