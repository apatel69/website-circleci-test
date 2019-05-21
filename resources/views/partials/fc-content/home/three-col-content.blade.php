<div class="container">
	<section class="pillars three-col-content">
		@if (get_sub_field('title'))
			<h2 class="three-column-content-title ">{{ get_sub_field('title') }}</h2>
        @endif
		<a id="section{{ $counter }}" class="anchor"></a>
		@if (have_rows('three_col_content'))
			<div class="three-col">
				@while(have_rows('three_col_content')) @php(the_row())
					<div class="col">
						@if (get_sub_field('column_title'))
							<h3>{{ get_sub_field('column_title') }}</h3>
						@endif
						@if (get_sub_field('column_image'))
							@include('partials.components.global-image', ['img' => get_sub_field('column_image')])
						@endif
						{!! get_sub_field('column_content') !!}
					</div>
				@endwhile
			</div>
		@endif
	</section>
</div>
