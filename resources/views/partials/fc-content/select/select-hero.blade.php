@if(get_sub_field('hero_background_image'))
  @php($bg_img = get_sub_field('hero_background_image'))
@endif

<div class="container hero" {!! isset($bg_img) ? 'style="background-image: url('. $bg_img .');"' : '' !!}>
  <section id="cpy-hero">
    <div class="content">
      @if(get_sub_field('hero_title'))
        <h1>{{get_sub_field('hero_title')}}</h1>
      @endif
        {!!get_sub_field('hero_description')!!}
    </div>
    @if(get_sub_field('hero_cta'))
      <div class="cta-only"> 
        @include('partials.components.global-link', ['btn' => get_sub_field('hero_cta'), 'classes' => 'select-cta' ]) 
      </div>
    @endif 
  </section>
</div>

@if($bg_img)
  <div class="mobile-hero-img select-bg" {!! isset($bg_img) ? 'style="background-image:linear-gradient(#e5f4fe 0,rgba(255,255,255,0) 15%),url('. $bg_img .');"' : '' !!}></div>
@endif
