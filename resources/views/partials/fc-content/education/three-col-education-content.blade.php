<div class="container">
  <section id="what-you-get">
    @if(get_sub_field('title'))
    <h2 class="text-center">
      {{ get_sub_field('title') }}
    </h2>
    @endif
    @if(have_rows('education_benefits_list'))
      <div class="column-parent thirds">
        @while(have_rows('education_benefits_list')) @php(the_row())
        <div class="third">
          @include('partials.components.global-image', ['img' => get_sub_field('image') ])
          @if(get_sub_field('benefits_title'))
            <h3>{!! get_sub_field('benefits_title') !!}</h3>
          @endif
          {!!get_sub_field('benefits_description')!!}
        </div>
        @endwhile
      </div>
    @endif
    @if (get_sub_field('education_benefits_cta'))
      <div class="text-center">
        @include('partials.components.global-link', ['btn' => get_sub_field('education_benefits_cta'),'classes' => 'extra-padding'])
      </div>
    @endif
  </section>
</div>