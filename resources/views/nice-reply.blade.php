{{--
Template Name: Nice Reply - Flexible Content
--}}

@extends('layouts.app')

@php
    $counter = 0;
@endphp

@section('content')
<div class="container no-side-pad">
	<div class="rule"></div>
</div>
<div class="container interface-blue-background">
	<section>
			 <h3 id="nice-reply-no-user-name" class="text-center nice-reply-hide">No Username Provided</h3>
			<h3 id="nice-reply-no-ticket-id" class="text-center nice-reply-hide">No Ticketid Provided</h3>
			<h3 id="nice-reply-no-user-information" class="text-center nice-reply-hide ">No User Information Provided</h3>

			<div id="nice-reply-window-1" class="nice-reply-hide">
			<h1 class="text-center">{{ get_field('page_content_title') }}</h1>

			<div class="nice-reply-paragraph text-center">{!! get_field('support_experience_blurb') !!}</div>
			<form id="product-feedback" class="column-parent survey-items">
				<div class="survey-item">
					<label for="product-feedback1">
						1
						<input type="radio" id="product-feedback1" name="product-feedback" value="1">
						<img src="@asset('images/nice-reply/emoji-bad.svg')" alt="Bad Face">
					</label>
				</div>
				<div class="survey-item">
					<label for="product-feedback2">
						2
						<input type="radio" id="product-feedback2" name="product-feedback" value="2">
					</label>
				</div>
				<div class="survey-item">
					<label for="product-feedback3">
						3
						<input type="radio" id="product-feedback3" name="product-feedback" value="3">
					</label>
				</div>
				<div class="survey-item">
					<label for="product-feedback4">
						4
						<input type="radio" id="product-feedback4" name="product-feedback" value="4">
					</label>
				</div>
				<div class="survey-item">
					<label for="product-feedback5">
						5
						<input type="radio" id="product-feedback5" name="product-feedback" value="5">
						<img src="@asset('images/nice-reply/emoji-neutral.svg')" alt="Neutral Face">
					</label>
				</div>
				<div class="survey-item">
					<label for="product-feedback6">
						6
						<input type="radio" id="product-feedback6" name="product-feedback" value="6">
					</label>
				</div>
				<div class="survey-item">
					<label for="product-feedback7">
						7
						<input type="radio" id="product-feedback7" name="product-feedback" value="7">
					</label>
				</div>
				<div class="survey-item">
					<label for="product-feedback8">
						8
						<input type="radio" id="product-feedback8" name="product-feedback" value="8">
						<img src="@asset('images/nice-reply/emoji-smile.svg')" alt="Smile Face">
					</label>
				</div>
				<div class="survey-item">
					<label for="product-feedback9">
						9
						<input type="radio" id="product-feedback9" name="product-feedback" value="9">
					</label>
				</div>
				<div class="survey-item">
					<label for="product-feedback10">
						10
						<input type="radio" id="product-feedback10" name="product-feedback" value="10">
						<img src="@asset('images/nice-reply/emoji-grin.svg')" alt="Grin Face">
					</label>
				</div>
			</form>

			<div class="nice-reply-paragraph text-center">{!! get_field('product_experience_blurb') !!}</div>
			<form id="support-experience" class="column-parent survey-items">
				<div class="survey-item">
					<label for="support-experience1">
						1
						<input type="radio" id="support-experience1" name="support-experience" value="1">
						<img src="@asset('images/nice-reply/emoji-bad.svg')" alt="Bad Face">
					</label>
				</div>
				<div class="survey-item">
					<label for="support-experience2">
						2
						<input type="radio" id="support-experience2" name="support-experience" value="2">
					</label>
				</div>
				<div class="survey-item">
					<label for="support-experience3">
						3
						<input type="radio" id="support-experience3" name="support-experience" value="3">
					</label>
				</div>
				<div class="survey-item">
					<label for="support-experience4">
						4
						<input type="radio" id="support-experience4" name="support-experience" value="4">
					</label>
				</div>
				<div class="survey-item">
					<label for="support-experience5">
						5
						<input type="radio" id="support-experience5" name="support-experience" value="5">
						<img src="@asset('images/nice-reply/emoji-neutral.svg')" alt="Neutral Face">
					</label>
				</div>
				<div class="survey-item">
					<label for="support-experience6">
						6
						<input type="radio" id="support-experience6" name="support-experience" value="6">
					</label>
				</div>
				<div class="survey-item">
					<label for="support-experience7">
						7
						<input type="radio" id="support-experience7" name="support-experience" value="7">
					</label>
				</div>
				<div class="survey-item">
					<label for="support-experience8">
						8
						<input type="radio" id="support-experience8" name="support-experience" value="8">
						<img src="@asset('images/nice-reply/emoji-smile.svg')" alt="Smile Face">
					</label>
				</div>
				<div class="survey-item">
					<label for="support-experience9">
						9
						<input type="radio" id="support-experience9" name="support-experience" value="9">
					</label>
				</div>
				<div class="survey-item">
					<label for="support-experience10">
						10
						<input type="radio" id="support-experience10" name="support-experience" value="10">
						<img src="@asset('images/nice-reply/emoji-grin.svg')" alt="Grin Face">
					</label>
				</div>
			</form>

			<div class="nice-reply-cta" id="nice-reply-submit-1">
				<a class="primary-cta extra-padding">Continue</a>
			</div>
			<div class="error-state">
				<p class="text-center">* Please rate your support experience.</p>
			</div>
			<div class="column-parent nav-dots">
				<svg viewBox="0 0 12 12" class="nav-dot active"><circle cx="6" cy="6" r="6"/></svg>
				<svg viewBox="0 0 12 12" class="nav-dot"><circle cx="6" cy="6" r="6"/></svg>
			</div>
		</div>
		<div id="nice-reply-window-2" class="nice-reply-hide">
				<div class="container interface-blue-background">
						<section>
							<form action="/resources/functions/nicereply.php" method="get">
									<h3 class="text-center nice-reply-hide">An error occured. Please try again.</h3>
									
									@while(have_rows('nice_reply_response_messages')) @php(the_row())
										<div id="nice-reply-response-{{get_row_index()}}" class="nice-reply-hide">
											<h1 class="text-center">{{get_sub_field('response_message_title')}}</h1>
											<p class="nice-reply-paragraph text-center">{{get_sub_field('response_message_body')}}</p>
										</div>
									@endwhile					
									<textarea name="nice-reply-feedback" id="nice-reply-feedback" cols="30" rows="10"></textarea>
					
									<div class="nice-reply-cta" id="nice-reply-submit-2">
										<a class="primary-cta extra-padding">Submit</a>
									</div>
									<div class="column-parent nav-dots">
										<svg viewBox="0 0 12 12" class="nav-dot"><circle cx="6" cy="6" r="6"/></svg>
										<svg viewBox="0 0 12 12" class="nav-dot active"><circle cx="6" cy="6" r="6"/></svg>
									</div>					
								<input type="hidden" name="done">
								<input type="hidden" name="user">
								<input type="hidden" name="ticketid">
								<input type="hidden" name="supportExperienceScore">
								<input type="hidden" name="productFeedbackScore">
								<input type="hidden" name="comment">
					
							</form>
						</section>
					</div>
				</div>
	<div id="nice-reply-window-3" class="nice-reply-hide">
		@include('partials.components.global-image', ['img' => get_field('thank_you_message_image'), 'classes' => 'thankyou-image'])
		<h1 id="nice-reply-submission-success" class="text-center thankyou nice-reply-hide">{!! get_field('thank_you_message') !!}</h1>
		<h3 id="nice-reply-submission-error" class="text-center nice-reply-hide">Submission Failed. Please retry.</h3>
	</div>
	</section>
</div>
@endsection
