<div class="form-landing-page-form-container">
    <div class="form-landing-page-form" id="web2lead-form">
        <form>

            <h2>Get Started Below and FreshBooks Will Be in Touch</h2>

            @if (get_field('web_2_lead_oid'))
                <input id="oid" type="hidden" name="oid" value="{{ get_field('web_2_lead_oid') }}">
            @endif
            @if (get_field('web_2_lead_record_type'))
                <input id="recordType" type="hidden" name="recordType" value='{{ get_field('web_2_lead_record_type') }}'>
            @endif
            @if (get_field('web_2_lead_source'))
                <input id="lead_source" type="hidden" name="lead_source" value="{{ get_field('web_2_lead_source') }}">
            @endif
            @if (get_field('web_2_lead_page_type'))
                {{-- page_type (Landing Page Type) --}}
                <input id="{{ get_field('web_2_lead_page_type')['web_2_lead_page_type_id'] }}" type="hidden" name="{{ get_field('web_2_lead_page_type')['web_2_lead_page_type_id'] }}" value="{{ get_field('web_2_lead_page_type')['web_2_lead_page_type_value'] }}">
            @endif
            @if (get_field('web_2_lead_campaign_id'))
                <input id="Campaign_ID" type="hidden" name="Campaign_ID" value="{{ get_field('web_2_lead_campaign_id') }}">
            @endif
            @if (get_field('web_2_lead_member_status'))
                {{-- Campaign Member Status --}}
                <input id="member_status" type="hidden" name="member_status" value="{{ get_field('web_2_lead_member_status') }}">
            @endif
            @if (get_field('web_2_lead_vendor_source'))
                {{-- vSource --}}
                <input id="{{ get_field('web_2_lead_vendor_source')['web_2_lead_vendor_source_id'] }}" type="hidden" name="{{ get_field('web_2_lead_vendor_source')['web_2_lead_vendor_source_id'] }}" value="{{ get_field('web_2_lead_vendor_source')['web_2_lead_vendor_source_value'] }}">
            @endif

            {{-- vInternal --}}
            @php
                $referred = strtolower(get_uri_param('refd')) == 'external' ? 'true' : 'false';
            @endphp

            <input id="{{ get_field('web_2_lead_vendor_internal_id') }}" type="hidden" name="{{ get_field('web_2_lead_vendor_internal_id') }}" value="{{ $referred }}">

            <input id="retURL" type="hidden" name="ret_url" value="https://www.freshbooks.com/">

            <div class="fieldset">
                <input type="text" id="first_name" name="first_name" placeholder="First Name">
                <div class="error">
                    <span>Your first name is required</span>
                </div>
            </div>

            <div class="fieldset">
                <input type="text" id="last_name" name="last_name" placeholder="Last Name">
                <div class="error">
                    <span>Your last name is required</span>
                </div>
            </div>

            <div class="fieldset">
                <input type="text" id="email" name="email" placeholder="Email">
                <div class="error">
                    <span>A valid email address is required</span>
                </div>
            </div>

            <div class="fieldset">
                <input type="text" id="company" name="company" placeholder="Company">
                <div class="error">
                    <span>Your company name is required</span>
                </div>
            </div>

            <div class="fieldset">
                <input type="text" id="phone" name="phone" placeholder="Phone">
                <div class="error">
                    <span>Your phone number is required</span>
                </div>
            </div>

            <button class="feedback-form-submit btn-primary primary-cta">Submit</button>
        </form>
    </div>


  <div class="feedback-form-success">
    <h2>Thanks!</h2>
    <p>Someone from FreshBooks will be in touch soon.</p>
  </div>
</div>
