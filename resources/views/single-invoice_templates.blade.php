@extends('layouts.app')

@php
    $counter = 0;
@endphp

@section('content')


    @if (get_field('hide_legacy_content') != "1")
        <div class="legacy-invoice-content">
            @include('partials.invoice-templates.hero')
            @include('partials.invoice-templates.breadcrumbs')
            @include('partials.content-single-'.get_post_type())
            @include('partials.invoice-templates.template-listing')
        </div>
    @endif


    @if(  have_rows('flexible_content')  )

        <div class="seo-modular-invoice-content">
            @while (have_rows('flexible_content')) @php (the_row())

                @if(  get_row_layout() === 'hero_columns'  )
                    @include('partials/invoice-templates/two-col-hero-htag-config')

                @elseif(  get_row_layout() === 'two_col_image_content'  )
                    @include('partials/fc-content/global/two-col-image-content', ['count' => $counter])
                    @php($counter++)

                @elseif(  get_row_layout() === 'jump_links'  )
                    @include('partials/fc-content/global/jump-links')

                @elseif(  get_row_layout() === 'cta_hero'  )
                    @include('partials/fc-content/pricing/cta-hero')

                @elseif(  get_row_layout() === 'main_image_centered'  )
                    @include('partials/fc-content/global/main-image-centered')

                @elseif(  get_row_layout() === 'two_column_video_feature'  )
                    @include('partials/fc-content/global/two-column-video-feature-cta')

                @elseif(  get_row_layout() === 'custom_footer_centered'  )
                    @include('partials/invoice-templates/custom-footer-centered')

                @elseif(  get_row_layout() === 'cta_full_width'  )
                    @include('partials/fc-content/global/cta-full-width')

                @elseif(  get_row_layout() === 'cta_download_templates'  )
                    @include('partials/fc-content/global/cta-invoice-templates')

                @endif

            @endwhile
        </div>
    @endif
@endsection
