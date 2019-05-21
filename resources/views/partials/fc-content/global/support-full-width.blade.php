<div class="container no-side-pad anchored-content">
        <section class="support">
            <div class="two-row-support">
                <div class="support-row">
                    @if (get_sub_field('content_header'))
                        <h2>{!! get_sub_field('content_header') !!}</h2>
                    @endif
                    {!! get_sub_field('content') !!}
                    @if (get_sub_field('contact_support_heading'))
                        <p class="support-heading"><strong>{{ get_sub_field('contact_support_heading') }}</strong></p>
                    @endif
                    <span class="contact-details">
                        @if (get_sub_field('support_phone'))
                            <p><a><span class="phone">{{ get_sub_field('support_phone') }}</span></a></p>
                        @endif
                        @if (get_sub_field('support_email'))
                            <p><a href="mailto:{{ get_sub_field('support_email') }}"><span class="email">{{ get_sub_field('support_email') }}</span></a></p>
                        @endif
                    </span>
                </div>
                <div class="support-row">
                    @if(get_sub_field('image'))
                        @include('partials.components.global-image', ['img' => get_sub_field('image'), 'classes' => 'content-img' . (get_sub_field('image_no_padding') ? 'no-pad' : '') . (get_sub_field('custom_image_class') ? get_sub_field('custom_image_class') : '')])
                    @endif
                    @if(get_sub_field('include_mobile_image'))
                        <div class="mobile-support-image">
                            <img src="{{ get_sub_field('mobile_image')['url'] }}" alt="">
                        </div>
                    @endif
                </div>
            </div>
        </section>
    </div>
