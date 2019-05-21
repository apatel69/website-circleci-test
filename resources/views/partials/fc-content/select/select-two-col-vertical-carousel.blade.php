<section class="features-carousel">
    <div class="container">

        @if(get_sub_field('title'))
            <h2>{{ get_sub_field('title') }}</h2>
        @endif

        {!! get_sub_field('description') !!}

        <div class="new-features-desktop column-parent">
            @if(have_rows('feature_details_list'))
                <div class="new-feature-details">
                    @while(have_rows('feature_details_list'))
                        @php(the_row())
                        <div class="new-feature-detail {{get_row_index()==1?'selected':''}}">
                            @if(get_sub_field('feature_title'))
                                <h4>{{ get_sub_field('feature_title') }}</h4>
                            @endif
                            {!! get_sub_field('feature_description') !!}
                            @if(get_sub_field('feature_link'))
                                @include('partials.components.global-link', ['btn' => get_sub_field('feature_link'), 'classes' => 'new-feature-url'])
                            @endif
                        </div>
                    @endwhile
                </div>
            @endif
            @if(have_rows('feature_images_list'))
                @php($dot_count = 0)
                <div class="new-feature-carousel">
                    <div class="new-feature-screens">
                        @while(have_rows('feature_images_list'))
                            @php(the_row())
                            <picture>
                                <source srcset="{{get_sub_field('feature_image')['global_image']['url']}}" media="(max-width: 480px)">
                                @if(get_sub_field('feature_image'))
                                    @include('partials.components.global-image', ['img' => get_sub_field('feature_image'),'classes' => get_row_index()==1?'new-feature-screen selected':'new-feature-screen' ])
                                @endif
                            </picture>
                            @php($dot_count++)
                        @endwhile
                    </div>
                    <div class="features-nav column-parent">
                        <a href="#" class="left-arrow arrow">
                            <svg viewBox="0 0 9.61 16.4">
                            <polygon points="8.07 16.4 0 8.04 8.21 0 9.61 1.42 2.82 8.08 9.51 15.02 8.07 16.4" /></svg>
                        </a>
                        <div class="nav-dots column-parent">
                            @for($i = 1; $i <= $dot_count; $i++)
                                <a href="#" class="nav-dot {{ $i > 1 ? '' : 'selected' }}">
                                    <svg viewBox="0 0 12 12">
                                    <circle cx="6" cy="6" r="6" /></svg>
                                </a>
                            @endfor
                        </div>
                        <a href="#" class="right-arrow arrow active">
                            <svg viewBox="0 0 9.61 16.4">
                            <polygon points="1.54 0 9.61 8.36 1.4 16.4 0 14.98 6.79 8.32 0.1 1.38 1.54 0" /></svg>
                        </a>
                    </div>
                </div>
            @endif
        </div>

        @if(have_rows('feature_mobile_images_details_list'))
            <div class="new-features-mobile hide-desktop">
                @while(have_rows('feature_mobile_images_details_list'))
                    @php(the_row())
                    <div class="new-feature">
                        <picture>
                            <source srcset="{{get_sub_field('feature_mobile_images')['global_image']['url']}}" media="(max-width: 480px)">
                            @include('partials.components.global-image', ['img' => get_sub_field('feature_mobile_images')])
                        </picture>
                        @if(get_sub_field('feature_mobile_title'))
                            <h4>{{ get_sub_field('feature_mobile_title') }}</h4>
                        @endif
                        {!! get_sub_field('feature_mobile_description') !!}
                        @if(get_sub_field('feature_mobile_link'))
                            @include('partials.components.global-link', ['btn' => get_sub_field('feature_mobile_link'), 'classes' => 'new-feature-url'])
                        @endif
                    </div>
                @endwhile
            </div>
        @endif

    </div>
</section>
