{{--
Template Name: NFB Feature Education - Flexible Content
--}}

@extends('layouts.app')

@section('content')

@if(  have_rows('flexible_content')  )

    @while (have_rows('flexible_content')) @php (the_row())

        @if(  get_row_layout() === 'page_header'  )

        @include('partials/fc-content/nfb-feature-education/hero-with-cta')

        @elseif(  get_row_layout() === 'faq'  )
            @include('partials/fc-content/global/faq-accordion')

        @elseif(  get_row_layout() === 'cta_full_width_outline'  )
            @include('partials/fc-content/global/cta-full-width-outline')

        @elseif(  get_row_layout() === 'sub_navigation'  )
            @include('partials/fc-content/nfb-feature-education/sticky-nav')

        @elseif(  get_row_layout() === 'content_imageless_cta'  )
            @include('partials/fc-content/global/content-imageless-cta')

        @elseif(  get_row_layout() === 'two_column_video_feature'  )
            @include('partials/fc-content/global/two-column-video-feature-cta')

        @elseif(  get_row_layout() === 'testimonial'  )
            @include('partials/fc-content/nfb-feature-education/testimonial')

        @elseif(  get_row_layout() === 'two_column_cta'  )
            @include('partials/fc-content/nfb-feature-education/two-column-cta')

        @elseif(  get_row_layout() === 'three_column_content'  )
            @include('partials/fc-content/nfb-feature-education/three-column-content')

        @elseif(  get_row_layout() === 'two_col_support'  )
            @include('partials/fc-content/global/two-col-support')

        @elseif(  get_row_layout() === 'two_column_flexible_cta'  )
            @include('partials/fc-content/nfb-feature-education/two_column_flexible_cta')

        @elseif(  get_row_layout() === 'divider'  )
            @include('partials/fc-content/global/divider')

        @elseif(  get_row_layout() === 'equation_cta'  )
            @include('partials/fc-content/nfb-feature-education/equation_cta')
        
        @elseif(  get_row_layout() === 'cta_download_templates'  )
            @include('partials/fc-content/global/cta-invoice-templates')

        @endif
    @endwhile

@endif


<?php (wp_enqueue_script('crazyegg')); ?>
@endsection
