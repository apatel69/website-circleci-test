<div class="container hero-bg-img hero-short">
	<section class="cpy-hero">
        <div class="content">
            @if (get_sub_field('title'))
                <h1>{!! get_sub_field('title') !!}</h1>
            @endif
            {!! get_sub_field('description') !!}
        </div>        
        <div class="assurance-cta-subtext">
            @if (get_sub_field('cta_image'))            
                <div class="cta-assurance">
                    @include('partials.components.global-image', ['img' => get_sub_field('cta_image')])        
                </div>
            @endif
            @if (get_sub_field('cta'))
                <div class="cta-subtext">
                    @include('partials.components.global-link', ['btn' => get_sub_field('cta')])
                </div>
            @endif
        </div>
	</section>
</div>
