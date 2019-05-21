<div class="footer-sign-up-background">
    <section class="footer-sign-up u-bg-blue">
        <div class="u-wrapper">
            @if (get_field('cta_header'))
                <h2 class="section-heading-secondary">{{ get_field('cta_header') }}</h2>
            @endif
            @if (get_field('cta_subheader'))
                <p class="footer-sign-up-sub">{{ get_field('cta_subheader') }}</p>
            @endif
            @include('partials.benefits.subscribe-form')
        </div>
    </section>

    <div class="featured-logos-container">
        <div class="awards-container">
            <section class="section-feature section-awards">
                @if (have_rows('awards'))
                    <div class="awards-left">
                        @while(have_rows('awards')) @php(the_row())
                            @if (get_sub_field('award_image'))
                                @include('partials.components.global-image', ['img' => get_sub_field('award_image') ])
                            @endif
                        @endwhile
                    </div>
                @endif
                <div class="awards-right">
                    @if (get_field('app_store_rating_header'))
                        <span>{{ get_field('app_store_rating_header') }}</span>
                    @endif
                    @if (get_field('app_store_rating_image'))
                        @include('partials.components.global-image', ['img' => get_field('app_store_rating_image'), 'classes' => 'awards-app-stars'])
                    @endif
                </div>
            </section>
        </div>
    </div>
</div>