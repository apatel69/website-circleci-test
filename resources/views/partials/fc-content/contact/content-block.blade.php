<div class="container column-parent">
	<div class="contact-column">
		<section>
			{!! get_sub_field('content') !!}
		</section>
		<section>
			<address>
				<div class="address vcard adr">
					{!! get_sub_field('address') !!}
				</div>
				<div class="number-office">
					<div class="number">
						{!! get_sub_field('contact_information') !!}
					</div>
					<div class="office">
						{!! get_sub_field('office_hours_info') !!}
						It is currently <span id="curTime" style="font-weight: bold; font-style: italic;"></span> in Toronto.
					</div>
				</div>
			</address>
        </section>

        <section class="thank-you-msg">
            {!! get_field('form_thank_you_text', 'option') !!}
        </section>

        <section class="error-msg">
            {!! get_field('form_error_message_text', 'option') !!}
        </section>
        
        <section>
            <div class="contact-form">
                <h2>Contact Form</h2>
                <p class="req">(* required)</p>

                <div class="form-container">
                    <form action="" method="POST" id="contact-form">
                    <div class="fieldset">
                        <label for="name">Name <span class="req">*</span></label>
                        <input name="name" type="text" id="name" value="" data-req size="30" maxlength="50" class='form-input' placeholder="Name" />
                        <div class="error">
                            <span>Your name is required</span>
                        </div>
                    </div>

                    <div class="fieldset">
                        <label for="email">Email <span class="req">*</span></label>
                        <input name="email" type="email" id="email" value="" data-req size="30" maxlength="100" class='form-input' placeholder="Email" />
                        <div class="error">
                            <span>Your Email is required</span>
                        </div>
                        <div class="error-invalid-email">
                            <span>Invalid Email address</span>
                        </div>
                    </div>

                    <div class="fieldset">
                        <label for="company">Organization</label>
                        <input name="company" type="text" id="company" value="" size="30" maxlength="100" class='form-input' placeholder="Organization" />
                    </div>

                    <div class="fieldset">
                        <label for="comment">Comment/inquiry <span class="req">*</span></label>
                        <textarea name="comment" placeholder="Hey there, FreshBooks&#33;" id="comment" data-req rows="5" cols="41"></textarea>
                        <div class="error">
                            <span>Comment/Inquiry is required</span>
                        </div>
                    </div>

                    <?php wp_nonce_field('submit_contact_form', '_wpnonce_contact'); ?>

                    <?php $site_key = sanitize_text_field(get_field('google_recaptcha_keys', 'option')['site_key']) ?>

                    <div class="fieldset">
                        <div class="g-recaptcha" data-sitekey="{{$site_key}}"></div>
                    </div>
                
                    <button type="submit" class="primary-cta formsubmit">Send Feedback</button>
                </form>
             </div>
            </div>
        </section>
    </div>
                
    @if (have_rows('sidebar_boxes'))
    <div class="contact-column">
        <section>
            <div class="card-container">
                @while (have_rows('sidebar_boxes')) @php (the_row())
                    <div class="card">
                        <div class="single-side-card">
                            <div class="color {{ get_sub_field('border_color') }}"></div>
                            <div class="card-content">
                                @if (get_sub_field('box_title'))
                                    <h3>{{ get_sub_field('box_title') }}</h3>
                                @endif
                                {!! get_sub_field('box_content') !!}
                            </div>
                        </div>
                    </div>
                @endwhile
            </div>
        </section>
    </div>
    @endif
</div>