<div class="container midnight-blue-background" id="reseller-form">
    <section class="reseller-program-enrollment">
      <div class="programs-details column-parent">
        <form class="program-enrollment-form">
          <input type=hidden name="oid" value="00D40000000IZkW">
          <input type=hidden name="retURL" value="https://www.freshbooks.com/holiday-thank-you">
          <input type=hidden id="lead_source" name="lead_source" value="Reseller Page Form">
          <input type=hidden id="recordType" name="recordType" value="01233000000QNpX">
          <input type=hidden id="company" name="company" value="unknown">
          <input type=hidden id="00N33000002wSs9" name="00N33000002wSs9" value="RES Lead">

          @if(get_sub_field('form_title'))
            <h2 class="partner-form-title"> {{get_sub_field('form_title')}}</h2>
          @endif

          {!! get_sub_field('form_description') !!}

          <div class="form-fields">
            <div class="form-field">
              <input type="text" id="first_name" name="first_name" placeholder="First Name">
              <div class="error">
                <span>Your first name is required</span>
              </div>
            </div>
  
            <div class="form-field">
              <input type="text" id="last_name" name="last_name" placeholder="Last Name">
              <div class="error">
                <span>Your last name is required</span>
              </div>
            </div>
  
            <div class="two-form-fields column-parent">
              <div class="form-field">
                <input type="text" id="email" name="email" placeholder="Work Email">
                <div class="error">
                  <span>Your work email is required</span>
                </div>
              </div>
  
              <div class="form-field">
                <input type="text" id="phone" name="phone" placeholder="Phone">
                <div class="error">
                  <span>Your phone number is required</span>
                </div>
              </div>
            </div>
  
            <div class="form-field">
              <textarea placeholder="Message" id="00N33000002wSpo" name="00N33000002wSpo"></textarea>
            </div>
          </div>
          <button class="primary-cta reseller-program-submit">Get Started Today</button>
        </form>

        {{--  Form Affiliate and Reseller Details  --}}
        <div class="program-detail program-enrollment">
              <div class="affiliate-details"> 
                @php($sidebar = get_sub_field('form_sidebar_details'))
                    @if ($sidebar['title'])
                        <h3>{{ $sidebar['title'] }}</h3>
                    @endif
                  
                    <div class="affiliate-prices">
                        <div class="affiliate-price">
                            @if($sidebar['supertext'])
                                <h4 class="affiliate-price-text">{{ $sidebar['supertext'] }}</h4>
                            @endif
                            @if($sidebar['amount'])
                                <span class="affiliate-price-cost">{{ $sidebar['amount'] }}</span>
                            @endif
                            @if($sidebar['subtext'])
                                <span class="affiliate-price-length">{!! $sidebar['subtext'] !!}</span>
                            @endif
                        </div>
                    </div>
              </div>
              <hr class="seperator">
        </div>
      </div>
    </section>
  
    <section class="success-state">
      @if(get_sub_field('form_thankyou_image'))
        @include('partials.components.global-image',['img' => get_sub_field('form_thankyou_image'), 'classes' => 'checkmark'])
      @endif
      @if(get_sub_field('form_thankyou_message'))
        <h2>{{get_sub_field('form_thankyou_message')}}</h2>
      @endif
      {!!get_sub_field('form_thankyou_subtext')!!}
    </section>
  </div>