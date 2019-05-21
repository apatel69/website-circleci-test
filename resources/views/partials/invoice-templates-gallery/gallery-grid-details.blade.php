@if ( get_sub_field('title') || get_sub_field('image')['url'] )
    <div 
        class="three-col-invoice-temp__content-wrapper {{get_sub_field('is_premium') ? 'premium-panel' : ''}}"
    >
        <h3>{{ get_sub_field('title') }}</h3>

        @if(get_sub_field('image'))
            <button class="gallery-modal">
                @include('partials.components.global-image', ['img' => get_sub_field('image'),'classes' => 'thumbnail' ])
            </button>

            <!-- Modal -->
            <div class="success-state success-modal">
                <div class="success-modal-content">
                    <div class="success-modal-close btn">
                        &times;
                    </div>

                    @include('partials.components.global-image', ['img' => get_sub_field('image'),'classes' => 'modal-img' ])

                    <p class="success-modal-close">
                        Close window
                    </p>
                </div>
            </div>
        @endif


        @if(get_sub_field('download_links'))
            @while(have_rows('download_links')) @php the_row(); @endphp
                <div class="three-col-invoice-temp__downloads-wrapper">
                    @include('partials/fc-content/global/icon-template-download-links')
                </div>
            @endwhile
        @endif


        @if (get_sub_field('cta_btn'))
            @include('partials.components.global-link', ['btn' => get_sub_field('cta_btn'), 'classes' => 'three-col-invoice-temp__cta-btn'])
        @endif
    </div>
@endif