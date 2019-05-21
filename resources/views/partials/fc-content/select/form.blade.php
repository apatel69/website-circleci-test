@php
$queryStringParams = $_SERVER['QUERY_STRING'];
parse_str($queryStringParams, $selectFormParameters);
$adgroupid = isset($selectFormParameters['adgroupid']) ? $selectFormParameters['adgroupid'] : "";
$targetid = isset($selectFormParameters['targetid']) ? $selectFormParameters['targetid'] : "";
$crid = isset($selectFormParameters['crid']) ? $selectFormParameters['crid'] : "";
$dv = isset($selectFormParameters['dv']) ? $selectFormParameters['dv'] : "";
$ntwk = isset($selectFormParameters['ntwk']) ? $selectFormParameters['ntwk'] : "";
$source = isset($selectFormParameters['source']) ? $selectFormParameters['ntwk'] : "";
$gclid = isset($selectFormParameters['gclid']) ? $selectFormParameters['gclid'] : "";
$campaignid = isset($selectFormParameters['campaignid']) ? $selectFormParameters['campaignid'] : "";
$utm_source = isset($selectFormParameters['utm_source']) ? $selectFormParameters['utm_source'] : "";
$utm_medium = isset($selectFormParameters['utm_medium']) ? $selectFormParameters['utm_medium']: "";
$utm_term = isset($selectFormParameters['utm_term']) ? $selectFormParameters['utm_term'] : "";
$utm_campaign = isset($selectFormParameters['utm_campaign']) ? $selectFormParameters['utm_campaign'] : "";
$utm_content = isset($selectFormParameters['utm_content']) ? $selectFormParameters['utm_content'] : "";
@endphp

<div id="select-web-to-lead-form" class="select-form-container">
    <div class="select-form-block">
        <form class="select-form" id="select-form">
            <h2>{{ get_sub_field('form')['form_title'] }}</h2>
            @if (get_sub_field('form')['form_description'])
                <p class="description">{{ get_sub_field('form')['form_description'] }}</p>
            @endif

            @if (get_sub_field('form')['form_content'] == 'signup')
                @include('partials.fc-content.select.form-content.signup')
            @elseif (get_sub_field('form')['form_content'] == 'representative')
                @include('partials.fc-content.select.form-content.representative')
            @endif

            <div class="fieldset">
                <button id="web_to_lead_submit" type="submit" name="button" class="btn-select btn-form select-submit">
                    {{ get_sub_field('form')['button_text'] }}
                </button>
                <div class="form-subtext-container">
                    <span class="form-subtext">By continuing, you agree to the <a href="/policies/terms-of-service">Terms of Service</a>.</span>
                    <br>
                    <span class="form-subtext">
                        <img class="icon" src="@asset('images/icons/security-lock.svg')" alt="icon">
                        <a href="/policies/security-safeguards">Security Safeguards</a>
                    </span>
                </div>
            </div>

        </form>
    </div>
</div>

<div class="success-state success-modal">
    <!--
    Start of Floodlight Tag: Please do not remove
    Activity name of this tag: Form Submission
    URL of the webpage where the tag is expected to be placed: https://www.freshbooks.com
    This tag must be placed between the <body> and </body> tags, as close as possible to the opening tag.
    Creation Date: 12/13/2018
    -->
    <iframe id="floodlight" src="" width="1" height="1" frameborder="0" style="display:none"></iframe>
    <!-- End of Floodlight Tag: Please do not remove -->
    <iframe id="ttd" width="0" height="0" name="Trade Desk Tracking - Form Submission" frameborder="0" scrolling="no" src=""></iframe>
    <img id="lipixel" class="lazy" height="1" width="1" style="display:none;" alt="" src="" />
    <div class="success-modal-content">
        <div class="success-modal-close btn">
            &times;
        </div>
        <div class="success-modal-checkMark">
        </div>
        <h3>Thank you for getting in touch, an<br/>
        Account Manager will get back to you soon.
        </h3>
        <p>
            Don&apos;t want to wait?<br/>
            Give us a call at: 1.833.333.1128
        </p>
        <p class="success-modal-close">
            Close window
        </p>
    </div>
</div>

<script type="text/javascript">
    function setLanding() {
        var landingURL = readCookie('fb_landing_url');
        if (landingURL && landingURL.length > 0) {
            document.getElementById("00N0b00000BT2PZ").value = landingURL;
        }
    }

    window.addEventListener("load", setLanding, false);
</script>
