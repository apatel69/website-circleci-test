<div class="container hero">
	<section id="cpy-hero">
		<div class="two-col">
            <div class="content">
                @if (is_tax())
                    @if (get_field('accounting_software_hero_title', 'option'))
                        <h1>{{ get_field('accounting_software_hero_title', 'option') }}</h1>
                    @endif
                    @if (get_field('accounting_software_hero_content', 'option'))
                        <p>{{ get_field('accounting_software_hero_content', 'option') }}</p>
                    @endif
                @else
                    @if (get_field('hero_title'))
                        <h1>{{ get_field('hero_title') }}</h1>
                    @endif
                    @if (get_field('hero_content'))
                        {!! get_field('hero_content') !!}
                    @endif
                @endif
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
            </div>
            <div class="hero-image">
                @if (get_field('accounting_software_hero_image', 'option'))
                    @php($hero_image = get_field('accounting_software_hero_image', 'option'))
                    <picture>
                        <source media="(max-width: 768px)" srcset="{{ $hero_image['global_image']['url'] ? $hero_image['global_image']['url'] . ',' : '' }} {{ $hero_image['global_retina_image']['url'] ? $hero_image['global_retina_image']['url'] . ' 2x' : '' }}">
                        @include('partials.components.global-image', ['img' => $hero_image])
                    </picture>
                @endif
            </div>
        </div>
	</section>
</div>
<div class="rule"></div>
