@php
  $source = isset($global) ? 'option' : '';
@endphp

<div class="container faq-accordion">
	<section class="faq-container no-side-pad-tablet">
		@if ($source ? get_field('global_faq_section_title', $source) : (get_sub_field('global_faq_section_title') ? get_sub_field('global_faq_section_title') : get_field('global_faq_section_title')))
			<h2>{{ $source ? get_field('global_faq_section_title', $source) : (get_sub_field('global_faq_section_title') ? get_sub_field('global_faq_section_title') : get_field('global_faq_section_title')) }}</h2>
		@endif
		@if (have_rows('global_faqs', $source))
			@while (have_rows('global_faqs', $source)) @php (the_row())
				<div class="faq-item">
					<h3 class="faq-question">{{ get_sub_field('global_faq_question', $source) }}</h3>
					<div class="faq-answer">{!! get_sub_field('global_faq_answer', $source) !!}</div>
				</div>
			@endwhile
		@endif
	</section>
</div>
