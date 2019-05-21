<section class="addons addons-header">
	<div class="addons-title">
        @if (get_field('addon_logo'))
			<div class="logo">
                @include('partials.components.global-image', ['img' => get_field('addon_logo')])
			</div>
        @endif
		<h1>{{ get_the_title() }}</h1>
        @if (get_field('company_name') && get_field('company_website'))
		by <a class="website" href="{{ get_field('company_website') }}">{{ get_field('company_name') }}</a>
        @endif
	</div>
    @if (get_field('description_summary'))
        <div class="description">
            {{ get_field('description_summary') }}
        </div>
    @endif
    <div class="meta">
        {!! get_field('meta_content') !!}
	</div>
</section>