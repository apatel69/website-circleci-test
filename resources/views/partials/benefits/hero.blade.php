<div class="hero-background benefits">
    <section class="hero left-aligned-hero">
        <div class="hero-left">
            @if (get_field('hero_title'))
                <h1 class="hero-h1">{{ get_field('hero_title') }}</h1>
            @endif
            @if (get_field('hero_subheading'))
                <p class="heading-sub">{{ get_field('hero_subheading') }}</p>
            @endif
            <div class="hero-video">
                <a href="javascript:;" data-featherlight="#lightbox">
                    @if (get_field('video_thumbnail'))
                        @include('partials.components.global-image', ['img' => get_field('video_thumbnail'), 'classes' => 'video-thumbnail'])
                    @endif
                    @if (get_field('video_callout'))
                        <p class="hero-video-callout">{{ get_field('video_callout') }}<br>
                    @endif
                    @if (get_field('video_small_text'))
                        <small class="hero-video-smalltext">{{ get_field('video_small_text') }}</small></p>
                    @endif
                </a>
            </div>
        </div>
        <div class="hero-right">
            @if (get_field('hero_image'))
                @include('partials.components.global-image', ['img' => get_field('hero_image'), 'classes' => 'hero-image'])
            @endif
        </div>
    </section>
</div>
@include('partials.benefits.lightbox')