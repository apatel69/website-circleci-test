@php
  $name = get_the_title();
  $url = get_field('app_url');
  $id = get_the_id();

  $tags = get_the_terms($id, 'integration_tags');
  $main_page = get_field('integrations_listing_page', 'option');
  $main_page_url = get_permalink($main_page->ID);

  $post_categories = get_post_primary_category($post->ID, 'integration_categories');
  $primary_category = $post_categories['primary_category'];
@endphp

<div class="container masthead">
	<section>
		<div class="breadcrumbs-wrap">
			<a href="{{ $main_page_url }}" class="breadcrumbs">< {{ get_field('integrations_breadcrumb_label', 'option') }}</a>
			@if (isset($primary_category->slug) && isset($primary_category->name))
				<a href="{{ $main_page_url }}/{{ $primary_category->slug }}" class="breadcrumbs">< {{ $primary_category->name }}</a>
			@endif
		</div>
		<div class="inner-content">
			<div class="addon-info">
				<h1 data-swiftype-name="title" data-swiftype-type="string">{{ $name }}</h1>
				{!! get_field('app_excerpt') !!}
				@if (get_field('app_freshbooks_tested'))
					<p class="tested-flag">FreshBooks Tested</p>
				@endif
				<div class="clr"></div>
				@if($url)
					<a href="{{ $url }}" target="_blank" class="btn btn-primary btn-med btn-share" rel="noopener">{!! get_field('include_custom_button_text') ? '<p>' . get_field('custom_button_text') . '</p>': get_field('global_button_text', 'option') !!}</a>
				@endif
			</div>
			<div class="addon-image">
				<div class="img-wrap">
					@if (get_field('app_logo'))
						<img class="logo" src="{{ get_field('app_logo')['url'] }}" alt="{{ get_field('app_logo')['alt'] }}">
					@endif
					@if (get_field('app_top_pick'))
						@if (get_field('integrations_top_pick_badge', 'option'))
							<img class="badge" src="{{ get_field('integrations_top_pick_badge', 'option')['url'] }}" alt="{{ get_field('integrations_top_pick_badge')['alt'] }}">
						@endif
					@endif
				</div>
				@if($url)
					{!! get_field('include_custom_integration_text') ? get_field('custom_integration_text') : get_field('global_integration_text', 'option') !!}
				@endif
			</div>
		</div>
	</section>
</div>
<div class="container">
	<section>
		<div class="main-content">
			<div class="tabs" id="tabs">
				<a href="#" class="btn-content-toggle active" data-target="about">About {{ $name }}</a>
				<a href="#" class="btn-content-toggle" data-target="how-to">How To Get Started</a>
			</div>
			<div class="tabbed-wrapper">
				<div class="tabbed-content content-item active" data-name="about">
					<h2>About {{ $name }}</h2>
					@if (get_field('app_about'))
						<div class="generic-content" data-swiftype-name="body" data-swiftype-type="text">
							{!! get_field('app_about') !!}
						</div>
					@endif
					@if (get_field('app_include_gallery'))
						@php
							$images = get_field('app_screenshot_gallery');
							$count = 0;
						@endphp
						@if ($images)
							<div class="img-carousel">
								<div class="viewport">
									@foreach ($images as $image)
										@php $count++; @endphp
										<img {!! $count == 1 ? 'class="active"' : '' !!} src="{{ $image['url'] }}" data-name="img-{{ $count }}" alt="{{ $image['alt'] }}">
									@endforeach
								</div>
								<div class="controls">
									<div class="controls-wrap">
										<a href="#" class="btn-carousel btn-back disabled"></a>
										<div class="slides">
											@php $count = 0; @endphp
											@foreach ($images as $image)
												@php $count++; @endphp
												<a href="#" {!! $count == 1 ? 'class="active"' : '' !!}
												data-target="img-{{ $count }}"></a>
											@endforeach
										</div>
										<a href="#" class="btn-carousel btn-next"></a>
									</div>
								</div>
							</div>
						@endif
					@endif
				</div>
				<div class="tabbed-content content-item" data-name="how-to">
					<h2>How To Get Started</h2>
					@if (get_field('app_how_to_get_started'))
						<div class="generic-content">
							{!! get_field('app_how_to_get_started') !!}
						</div>
					@endif
          @if (get_field('web_2_lead_form'))
              @include('partials.integrations.get-started-form')
          @endif
				</div>
			</div>
		</div>
		<div class="details-bar">
			<div class="details">
				<h3>Details</h3>
				@if (get_field('third_party_app'))
					<div class="content-block">
						<span class="title third-party">3rd Party App</span>
						<p><a class="third-party-reveal" href="#">What's This</a></p>
						<div class="third-party-details">
							{!! get_field('app_custom_third_party_app_content') ? get_field('app_third_party_app_content') : get_field('integrations_third_party_app_description', 'option') !!}
						</div>
					</div>
				@endif
				@if (get_field('app_availability'))
					<div class="content-block">
						<span class="title">Availability</span>
						<p>{!! get_field('app_availability') !!}</p>
					</div>
				@endif
				@if (get_field('app_pricing_url'))
					<div class="content-block">
						<span class="title">Pricing</span>
						<p><a href="{{ get_field('app_pricing_url') }}" target="_blank" rel="noopener">See Pricing Info</a></p>
					</div>
				@endif
				@if (get_field('free_pricing'))
					<div class="content-block">
						<span class="title">Pricing</span>
						<p>Free</p>
					</div>
				@endif
			</div>
			<div class="content-wrap">
				<div class="help">
					<h3>Need Help?</h3>
					{!! get_field('include_custom_help_text') ? get_field('custom_help_text') : get_field('global_help_text', 'option') !!}
					<div class="contact-list">
						@if (have_rows('app_need_help_links'))
							@while (have_rows('app_need_help_links'))
							@php the_row() @endphp
								@if (get_sub_field('app_help_link_type') == 'email')
									<a href="mailto:{{ get_sub_field('app_help_email') }}" class="icon-email"><span>{{ get_sub_field('app_help_label') }}</span></a>
								@elseif (get_sub_field('app_help_link_type') == 'phone')
									<a href="tel:{{ get_sub_field('app_help_label') }}" class="icon-phone" target="_blank" rel="noopner"><span>{{ get_sub_field('app_help_label') }}</span></a>
								@else
									<a href="{{ get_sub_field('app_help_url') }}" class="icon-page" target="_blank" rel="noopener"><span>{{ get_sub_field('app_help_label') }}</span></a>
								@endif
						@endwhile
						@endif
					</div>
				</div>
				@if ($url)
					<a href="{{ $url }}" target="_blank" class="btn btn-primary btn-med btn-share" rel="noopner">{!! get_field('include_custom_help_button_text') ? '<p>' . get_field('custom_help_button_text') . '</p>' : get_field('global_help_button_text', 'option') !!}></a>
				@endif
				@if ($tags)
					<div class="tagged">
						<h3>Tagged</h3>
						@foreach ($tags as $tag)
							<span>{{ $tag->name }}</span>
						@endforeach
					</div>
				@endif
			</div>
		</div>
	</section>
</div>
<div class="container extras-container">
	<section>
		<div class="extras">
			@include('partials.integrations.med-length-cta')
			@php $reco_post = get_field('recommended_apps') @endphp
			@if ($reco_post)
				<div class="recommended">
					<p class="title">Recommended Apps For You</p>
					<div class="card-collection">
						@foreach ($reco_post as $post)
							@include ('partials.integrations.app-card', ['post' => $post])
						@endforeach
					</div>
				</div>
			@endif
		</div>
	</section>
</div>
