@if(get_sub_field('hero_background_image'))
  @php($bg_desktop = get_sub_field('hero_background_image'))
@endif
@if(get_sub_field('hero_tablet_image'))
  @php($bg_tablet = get_sub_field('hero_tablet_image'))
@endif
@if(get_sub_field('hero_mobile_image'))
  @php($bg_mobile = get_sub_field('hero_mobile_image'))
@endif

<div class="container hero" {!! isset($bg_desktop) ? 'style="background-image: url('. $bg_desktop .');"' : '' !!}>
  <section id="cpy-hero">
    <div class="content">
      @if(get_sub_field('hero_title'))
        <h1>{!!get_sub_field('hero_title')!!}</h1>
      @endif
      @if(get_sub_field('hero_description'))
        {!!get_sub_field('hero_description')!!}
      @endif	
    </div>
    @if(get_sub_field('hero_cta'))
      <div class="cta-only"> 
        @include('partials.components.global-link', ['btn' => get_sub_field('hero_cta')]) 
      </div>
    @endif 
  </section>
</div>

@if(get_sub_field('hero_tablet_image'))
  <div class="mobile-hero-img" {!! isset($bg_tablet) ? 'style="background-image:linear-gradient(#fff 0,rgba(255,255,255,0) 15%),url('. $bg_tablet .');"' : '' !!}></div>
@endif

@if(get_sub_field('hero_mobile_image'))
  <div class="education-mobile-img" {!! isset($bg_mobile) ? 'style="background-image:linear-gradient(#fff 0,rgba(255,255,255,0) 15%),url('. $bg_mobile .');"' : '' !!}></div>
@endif
