<div class="container cta-hero">
	<section class="cpy-hero">
		<div class="content">
			<div class="hero_intro_heading">
                @if (get_sub_field('hero_intro'))
                    <h1><strong>{{ get_sub_field('hero_intro') }}</strong></h1>
                @endif
                @if (get_sub_field('title'))
                    <h2>{{ get_sub_field('title') }}</h2>
                @endif
            </div>
            {!! get_sub_field('description') !!}
        </div>
        <div class="assurance-cta-subtext">
            @if (get_sub_field('cta_image'))
                <div class="cta-assurance">
                    @include('partials.components.global-image', ['img' => get_sub_field('cta_image')])
                </div>
            @endif
            @if (get_sub_field('cta') !== 'none')
                <div class="cta-subtext">
                    @include('partials.components.global-link', ['btn' => get_sub_field('cta')])
                </div>
            @endif
        </div>
    </section>
</div>
