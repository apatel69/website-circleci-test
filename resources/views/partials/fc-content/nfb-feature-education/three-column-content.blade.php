@php
	$sectionTitle = get_sub_field('section_title');
	$sectionId = preg_replace("/[^a-zA-Z]+/", "", $sectionTitle);
@endphp

<div class="container nfb-feature-education-three-column-content">
	@if ($sectionTitle !== "")
    	<h2 id="{{$sectionId}}" class="three-column-content-title">{{$sectionTitle}}</h2>
    @endif

	<div class="three-column-content">
		@if (have_rows('three_col_content'))
    	<div class="three-col">
      	@while(have_rows('three_col_content')) @php(the_row())
        	<div class="col">
            @if (get_sub_field('column_image'))
            	@include('partials.components.global-image', ['img' => get_sub_field('column_image')])
            @endif
            @if (get_sub_field('column_title'))
            	<h3>{{ get_sub_field('column_title') }}</h3>
            @endif
            {!! get_sub_field('column_content') !!}
        </div>
        	@endwhile
      	</div>
      @endif
  </div>
</div>
