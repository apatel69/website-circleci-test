<div class="container">
	<section id="executives">
		<div class="executives-wrapper">
			@if (get_sub_field('title'))
            <h2 class="text-center">{{ get_sub_field('title') }}</h2>    
            @endif
            
            @if (have_rows('executive_members'))
            <div class="executive-listing">
                @while (have_rows('executive_members')) @php (the_row())
                    <div class="executive-member column-parent">
                        @include('partials.components.global-image', ['img' => get_sub_field('member_image'), 'classes' => 'executive-image' ])
                        <div class="executive-info">
                            @if (get_sub_field('member_name'))
                                <h3 class="executive-name">{{ get_sub_field('member_name') }}</h3>
                            @endif
							@if (get_sub_field('member_position'))
                                <span class="executive-position">{{ get_sub_field('member_position') }}</span>
                            @endif
							{!! get_sub_field('member_description') !!}
						</div>
					</div>
                @endwhile
            </div>
            @endif
		</div>
	</section>
</div>
