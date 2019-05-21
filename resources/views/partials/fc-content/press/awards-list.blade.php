<div class="container">
	<section>
        @if (get_sub_field('section_title'))
		    <h3 class="text-center awards-title">{{ get_sub_field('section_title') }}</h3>
        @endif
        @if (have_rows('awards'))
            <div class="column-parent awards">
                @while (have_rows('awards')) @php(the_row())
                    <div class="award">
                        @include('partials.components.global-image', ['img' => get_sub_field('award_image'), 'classes' => get_sub_field('award_image_custom_class')])
                    </div>
                @endwhile
            </div>
        @endif
	</section>
</div>