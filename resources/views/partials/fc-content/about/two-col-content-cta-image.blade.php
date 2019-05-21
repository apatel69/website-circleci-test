<div class="container">
  <section class="overview-two-col-content">
    <div class="column-parent overview">
      <div class="content">
        @if(get_sub_field('title')) 
          <h2>{{get_sub_field('title')}}</h2>
        @endif
        @if(get_sub_field('description'))
          <p>{{get_sub_field('description')}}</p>
        @endif

        @if (get_sub_field('about_two_col_cta'))
          @include('partials.components.global-link', ['btn' => get_sub_field('about_two_col_cta'), 'classes' => 'ghost-button no-width'])
        @endif
      </div>
      @if (get_sub_field('image'))
        <div class="image">
            @include('partials.components.global-image', ['img' => get_sub_field('image')])
        </div>
      @endif
    </div>
  </section>
</div>