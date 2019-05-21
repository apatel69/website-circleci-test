<div class="container">
	<section class="lpat-three-col-content">
    @if (get_field('benefits_title','options'))
      <h2 class="lpat-three-col-content__benefits-title">{{get_field('benefits_title','options')}}</h2>
    @endif
    @if (have_rows('benefits_list','options'))
      <div class="lpat-three-col-content__benefits-list">
        @while(have_rows('benefits_list','options')) @php(the_row())
          <div class="lpat-three-col-content__benefit-content">
            @if (get_sub_field('benefit_title','options'))
                <h3>{{get_sub_field('benefit_title','options')}}</h3>
            @endif
            {!!get_sub_field('benefit_description','options')!!}
          </div>
        @endwhile
      </div>
    @endif
	</section>
</div>