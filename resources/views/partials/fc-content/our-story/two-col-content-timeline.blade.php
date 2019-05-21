<div class="container">
	<div class="column-parent ourstory">
		<div class="story">
			@if (have_rows('main_content'))
				@while(have_rows('main_content')) @php(the_row())
					<section>
						<div>
							@if(get_sub_field('section_title'))
								<h2>{{ get_sub_field('section_title') }}</h2>
							@endif
							@if(get_sub_field('section_content'))
								<div class="content">
									{!! get_sub_field('section_content') !!}
								</div>
							@endif
						</div>
					</section>
				@endwhile
			@endif			
		</div>

		<div class="timeline">
			<section>
				@if (have_rows('timeline'))
					<ul>
						@while(have_rows('timeline')) @php(the_row())
							<li>
								@if(get_sub_field('date'))
									<span class="date">{{ get_sub_field('date') }}</span>
								@endif
								@if(get_sub_field('title'))
									<span class="timeline-title">{{ get_sub_field('title') }}</span>
								@endif
								@if(get_sub_field('details'))		
									<span class="timeline-details">{{ get_sub_field('details') }}</span>
								@endif
							</li>
						@endwhile
					</ul>
				@endif
			</section>
		</div>
	</div>
</div>