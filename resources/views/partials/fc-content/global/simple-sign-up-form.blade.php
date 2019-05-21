@php
    $actionDomain = App\getFormActionDomain() ?: 'my.freshbooks.com';
@endphp

<form class="inline-form" id="inline-form" action="https://{!! $actionDomain !!}/service/auth/api/v1/smux/registrations">
    <div class="fieldset fieldset-email">
        <input required id="inline_email_hero" type="email" name="email" placeholder=" " pattern="^([^\x00-\x20\x22\x28\x29\x2c\x2e\x3a-\x3c\x3e\x40\x5b-\x5d\x7f-\xff]+|\x22([^\x0d\x22\x5c\x80-\xff]|\x5c[\x00-\x7f])*\x22)(\x2e([^\x00-\x20\x22\x28\x29\x2c\x2e\x3a-\x3c\x3e\x40\x5b-\x5d\x7f-\xff]+|\x22([^\x0d\x22\x5c\x80-\xff]|\x5c[\x00-\x7f])*\x22))*\x40([^\x00-\x20\x22\x28\x29\x2c\x2e\x3a-\x3c\x3e\x40\x5b-\x5d\x7f-\xff]+|\x5b([^\x0d\x5b-\x5d\x80-\xff]|\x5c[\x00-\x7f])*\x5d)(\x2e([^\x00-\x20\x22\x28\x29\x2c\x2e\x3a-\x3c\x3e\x40\x5b-\x5d\x7f-\xff]+|\x5b([^\x0d\x5b-\x5d\x80-\xff]|\x5c[\x00-\x7f])*\x5d))*(\.\w{2,})+$" autocomplete="email">
        <label for="inline_email_hero">Enter Your Email</label>
        <div class="error-state">
            <div class="error-message client-message">Please fill out this field</div>
            <div class="error-message server-message"></div>
        </div>
    </div>
    <div class="fieldset fieldset-password">
        <input required id="inline_password_hero" type="password" name="password" placeholder=" " minlength="8" autocomplete="new-password">
        <label for="inline_password_hero"><p class="hide-mobile">Create a </p>Password (Min. 8 Characters)</label>
        <div class="error-state">
            <div class="error-message client-message">Password is invalid.</div>
            <div class="error-message server-message"></div>
        </div>
    </div>
    <button id="signup-cta" type="submit" class="primary-cta">
        Try It Free
    </button>
</form>
