<div id="passion" class="container passion">
  <section>
    @if(get_sub_field('title'))
      <h2 class="text-center">{{get_sub_field('title')}}</h2>
    @endif
    @if(get_sub_field('sub_title'))
      <h3 class="text-center">{{get_sub_field('sub_title')}}</h3>
    @endif
    <div class="infographic-image">
      <div class="magnify-image"></div>
      <picture>
        <source media="(max-width: 480px)" srcset="{{get_sub_field('mobile_image')['global_image']['url']}}">
        <source media="(max-width: 768px)" srcset="{{get_sub_field('tablet_image')['global_image']['url']}}">
        @include('partials.components.global-image', ['img' => get_sub_field('desktop_image'),'classes' => 'preview-image', 'lazy_load' => false])
      </picture>
    </div>
    @if (get_sub_field('passion_cta'))
      <div class="text-center download-img">
          @include('partials.components.global-link', ['btn' => get_sub_field('passion_cta')])
      </div>
    @endif
  </section>
</div>
