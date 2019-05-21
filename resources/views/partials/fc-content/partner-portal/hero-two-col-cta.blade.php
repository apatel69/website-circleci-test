<div class="container blue-background heroTwoColCta">
  	<section class="fullWidthLayout__content heroTwoColCta__content">
        <div class="heroTwoColCta__columnOne">
            @if(get_sub_field('hero_title'))
                <h1>{!! get_sub_field('hero_title') !!}</h1>
            @endif
            @if (get_sub_field('hero_description'))
                <p class="heroTwoColCta__description">{{ get_sub_field('hero_description') }}</p>
            @endif
            @if (get_sub_field('hero_cta'))
                @include ('partials.components.global-link', ['btn' => get_sub_field('hero_cta'), 'classes' => 'heroTwoColCta__button'])
            @endif
            @if (get_sub_field('hero_include_getapp'))
                @include('partials/fc-content/global/getapp')
            @endif
        </div>
        @if (get_sub_field('hero_image'))
            <div class="heroTwoColCta__columnTwo">
                @include('partials.components.global-image', ['img' => get_sub_field('hero_image') ])
            </div>
        @endif
	</section>
</div>