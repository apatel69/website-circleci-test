@if(get_sub_field('background_image'))
  @php($bg_img = get_sub_field('background_image'))
@endif

<div class="container hero bg-img " {!! isset($bg_img) ? 'style="background-image: url('. $bg_img .');"' : '' !!}>
	<section id="cpy-hero">
		<div class="content">
      @if(get_sub_field('title'))
        <h1>{{get_sub_field('title')}}</h1>
      @endif
      {!!get_sub_field('description')!!}
      @if(get_sub_field('contact_details_title'))
        <strong>
          <p class="contact-details-title">
          {{get_sub_field('contact_details_title')}}
          </p>
        </strong>
      @endif
    <div class="contact-details">
      @if(get_sub_field('phone_number'))
        <a>
          <span class="phone">{{get_sub_field('phone_number')}}</span>
        </a>
      @endif
      @if(get_sub_field('email'))
        <a href="mailto:{{get_sub_field('email')}}">
          <span class="email">{{get_sub_field('email')}}</span>
        </a>
      @endif
		</div>
	</div>
	</section>
</div>