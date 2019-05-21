<div class="container">
  <section class="guide-footer">
    @if(get_sub_field('support_image'))
      @include('partials.components.global-image', ['img' => get_sub_field('support_image')])  
    @endif
    <div class="inner-content">
      @if(get_sub_field('title'))
        <h2>{{get_sub_field('title')}}</h2>
      @endif
      {!!get_sub_field('description')!!}
    </div>
  </section>
</div>