<div class="hero-background">
    <!-- Email Sign-Up - start -->
    <section id="email-sign-up">
        @if (get_field('signup_form_title'))
            <h2 class='email-signup-title'>{{ get_field('signup_form_title') }}</h2>
        @endif
        @if (get_field('signup_form_title'))
            <p class='email-signup-info'>{{ get_field('signup_form_subtitle') }}</p>
        @endif
        @if (get_field('pardot_iframe_src'))
            <div class="email-signup-form">
                <div class="email-signup-form-container">
                    <iframe id="pardot" src="{{ get_field('pardot_iframe_src') }}" width="100%" style="width:100%;" type="text/html" scrolling="no" frameborder="0" allowtransparency="true"></iframe>
                </div>
            </div>
        @endif
    </section>
</div>