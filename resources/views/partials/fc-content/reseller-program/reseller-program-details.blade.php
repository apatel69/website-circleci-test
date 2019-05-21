<div class="accounting-solutions container">
    <div class="blue-background">
        <div class="partner-details" id="{{get_sub_field('select_partner_program')['value']}}">
            <section class="program-info">
                @if(get_sub_field('title'))
                <h2>{{get_sub_field('title')}}</h2>
                @endif
                {!!get_sub_field('description')!!}
                @if(get_sub_field('cta'))
                    <div class="partner-cta">
                        @include('partials.components.global-link',['btn'=> get_sub_field('cta')])
                    </div>
                @endif
            </section>
            
            <hr />

            <section class="affiliate-reseller-details column-parent">
                <div class="affiliate-reseller-content">
                    @if(get_sub_field('two_column_title'))
                        <h3>{{ get_sub_field('two_column_title') }}</h3>
                    @endif
                    {!! get_sub_field('two_column_content') !!}
                </div>
                <div class="affiliate-price">
                    <div class="affiliate-price-container">
                        @if(get_sub_field('amount_supertext'))
                            <h4 class="affiliate-price-text">{{ get_sub_field('amount_supertext') }}</h4>
                        @endif
                        @if(get_sub_field('amount'))
                            <span class="affiliate-price-cost">{{ get_sub_field('amount') }}</span>
                        @endif
                        @if(get_sub_field('amount_subtext'))
                            <span class="affiliate-price-length">{!! get_sub_field('amount_subtext') !!}</span>
                        @endif
                    </div>
                </div>
            </section>
            
            <hr>
            
            <section class="affiliate-features-testimonial-details">
                @if(get_sub_field('benefits_title'))
                <h2>
                    {{ get_sub_field('benefits_title') }}
                </h2>
                @endif
                <div class="affiliate-features-testimonial column-parent">
                    @if(have_rows('benefits_list'))
                        <div class="affiliate-features column-parent">
                        @while(have_rows('benefits_list')) @php(the_row())
                            <div class="affiliate-feature">
                            @if(get_sub_field('image'))
                                @include('partials.components.global-image', ['img' => get_sub_field('image')])
                            @endif
                            @if(get_sub_field('title'))
                                <h4 class="affiliate-feature-headline">
                                {!!get_sub_field('title')!!}
                                </h4>
                            @endif
                            @if(get_sub_field('description'))
                                {!!get_sub_field('description')!!}
                            @endif
                            </div>
                        @endwhile
                        </div>
                    @endif
                    <div class="affiliate-testimonial">
                        @if(get_sub_field('testimonial_quote'))
                        <blockquote class="affiliate-testimonial-quote">{{get_sub_field('testimonial_quote')}}</blockquote>
                        @endif
                        @if(get_sub_field('testimonial_source'))
                        <div class="affiliate-testimonial-name-org">
                            <span class="affiliate-testimonial-name">{!!get_sub_field('testimonial_source')!!}</span>
                        </div>
                        @endif
                        @if(get_sub_field('testimonial_image'))
                        <div class="affiliate-img">
                            @include('partials.components.global-image', ['img' => get_sub_field('testimonial_image')])
                        </div>
                        @endif
                    </div>
                </div>
            </section>
        </div>
    </div>
</div>