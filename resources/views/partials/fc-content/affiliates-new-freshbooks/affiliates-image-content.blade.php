<div class="container">
  <section>
    <div class="column-parent early-bird-details">
      @if(get_sub_field('image'))
        <div class="early-bird-detail">
          @include('partials.components.global-image', ['img' => get_sub_field('image')])
        </div>
      @endif
      <div class="early-bird-detail">
        @if(get_sub_field('title'))
        <h2>{{get_sub_field('title')}}</h2>
        @endif
        {!!get_sub_field('description')!!}
      </div>
    </div>
  </section>
</div>