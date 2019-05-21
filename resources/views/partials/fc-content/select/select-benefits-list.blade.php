<div class="container no-side-pad-tablet select-content">
	<section class="column-parent select-feature">
    @if(get_sub_field('title'))
      <div class="feature-header">
        <h2>{{get_sub_field('title')}}</h2>
      </div>
    @endif

    @if(have_rows('benefits_list'))
    @while(have_rows('benefits_list')) @php(the_row())
      <div class="feature-header">
        @if(get_sub_field('benefits_list_title'))
          <h3>{{get_sub_field('benefits_list_title')}}</h3>
        @endif
        {!!get_sub_field('benefits_list',false,false)!!}
      </div>
    @endwhile
    @endif
	</section>
</div>