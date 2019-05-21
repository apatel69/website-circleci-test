<div class="container supportStats">
    <section class="fullWidthLayout__content">
        <div class="supportStats__statsContainer">
            @if (get_sub_field('section_title'))
                <h2>{{ get_sub_field('section_title') }}</h2>
            @endif
            <div class="supportStats__stats">
                @if (have_rows('stats'))
                    @while(have_rows('stats'))
                        @php(the_row())
                        @if (get_sub_field('stat'))
                            <div class="supportStats__stat">
                                    <h3>{{ get_sub_field('stat') }}</h3>
                                @if (get_sub_field('description'))
                                    <p>{!! get_sub_field('description') !!}</p>
                                @endif
                            </div>
                        @endif
                    @endwhile
                @endif
            </div>
        </div>
    </section>
</div>

<div class="container supportInfo">
    <section class="fullWidthLayout__content">
        <div class="supportInfo__container">
            <div class="supportInfo__content">
                @if (get_sub_field('support_section_title'))
                    <h2>{{ get_sub_field('support_section_title') }}</h2>
                @endif
                {!! get_sub_field('support_section_description') !!}
                @if (get_sub_field('support_phone') || get_sub_field('support_email'))
                <div class="supportInfo__contact">
                    @if (get_sub_field('support_phone'))
                        <p>T: {{ get_sub_field('support_phone') }}</p>
                    @endif
                    @if (get_sub_field('support_email'))
                    <p>E: <a href="mailto:{{ get_sub_field('support_email') }}">{{ get_sub_field('support_email') }}</a></p>
                    @endif
                </div>
                @endif
            </div>
            @if (get_sub_field('support_image'))
                <div class="supportInfo__image">
                    @include('partials.components.global-image', ['img' => get_sub_field('support_image')])
                </div>
            @endif
        </div>
    </section>
</div>