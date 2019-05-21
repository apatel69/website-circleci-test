@php
    // Make the variables work for the original or clones containing appended field names
    $hero_title = get_field('lpat_hero_title');
    $bg_img = get_field('desktop_hero_image','options')["global_image"]['url'];
    $tablet_bg_img = get_field('tablet_hero_image','options')["global_image"]['url'];
    $mobile_bg_img = get_field('mobile_hero_image','options')["global_image"]['url'];
    $hero_description = get_field('hero_description','options');
    $has_custom_description = get_field('has_custom_description');
    $custom_hero_description = get_field('lpat_hero_description');
    $use_alternative_hero_image = get_field('has_custom_hero_image');
    $use_custom_hero_image = get_field('use_custom_hero_image');
    $alternative_hero_image = get_field('custom_hero_image','options')["global_image"]['url'];
    $custom_hero_desktop = get_field('custom_hero_image')["global_image"]['url'];
    $custom_hero_tablet = get_field('custom_hero_image_tablet')["global_image"]['url'];
    $custom_hero_mobile = get_field('custom_hero_image_mobile')["global_image"]['url'];
    $has_custom_cta = get_field('has_custom_cta');
    $custom_cta = get_field('lpat_hero_custom_cta','options');
    $background_desktop = $use_alternative_hero_image ? $alternative_hero_image : ($use_custom_hero_image ? $custom_hero_desktop : $bg_img);
    $background_tablet = $use_custom_hero_image ? $custom_hero_tablet : $tablet_bg_img;
    $background_mobile = $use_custom_hero_image ? $custom_hero_mobile : $mobile_bg_img;
@endphp
<style>
  .hero.bg-img {
    background-image: url('{{ $background_desktop }}');
  }
  @media screen and (max-width: 768px) {
    .hero.bg-img {
      background-image: url('{{ $background_tablet }}') !important;
    }
  }
  @media screen and (max-width: 480px) {
    .hero.bg-img {
      background-image: url('{{ $background_mobile }}') !important;
    }
  }
</style>

<div class="container hero bg-img lpat_hero">
    <section id="cpy-hero">
        <div class="content">
            @if($hero_title)
                <div class="hero_intro_heading">
                    <h1>{!! $hero_title !!}</h1>
                </div>
            @endif
            @if($has_custom_description)
                {!! $custom_hero_description !!}
            @else
                {!! $hero_description !!}
            @endif
        </div>

        @if($has_custom_cta)
            <div class="lpat_hero__custom-cta">
                @include ('partials.components.global-link', ['btn' => $custom_cta, 'classes' => 'lpat_hero__cta'])
            </div>
        @else
            @include('partials/fc-content/global/hero-signup-form')
        @endif
    </section>
</div>
