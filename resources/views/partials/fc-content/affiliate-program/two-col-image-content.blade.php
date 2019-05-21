<div class="affiliates-perks">
  @if(have_rows('two_col_content_list'))
    @while(have_rows('two_col_content_list')) @php(the_row())
      <div class="{{get_sub_field('image_no_padding')?'no-side-pad':''}} container">
        <section class="column-parent affiliate-perk">
          <div class="affiliate-content">
            @if (get_sub_field('two_col_content_header'))
              <h2>{!! get_sub_field('two_col_content_header') !!}</h2>
            @endif
            @if(get_sub_field('two_col_content'))
              {!! get_sub_field('two_col_content') !!}
            @endif
          </div>
            @if(get_sub_field('two_col_image'))
              <div class="affiliate-img">
                @include('partials.components.global-image', ['img' => get_sub_field('two_col_image')])
              </div>
            @endif
        </section>
      </div>
    @endwhile
  @endif
</div>
