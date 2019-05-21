@php 
$hdbackgroundImage = 'false';
$layoutStyle = get_sub_field('hero_layout');
$hdbackgroundImage = "false";
$hdbackgroundImage = get_sub_field('desktop_hero_image')['global_image']['url'] && get_sub_field('tablet_mobile_hero_image')['global_image']['url']  ? "true" : "false";
@endphp

<div class="container hero bg-img layoutstyle--{{$layoutStyle}}">
	<div id="cpy-hero" class="cpy-hero">
		<div class="content">
      @if(get_sub_field('hero_title'))
        <div class="hero_intro_heading">
          <h1>{!! get_sub_field('hero_title') !!}</h1>
        </div>
      @endif
      {!! get_sub_field('hero_description') !!}
    </div>
    
    <div class="cta-subtext-assurance">
      <div class="cta-subtext">
        @if(get_sub_field('cta'))
        {{ $subtext = get_sub_field('cta_subtext') ?: '' }}
        @php($cta = get_sub_field('cta'))
        @include('partials.components.global-link', ['btn' => $cta, 'subtext' => $subtext])
        @endif
      </div>
    </div>
  
    @if(get_sub_field('include_reg_form'))    
      @include('partials/fc-content/global/hero-signup-form')    
    @endif
  </div>
    @if(get_sub_field('desktop_hero_image'))
      <div class="cta-image desktop-cta-image hdbackground--{{$hdbackgroundImage}}">
        @include('partials.components.global-image', ['img' => get_sub_field('desktop_hero_image')])
      </div>
    @endif

    @if(get_sub_field('tablet_mobile_hero_image'))
      <div class="cta-image tablet-mobile-cta-image hdbackground--{{$hdbackgroundImage}}">
        @include('partials.components.global-image', ['img' => get_sub_field('tablet_mobile_hero_image')])
      </div>
    @endif

    @if(get_sub_field('hero_outro_paragraph'))
      <div class="cta-outroCopy">
      {!! get_sub_field('hero_outro_paragraph') !!}
    </div>
    @endif
    
</div>
