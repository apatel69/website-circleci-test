@if(get_sub_field('desktop_image'))
  @php ($bg_img_desktop = get_sub_field('desktop_image'))
@endif
@if(get_sub_field('tablet_image'))
  @php ($bg_img_tablet = get_sub_field('tablet_image'))
@endif
@if(get_sub_field('mobile_image'))
  @php ($bg_img_mobile = get_sub_field('mobile_image'))
@endif

<div class="container hero hero-left  bg-img" style="background-image:url('{{isset($bg_img_desktop)?$bg_img_desktop:''}}')">
  <section id="cpy-hero">
    <div class="content">
      @if(get_sub_field('title'))
        <h1>{{get_sub_field('title')}}</h1>
      @endif
      {!!get_sub_field('description')!!}
    </div>
    @if(get_sub_field('cta'))
      <div class="cta-only">
        @include('partials.components.global-link',['btn' => get_sub_field('cta')])
      </div>
    @endif
  </section>
</div>
@if($bg_img_tablet)
  <div class="mobile-hero-img reseller-tablet" style="background-image:linear-gradient(#fff 0,rgba(255, 255, 255, 0) 15%),url('{{isset($bg_img_tablet)?$bg_img_tablet:''}}')"></div>
@endif
@if($bg_img_mobile)
  <div class="mobile-hero-img reseller-mobile" style="background-image:linear-gradient(#fff 0,rgba(255, 255, 255, 0) 15%),url('{{isset($bg_img_mobile)?$bg_img_mobile:''}}')"></div>
@endif