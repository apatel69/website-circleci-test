@while(have_rows('cta_download_templates')) @php(the_row())
    @if(get_sub_field('global_cta_download_templates'))
        @if (get_sub_field('global_override'))
            @php( $style_v2 = get_sub_field('style_v2') )
            @php( $hide_sales = get_sub_field('hide_sales') )
        @else
            @php( $style_v2 = get_field('style_v2', 'option') )
            @php( $hide_sales = get_field('hide_sales', 'option') )
        @endif

        <div class="container three-col-invoice-temp cta-invoice-temp {{ $style_v2 ? 'style-v2' : '' }} {{ $hide_sales ? 'hide-sales' : '' }}">
            <section>

                @php($title = get_sub_field('section_title') ? strtolower(preg_replace("/[^a-zA-Z]+/", "", get_sub_field('section_title'))) : 'cpy-cta-invoice-template')
                @if(get_sub_field('section_title'))
                    <h2 id="{{$title}}">{{ get_sub_field('section_title') }}</h2>
                @endif

                <div class="outer-content-wrapper">
                    @while(have_rows('global_cta_download_templates')) @php(the_row())
                        @if ( get_sub_field('title') || get_sub_field('image')['url'] )
                            <div class="three-col-invoice-temp__content-wrapper {{get_sub_field('is_premium') ? 'premium-panel' : ''}}">
                                <h3>{{ get_sub_field('title') }}</h3>

                                @if(get_sub_field('image'))
                                    @include('partials.components.global-image', ['img' => get_sub_field('image'),'classes' => 'thumbnail' ])
                                @endif
                                @if (get_sub_field('description'))
                                    <p class="three-col-invoice-temp__description">{!! get_sub_field('description') !!}</p>
                                @endif


                                @if(get_sub_field('download_links'))
                                    @while(have_rows('download_links')) @php(the_row())

                                        @if(get_sub_field('global_download_title'))
                                            <p class="three-col-invoice-temp__download-title subtext">{{ get_sub_field('global_download_title') }}</p>
                                        @endif
                                        <div class="three-col-invoice-temp__downloads-wrapper">
                                            @include('partials/fc-content/global/icon-template-download-links')
                                        </div>

                                    @endwhile
                                @endif


                                @if (get_sub_field('cta_btn'))
                                    @if(get_sub_field('btn_description'))
                                        <div class="premium-btn-description">
                                            <p>{{get_sub_field('btn_description')}}</p>
                                            <img class="cta-arrow" src="@asset('images/cta-arrow.svg')" alt="arrow pointing down">
                                        </div>
                                    @endif

                                    @include('partials.components.global-link', ['btn' => get_sub_field('cta_btn'), 'classes' => 'three-col-invoice-temp__cta-btn'])
                                @endif
                            </div>
                        @endif
                    @endwhile
                </div>

            </section>
        </div>

    @endif
@endwhile
