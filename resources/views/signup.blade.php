{{--
Template Name: Signup (Classic)
--}}

@php
    parse_str($_SERVER['QUERY_STRING'], $query_string);
@endphp

@extends('layouts.app')

@section('content')
<div class="header-frame header-blue">
    <div class="header-banner hide-tablet">
        <!-- Control phone banner -->
        <div class="banner-phone display-control">{!! get_field('classic_phone_banner_text', 'option') !!}</div>
    </div>
    <div class="responsive-header">
        <div class="header-wrapper">
            <a class="freshbooks-logo" href="/">
                @if (get_field('override_classic_logo') && get_field('custom_classic_logo'))
                    @include('partials.components.global-image', ['img' => get_field('custom_classic_logo')])
                @else
                    @include('partials.components.global-image', ['img' => get_field('classic_logo', 'option')])
                @endif
                <span class="a11y-hidden u-a11y-hidden">FreshBooks</span>
            </a>
        </div>
    </div>
</div>

<div class="classic-sign-up-content {{ isset($query_string['conflict']) ? 'hide-signup' : 'hide-confirm' }}">

    <div class="signup-content">
        <h1>Try FreshBooks Free</h1>
        <h2>No credit card required. Cancel anytime.</h2>
    </div>
    <div class="confirm-content">
        <h1>Hello Again</h1>
        <h2>That <span class="conflict-copy">email address already exists</span>. </br>Do you want to log in to your existing account?</h2>
    </div>

    <form name="form" novalidate action="https://secure.freshbooks.com/external/subscribe/view" method="post" class="subscribe-form signup-content">
        <input name="partner[package]" type="hidden" value="" id="uuid-populated-by-cookie" />

        <div class="form-element">
            <input name="company" placeholder='Company Name' type="text" maxlength="50" class="input-company form-input" />
            <div class="error-company form-error"><span class="error"></span></div>
        </div>

        <div class="form-element">
            <input name="email" placeholder='Email Address' type="email" maxlength="50" class="input-email form-input" />
            <div class="error-email form-error"><span class="error"></span></div>
        </div>

        <button class="button-primary subscribe-button" type="submit">
            <span class="button-primary-text">Try It Free</span>
        </button>
    </form>

    <form action="https://secure.freshbooks.com/loginsearch" method="get" class="email-form confirm-content">
        <input name="email" type="hidden"/>
        <button class="button-primary email-login" type="button">
            <span class="button-primary-text">Login to my account</span>
        </button>
    </form>

    <form action="https://secure.freshbooks.com/external/subscribe/view" method="post" class="confirm-form confirm-content">
        <input name="partner[package]" type="hidden" value="" id="uuid-populated-by-cookie" />
        <input name="company" type="hidden"/>
        <input name="email" type="hidden"/>
        <a class="confirm-link" href="#create-account">Create a new account</a>
    </form>

    <div class="classic-sign-up-footer">
        <p class="signup-content">Already have an account? <a href="https://secure.freshbooks.com/loginsearch">Log in</a></p>
        <p><a href="/policies/security-safeguards" target="_blank" class="footer-link">Security Safeguards</a> | <a href="/policies/terms-of-service" target="_blank" class="footer-link">Terms of Service</a> | <a href="/policies/privacy" target="_blank" class="footer-link">Privacy Policy</a></p>
    </div>

</div>
@endsection
