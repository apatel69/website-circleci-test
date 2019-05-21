<div>
  <section class="cta-full-width container">
    @if(get_sub_field('title'))
      <h2 class="cta-heading">
        {{get_sub_field('title')}}
      </h2>
    @endif
    @if(get_sub_field('description'))
      <p>{{get_sub_field('description')}}</p>
    @endif
    @if(get_sub_field('email_us_text') && get_sub_field('email_us_cta'))
      <a href="mailto:{{get_sub_field('email_us_cta')}}?subject={{get_sub_field('email_us_subject')}}" class="primary-cta extra-padding">
        {{get_sub_field('email_us_text')}}
      </a>
    @endif
  </section>
</div>