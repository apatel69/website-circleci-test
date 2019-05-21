<div class="container">
  <section class="text-center overview-fact-data">
    @if(get_sub_field('title'))
      <h2>{{get_sub_field('title')}}</h2>
    @endif
    @if(have_rows('fact_list'))
      <div class="column-parent fact-container">
        @while(have_rows('fact_list')) @php(the_row())
        <div class="fact-box">
          @if(get_sub_field('fact_over_text'))
            <span>{{get_sub_field('fact_over_text')}}</span>
          @endif
          @if(get_sub_field('fact_data'))
            <span class="data">{{get_sub_field('fact_data')}}</span>
          @endif
          @if(get_sub_field('fact_data_sub_text'))
            <span>{{get_sub_field('fact_data_sub_text')}}</span>
          @endif
        </div>
        @endwhile
      </div>
    @endif
  </section>
</div>