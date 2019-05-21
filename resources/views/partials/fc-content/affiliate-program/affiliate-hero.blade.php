<div class="container hero" style="background-image:url('{{get_sub_field('hero_background_image')}}')">
	<section id="cpy-hero">
		<div class="content">
			@if(get_sub_field('hero_title'))
				<h1>{!!get_sub_field('hero_title')!!}</h1>
			@endif
			@if(get_sub_field('hero_description'))
				<p>{{get_sub_field('hero_description')}}</p>
			@endif	
    </div>
    @if(get_sub_field('hero_button'))
      <div class="cta-only"> 
        @include('partials.components.global-link', ['btn' => get_sub_field('hero_button')]) 
      </div>
    @endif 
	</section>
</div>
@if(get_sub_field('hero_background_image'))
  <div class="mobile-hero-img" style="background-image:linear-gradient(#e5f4fe 0,rgba(255,255,255,0) 15%),url('{{get_sub_field('hero_background_image')}}')"></div>
@endif