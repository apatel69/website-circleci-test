<div class="container hero heroTwoCol">
  	<section id="cpy-hero">
        <div class="content heroTwoCol__content">
            @if(get_sub_field('hero_title'))
                <h1>{!! get_sub_field('hero_title') !!}</h1>
            @endif

            <div class="heroTwoCol__heroDescription">
                {!! get_sub_field('hero_description') !!}
            </div>
        </div>
        <div class="heroTwoCol__image">
            <picture>
                @if (get_sub_field('hero_image_mobile'))
                    <source srcset="{{get_sub_field('hero_image_mobile')['global_image']['url']}}" media="(max-width: 479px)">
                @endif
                @if (get_sub_field('hero_image_tablet'))
                    <source srcset="{{get_sub_field('hero_image_tablet')['global_image']['url']}}" media="(max-width: 1024px)">
                @endif
                @if(get_sub_field('hero_image_desktop'))
                    @include('partials.components.global-image', ['img' => get_sub_field('hero_image_desktop')])
                @endif
            </picture>
        </div>
        @if(get_sub_field('cta_or_signup') === 'signup')
            @include('partials.fc-content.global.hero-signup-form', ['signup_button_text' => get_sub_field('signup_button_text')])
        @elseif(get_sub_field('cta_or_signup') === 'cta')
            <div class="heroTwoCol__cta">
                @if (get_sub_field('cta'))
                    @include ('partials.components.global-link', ['btn' => get_sub_field('cta'), 'classes' => 'heroTwoCol__ctaBtn'])
                @endif
                @if (get_sub_field('details_text_to_hover'))
                    <div class="hoverBubble">
                        <p>{{ get_sub_field('details_text_to_hover') }}</p>
                        <div class="hoverBubble__content">
                            @if (get_sub_field('hovered_details_title'))
                                <h3>{{ get_sub_field('hovered_details_title') }}</h3>
                            @endif
                            @if (get_sub_field('hovered_details_content'))
                                <p>{{ get_sub_field('hovered_details_content') }}</p>
                            @endif
                        </div>
                    </div>
                @endif
            </div>
        @endif
	</section>
</div>
