<div class="container twoColTestimonial">
    <section class="fullWidthLayout__content twoColTestimonial__container">
        @if (get_sub_field('testimonial_quote'))
            <div class="twoColTestimonial__quote">
                <blockquote>{!! get_sub_field('testimonial_quote') !!}</blockquote>
                @if (get_sub_field('testimonial_source'))
                    <div class="twoColTestimonial__source--desktop">
                        <p>{!! get_sub_field('testimonial_source') !!}</p>
                    </div>
                @endif
            </div>
        @endif
        @if (get_sub_field('testimonial_image'))
            <div class="twoColTestimonial__image--desktop">
                @include('partials.components.global-image', ['img' => get_sub_field('testimonial_image') ])
            </div>
        @endif
        @if (get_sub_field('testimonial_image') || get_sub_field('testimonial_source'))
            <div class="twoColTestimonial__imageSource--mobile">
                @if (get_sub_field('testimonial_image'))
                    <div class="twoColTestimonial__image--mobile">
                        @include('partials.components.global-image', ['img' => get_sub_field('testimonial_image') ])
                    </div>
                @endif
                @if (get_sub_field('testimonial_source'))
                    <div class="twoColTestimonial__source--mobile">
                        <p>{!! get_sub_field('testimonial_source') !!}</p>
                    </div>
                @endif
            </div>
        @endif
    </section>
</div>