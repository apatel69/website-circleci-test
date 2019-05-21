<style>
    .bg-img {
        background-image: linear-gradient(rgba(0,96,175,0.76), rgba(0,96,175,0.76)), url({{ get_field('hero_background_image')['url'] }});
    }
</style>

<div class="container hero-bg-img hero-short bg-img">
	<section class="cpy-hero">
		<div class="content">
            @if (get_field('hero_title'))
			    <h1>{{ get_field('hero_title') }}</h1>
            @endif
            {!! get_field('hero_content') !!}
        </div>
        <div class="cta-mobile">
            @if (get_field('accounting_software_hero_cta', 'option'))
                <div class="cta">
                    @include ('partials.components.global-link', ['btn' => get_field('accounting_software_hero_cta', 'option')])
                </div>
            @endif
            <div class="cta-mobile-buttons">
                @include('partials.components.global-mobile-apps')
    	    </div>
            @if (get_field('accounting_software_hero_cta_image', 'option'))
                @php ($image = get_field('accounting_software_hero_cta_image', 'option'))
                <div class="cta-join-image">
                    <img src="{{ $image['url'] }}" alt="{{ $image['alt'] }}">
                </div>
            @endif
        </div>
	</section>
</div>
<div class="rule"></div>