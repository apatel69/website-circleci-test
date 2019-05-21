@if(have_rows('three_col_title_content_list'))
  <div class="container">
    <section class="pillars">
      <div class="three-col">
        @while(have_rows('three_col_title_content_list')) @php(the_row())
          <div class="col">
            @if(get_sub_field('title'))
              <h3>{{get_sub_field('title')}}</h3>
            @endif
            {!!get_sub_field('description')!!}
          </div>
        @endwhile
      </div>
    </section>
  </div>
@endif