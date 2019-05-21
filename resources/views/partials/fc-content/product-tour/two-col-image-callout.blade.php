<div class="callout container">
	<section class="callout__wrapper callout__content{{ get_sub_field('layout') }}">
			<div class="callout__content">
				@if (get_sub_field('content_title'))
					<h3>{{ get_sub_field('content_title') }}</h3>
				@endif
				{!! get_sub_field('content_desc') !!}
                @if (get_sub_field('cta'))
                    @include('partials.components.global-link', ['btn' => get_sub_field('cta'), 'classes' => 'full-width-cta'])
                @endif
			</div>
            @if (get_sub_field('callout_image'))
                <div class="callout__image">
                    @include('partials.components.global-image', ['img' => get_sub_field('callout_image')])
                </div>
            @endif
	</section>
</div>
