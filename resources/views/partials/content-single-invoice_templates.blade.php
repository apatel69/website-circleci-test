<div class="container">
	<section>
		<div class="two-col column-parent">
			<div class="col">
                @if (get_field('use_custom_template_description'))
				    {!! get_field('custom_invoice_template_content') !!}
                @else
				    {!! get_field('invoice_template_content', 'option') !!}
                @endif
			</div>
			<div class="col text-center blue-background trial">
                @php $cta_col = get_field('invoice_template_trial_cta', 'option'); @endphp
                
                @if ($cta_col['invoice_templates_cta_column_title'])
				    <span class="title">{{ $cta_col['invoice_templates_cta_column_title'] }}</span>
                @endif

                @if ($cta_col['invoice_templates_cta_column_content'])
				    <p>{{ $cta_col['invoice_templates_cta_column_content'] }}</p>
                @endif
				
                @if ($cta_col['invoice_templates_cta_column_cta'])
                    @include('partials.components.global-link', ['btn' => $cta_col['invoice_templates_cta_column_cta']])
                @endif

                @if ($cta_col['invoice_templates_cta_column_image'])
                    @include('partials.components.global-image', ['img' => $cta_col['invoice_templates_cta_column_image'], 'classes' => 'freshbooks-screenshots'])
                @endif

				<div class="rule"></div>

                <span class="assurance-copy">Featured In</span>

                @if (have_rows('invoice_templates_featured_in_logos', 'option'))
				    <div class="featured-companies">
                        @while (have_rows('invoice_templates_featured_in_logos', 'option')) 
                            @php the_row(); @endphp
                            @php $image = get_sub_field('invoice_templates_featured_in_logos'); @endphp
                            <img src="{{ $image['url'] }}" alt="{{ $image['alt'] }}" class="logo {{ get_sub_field('invoice_templates_featured_in_logo_class') }}">
                        @endwhile
                    <div>
                @endif
			</div>
		</div>
	</section>
</div>