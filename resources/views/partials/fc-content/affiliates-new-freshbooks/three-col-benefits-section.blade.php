<div class="switch-benefit">
  <div class="container">
    <section>
      @if(get_sub_field('title'))
        <h2 class="text-center">{{ get_sub_field('title') }}</h2>
      @endif
      @if(have_rows('benefits_list'))
      <div class="column-parent thirds">
        @while(have_rows('benefits_list')) @php(the_row())
        <div class="third">
          @if(get_sub_field('benefit_image'))
            @include('partials.components.global-image', ['img' => get_sub_field('benefit_image')])
          @endif
          @if( get_sub_field('benefit_title'))
            <h3>{{ get_sub_field('benefit_title') }}</h3>
          @endif
          {!!get_sub_field('benefit_description')!!}
        </div>
        @endwhile
      </div>
      @endif
    </section>
  </div>
</div>