@php
    // Make the variables work for the original or clones containing appended field names
    $desktop_bg_img_url = get_field('page_hero')['desktop_hero_background_image']['global_image']['url'];
    $retina_desktop_bg_img_url = get_field('page_hero')['desktop_hero_background_image']['global_retina_image']['url']? get_field('page_hero')['desktop_hero_background_image']['global_retina_image']['url']: $desktop_bg_img_url;
    $mobile_bg_img_url = get_field('page_hero')['tabletmobile_background_image']['global_image']['url']? get_field('page_hero')['tabletmobile_background_image']['global_image']['url']: $desktop_bg_img_url;
    $retina_mobile_bg_img_url = get_field('page_hero')['tabletmobile_background_image']['global_retina_image']['url']? get_field('page_hero')['tabletmobile_background_image']['global_retina_image']['url']: $mobile_bg_img_url;
    $hero_title = get_field('page_hero')['hero_title'];
    $hero_description = get_field('page_hero')['hero_description'];
@endphp

<style>
  .simple-hero {
    background-image: url('{{ $desktop_bg_img_url}}');
  }
    @media screen and (max-width: 480px) {
      .simple-hero {
        background-image: url('{{ $mobile_bg_img_url }}') !important;
      }
    }
</style>

<div class="simple-hero">
  <div class="simple-hero-content">
    <h1>{{$hero_title}}</h1>
    <p>{!! $hero_description !!}</p>
  </div>
</div>