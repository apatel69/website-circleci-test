@if(have_rows('benefits_list'))
  <div class="container select-content select-benefits-list">
    @while(have_rows('benefits_list')) @php(the_row())
      <section class="column-parent select {{get_sub_field('benefit_category')}}" id="cpy-select-feature-1">
        <div class="features-image select-column">
          @if(get_sub_field('benefits_mobile_view_title'))
            <h2 class="hide-desktop">{{get_sub_field('benefits_mobile_view_title')}}</h2>
          @endif
          <div class="img-copy">
            <picture>
              @if(get_sub_field('mobile_image'))
                <source media="(max-width: 768px)" type="image/jpg" data-srcset="{{get_sub_field('mobile_image')['global_image']['url']}}" srcset="" >
              @endif
              @if(get_sub_field('desktop_image'))
                @include('partials.components.global-image', ['img' => get_sub_field('desktop_image')])
              @endif
            </picture>
            @if(have_rows('image_sub_texts'))
              @while(have_rows('image_sub_texts')) @php(the_row())
                @if(get_sub_field('sub_text'))
                  <h2>{{get_sub_field('sub_text')}}</h2>
                @endif
              @endwhile
            @endif
          </div>
        </div>
        <div class="features-text select-column">
          @if(get_sub_field('benefits_title'))
            <h2 class="hide-mobile">{{get_sub_field('benefits_title')}}</h2>
          @endif
          {!!get_sub_field('benefits_description')!!}
          @if (get_sub_field('benefits_cta'))
            @include('partials.components.global-link', ['btn' => get_sub_field('benefits_cta'), 'classes' => 'select-cta'])
          @endif
        </div>
      </section>
    @endwhile
  </div>
@endif