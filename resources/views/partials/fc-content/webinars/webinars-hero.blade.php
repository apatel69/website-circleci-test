<div class="container no-side-pad">
  <div class="webinars-cta">
    <div class="webinars-intro">
      <div class="intro-text">
        @if(get_sub_field('title'))
          <h1>{{get_sub_field('title')}}</h1>
        @endif
        {!!get_sub_field('description')!!}
      </div>
      @if(get_sub_field('image'))
        <div class="intro-img">
          @include('partials.components.global-image',['img' => get_sub_field('image')])
        </div>
      @endif
    </div>

    <div class="webinars-signup">
      <div class="signup-info">
        @if(get_sub_field('webinar_signup_title'))
          <h2>{!!get_sub_field('webinar_signup_title')!!}</h2>
        @endif
        @if(get_sub_field('webinar_signup_arrow_image'))
          @include('partials.components.global-image',['img'=> get_sub_field('webinar_signup_arrow_image')])
        @endif
        {!!get_sub_field('webinar_signup_description')!!}
      </div>
      
      @include('partials.fc-content.webinars.upcoming-webinars')
      
    </div>
  </div>
</div>  