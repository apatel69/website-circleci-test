<div class="container">
	<section>
		<div class="min-award column-parent ">
			<h4 class="copy">{{ get_field('accounting_software_awards_heading', 'option') }}</h4>
            @if (have_rows('accounting_software_award_logos', 'option'))
                @while (have_rows('accounting_software_award_logos', 'option')) @php(the_row())
                    @if (get_sub_field('accounting_software_award_images'))
			            @include('partials.components.global-image', ['img' => get_sub_field('accounting_software_award_images')])
                    @endif
                @endwhile
            @endif
		</div>
	</section>
</div>