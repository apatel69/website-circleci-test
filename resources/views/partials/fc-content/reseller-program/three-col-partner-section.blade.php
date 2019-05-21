<div class="container">
  <section>
    @if(get_sub_field('title'))
      <h2 class="thirds-headline">
        {{get_sub_field('title')}}
      </h2>
    @endif
    @if(have_rows('partner_details_list'))
      <div class="column-parent thirds">
        @while(have_rows('partner_details_list')) @php(the_row())
          <div class="third">
            <div class="third-content">
              @if(get_sub_field('title'))
                <h3>{{get_sub_field('title')}}</h3>
              @endif
              @if(get_sub_field('description'))
                {!!get_sub_field('description')!!}
              @endif
            </div>
            @if(get_sub_field('image'))
              @include('partials.components.global-image',['img' => get_sub_field('image')])
            @endif
          </div>
        @endwhile
      </div>
      @endif
  </section>
</div>