@php
	$sectionTitle = get_field('three_column_content')['section_title'];
    $sectionId = preg_replace("/[^a-zA-Z]+/", "", $sectionTitle);
    $headingWeight = get_field('three_column_content')['heading_weight'] ? get_field('three_column_content')['heading_weight'] : 'h2';
@endphp

<div class="container nfb-feature-education-three-column-content">
    @if ($sectionTitle !== "")
        <{{$headingWeight}} id="{{$sectionId}}" class="three-column-content-title">{{$sectionTitle}}</{{$headingWeight}}>
    @endif

	<div class="three-column-content">
		@if (have_rows('three_column_content'))
        	<div class="three-col">
              	@while(have_rows('three_column_content')) @php(the_row())

                  @if (have_rows('column_content'))
                    @while(have_rows('column_content')) @php(the_row())

                        <div class="col box-shadow">
                            @if (get_sub_field('column_image'))
                                @include('partials.components.global-image', ['img' => get_sub_field('column_image')])
                            @endif
                            @if (get_sub_field('column_title'))
                                <h3>{{ get_sub_field('column_title') }}</h3>
                            @endif
                            {!! get_sub_field('column_content') !!}
                        </div>

                    @endwhile
                  @endif

              	@endwhile
        	</div>
        @endif
    </div>
</div>
