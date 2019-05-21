<div class="container">
	<section class="three-column-testimonials">
		@if (get_sub_field('testimonial_section_title'))
			<h2>{{ get_sub_field('testimonial_section_title') }}</h2>
		@endif
		@if (have_rows('testimonial_columns'))
			<div class="column-parent supporting-testimonials">
				@while (have_rows('testimonial_columns')) @php (the_row())
					<div class="supporting-testimonial">
						<div class="testimonial-information">
							@if (get_sub_field('testimonial_title'))
								<h4 class="text-center">{{ get_sub_field('testimonial_title') }}</h4>
							@endif
							@if (get_sub_field('quote'))
								<q>{{ get_sub_field('quote') }}</q>
							@endif
						</div>
						<div class="testimonial-personnel-details">
							<hr>
							<div class="bio">
								@if (get_sub_field('name'))
									<p>{{ get_sub_field('name') }}</p>
								@endif
								@if (get_sub_field('position_or_job_title'))
									<p class="subtext">{{ get_sub_field('position_or_job_title') }}</p>
								@endif
							</div>
						</div>
					</div>
				@endwhile
			</div>
		@endif
	</section>
</div>
