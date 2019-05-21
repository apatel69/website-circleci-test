<form name="form" novalidate action="https://secure.freshbooks.com/external/subscribe/view" method="post" class="subscribe-form">
    <input name="partner[package]" type="hidden" value="" id="uuid-populated-by-cookie" />

    <div class="form-element">
        <input name="company" placeholder="Company Name" type="text" maxlength="50" class="input-company form-input" />
        <div class="error-company form-error"><span class="error"></span></div>
    </div>

    <div class="form-element">
        <input name="email" placeholder="Email Address" type="email" maxlength="50" class="input-email form-input" />
        <div class="error-email form-error"><span class="error"></span></div>
    </div>

    @if (get_field('form_button_text'))
        <button class="button-primary subscribe-button" type="submit">
            <span class="button-primary-text">{{ get_field('form_button_text') }}</span>
        </button>
    @endif
</form>
