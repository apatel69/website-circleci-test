@php
    // Make the variables work for the original or clones containing appended field names
    $bg_img = get_sub_field('background_image') ?: get_sub_field('hero_background_image');
    $mobile_bg_img = get_sub_field('mobile_background_image') ? get_sub_field('mobile_background_image') : $bg_img;
    $hero_title = get_sub_field('hero_title') ?: get_sub_field('hero_hero_title');
    $hero_description = get_sub_field('hero_description') ?: get_sub_field('hero_hero_description');
    $include_reg_form = !empty(get_sub_field('include_reg_form')) ?: get_sub_field('hero_include_reg_form');
    $include_slide_in_reg_form = !empty(get_sub_field('include_slide_in_reg_form')) ?: get_sub_field('hero_include_slide_in_reg_form');
    $section = isset($count) ? "section" . $count : '';

    $empty_mobile_bg = ($bg_img == $mobile_bg_img) || (empty($mobile_bg_img)) ? true : false;

    if ($empty_mobile_bg) {
      $mbg_css = 'background-image: none !important;';
    } else {
      $mbg_css = 'background-image: url(' . $mobile_bg_img . ') !important;';
    }
@endphp

<style>
  .hero.bg-img {
    background-image: url('{{ $bg_img }}');
  }
  @media screen and (max-width: 480px) {
    .hero.bg-img {
      {{ $mbg_css }}
    }
  }
</style>

<div id="{{ $section }}" class="container hero bg-img">
  	<section id="cpy-hero">
        <div class="content">
            @if($hero_title)
                <div class="hero_intro_heading">
                    <h1>{!! $hero_title !!}</h1>
                </div>
            @endif
            {!! $hero_description !!}
            @if(get_sub_field('add_app_store_badges'))
                <div class="mobile-apps-buttons">
                    @include('partials.components.global-mobile-apps')
                </div>
            @endif
        </div>

        {{-- condition to include CTA only when the App store badges are not added to the hero section --}}
        @if(!get_sub_field('add_app_store_badges') && !empty(get_sub_field('cta')['global_link_text']))
            <div class="cta-subtext-assurance">
                <div class="cta-subtext">
                    @if(get_sub_field('cta'))
                        {{ get_sub_field('cta_subtext') ? $subtext = get_sub_field('cta_subtext') : $subtext = '' }}
                        @php($cta = get_sub_field('cta'))
                        @include('partials.components.global-link', ['btn' => $cta, 'subtext' => $subtext, 'classes' => $include_slide_in_reg_form ? 'slide-in-form-btn' : ''])
                    @endif
                </div>
            </div>
        @endif

        @if($include_slide_in_reg_form)
            @include('partials/fc-content/global/hero-slide-in-signup-form')
        @endif

        @if ($include_reg_form)
            @include('partials/fc-content/global/hero-signup-form')
        @endif
	</section>
</div>
