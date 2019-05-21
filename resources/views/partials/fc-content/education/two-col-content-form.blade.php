<div class="container">
	<section>
		<div class="column-parent education-details">
			<div class="education-detail" id="class-modules">
				<div class="education-detail-info">
          @if(get_sub_field('title'))
            <h2>{!!get_sub_field('title')!!}</h2>
          @endif

          {!!get_sub_field('description')!!}
          @if(get_sub_field('four_modules_title'))
            <p><strong>{{get_sub_field('four_modules_title')}}</strong></p>
          @endif
        </div>
        @if(have_rows('modules_list'))
        @while(have_rows('modules_list')) @php(the_row())
        <div class="education-module column-parent">
          @if(get_sub_field('module_image'))
            <div class="education-module-iconography">
                @include('partials.components.global-image', ['img' => get_sub_field('module_image') ])
            </div>
          @endif
          <div class="education-module-details">
            @if(get_sub_field('module_title'))
              <h3>{{get_sub_field('module_title')}}</h3>
            @endif
            {!!get_sub_field('module_description')!!}
            @if (get_sub_field('module_link'))
              @include('partials.components.global-link', ['btn' => get_sub_field('module_link'),'classes' => 'education-link'])
            @endif
          </div>
          
        </div>
        @endwhile
        @endif
			</div>
      <div class="education-enrollment" id="education-enrollment" data-scroll-offset="35">
        @if(get_sub_field('form_image'))
          @include('partials.components.global-image', ['img' => get_sub_field('form_image'),'classes' => 'its-free' ])
        @endif
        <div class="education-enrollment-form">
          @if(get_sub_field('form_title'))
            <h2>{{get_sub_field('form_title')}}</h2>
          @endif
					{!!get_sub_field('form_description')!!}
					<form>
						<input type="hidden" name="oid" value="00D40000000IZkW">
						<input type="hidden" name="retURL" value="https://www.freshbooks.com/">
						<input type="hidden" id="lead_source" name="lead_source" value="Landing Page Form">
						<input type="hidden" id="recordType" name="recordType" value="012330000005hTh">
            <input type="hidden" id="00N33000002wSs9" name="00N33000002wSs9" value="EDU">
            
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
							<input type="text" id="phone" name="phone" placeholder="Phone">
							<div class="error">
								<span>Your phone number is required</span>
							</div>
						</div>

						<div class="fieldset">
							<input type="text" id="company" name="company" placeholder="School">
							<div class="error">
								<span>The name of your school is required</span>
							</div>
						</div>
            <button class="education-submit primary-cta">Get FreshBooks for Education</button>
					</form>
				</div>

        <div class="education-enrollment-form-success">
          @if(get_sub_field('form_thankyou_title'))
          <h2>{{get_sub_field('form_thankyou_title')}}</h2>
          @endif
          {!!get_sub_field('form_thankyou_description')!!}
          @if (get_sub_field('form_download_now_cta'))
            <div class="text-center">
              @include('partials.components.global-link', ['btn' => get_sub_field('form_download_now_cta'),'classes' => 'extra-padding'])
            </div>
          @endif
				</div>
			</div>
		</div>
	</section>
</div>