<div class="hero-img">
  <section class="cpy-hero">
    <div class="container">
      <div class="content">
        @if(get_sub_field('title'))
        <h1>{{get_sub_field('title')}}</h1>
        @endif
        {!!get_sub_field('description')!!}
      </div>
    </div>
  </section>
	<picture>
    @if(get_sub_field('hero_foreground_image_mobile'))
      <source class="foreground-img" media="(max-width: 480px)" srcset="{{ get_sub_field('hero_foreground_image_mobile')['global_image']['url'] }}">
    @endif
    @if(get_sub_field('hero_foreground_image'))
      @include('partials.components.global-image', ['img' => get_sub_field('hero_foreground_image'),'classes' => 'foreground-img' ])  
    @endif
  </picture>
  @if(get_sub_field('hero_background_image'))
    @include('partials.components.global-image', ['img' => get_sub_field('hero_background_image'),'classes' => 'background-img' ])
  @endif
</div>