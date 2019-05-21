@php
$title = get_field('education_support_title','options');
$description = get_field('education_support_description','options');
$contact_us_title = get_field('education_contact_us_title','options');
$phone = get_field('education_support_phone','options');
$email = get_field('education_support_email','options');
$image_desktop = get_field('education_support_image_desktop','options');
$image_mobile = get_field('education_support_image_mobile','options');
@endphp

<div class="container">
  <section class="lpat-support-section">
    @if($title)
      <h2>{{ $title }}</h2>
    @endif
    @if($description)
    <div class="lpat-support-section__description">
      {!!$description!!}
    </div>
    @endif
    <div class="contact-details">
      @if($contact_us_title)
        <p class="lpat-support-section__contact-us-title">{{ $contact_us_title }}</p>
      @endif
      @if($phone)
        <p class="lpat-support-section__phone"><a><span class="phone">{{ $phone }}</span></a></p>
      @endif
      @if($email)
        <p class="lpat-support-section__email"><a href="mailto:{{ $email }}"><span class="email">{{ $email }}</span></a></p>
      @endif
      @if($image_desktop)
        @include('partials.components.global-image', ['img' => $image_desktop, 'classes' => 'content-img lpat-support-section__image-desktop'])
      @endif
      @if($image_mobile)
        @include('partials.components.global-image', ['img' => $image_mobile, 'classes' => 'content-img lpat-support-section__image-mobile'])
      @endif
    </div>
  </section>
</div>