<div class="questions-section">
  @if(have_rows('two_col_question_section_list'))
    <div class="left">
      @while(have_rows('two_col_question_section_list')) @php(the_row())
        <h2>{{get_sub_field('title')}}</h2>
        {!!get_sub_field('description')!!}
      @endwhile
    </div>
  @endif
  <div class="right">
    <div class="call-us">
      {!!get_sub_field('call_us_content')!!}
    </div>
      @if(get_sub_field('webinar_team_image'))
        @include('partials.components.global-image',['img' => get_sub_field('webinar_team_image')])
      @endif
  </div>
</div>