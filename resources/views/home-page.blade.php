{{--
  Template Name: Home - Flexible Content
--}}

@extends('layouts.app')

@php
    $counter = 0;
@endphp

@section('content')

    @if(  have_rows('flexible_content')  )

    @while (have_rows('flexible_content')) @php (the_row())
      @if(  get_row_layout() === 'home_page_header'  )
        @include('partials/fc-content/global/hero-with-cta')

      @elseif(  get_row_layout() === 'sub_header_menu'  )
        @include('partials/fc-content/global/sub-header-menu')

      @elseif(  get_row_layout() === 'main_content_centered'  )
        @include('partials/fc-content/global/main-content-centered')

      @elseif(  get_row_layout() === 'two_col_image_content'  )
        @include('partials/fc-content/global/two-col-image-content')

      @elseif(  get_row_layout() === 'cta_full_width'  )
        @include('partials/fc-content/global/cta-full-width')

      @elseif(  get_row_layout() === 'featured_in'  )
        @include('partials/fc-content/global/featured-in')

      @elseif(  get_row_layout() === 'cta_tablet_and_mobile_only'  )
        @include('partials/fc-content/home/centered-cta-devices-only')

      @elseif(  get_row_layout() === 'three_col_content'  )
        @include('partials/fc-content/home/three-col-content')

      @elseif(  get_row_layout() === 'content_carousel'  )
        @include('partials/fc-content/global/content-carousel')

      @elseif(  get_row_layout() === 'testimonial_columns'  )
        @include('partials/fc-content/global/testimonial-columns')

      @elseif(  get_row_layout() === 'cta_full_width_outline'  )
        @include('partials/fc-content/global/cta-full-width-outline')

      @elseif(  get_row_layout() === 'two_col_cta'  )
        @include('partials/fc-content/home/two-col-cta')

      @elseif(  get_row_layout() === 'background_image_full_width'  )
        @include('partials/fc-content/home/background-image-full-width')

      @elseif(  get_row_layout() === 'two_col_addon_section'  )
        @include('partials/fc-content/home/two-col-addon-section')

      @elseif(  get_row_layout() === 'divider'  )
        @include('partials/fc-content/global/divider')

      @elseif(  get_row_layout() === 'two_col_support'  )
        @include('partials/fc-content/global/two-col-support')

      @elseif(  get_row_layout() === 'sticky_nav'  )
        @include('partials/fc-content/home/sticky-nav')

      @elseif(  get_row_layout() === 'cta_download_templates'  )
        @include('partials/fc-content/global/cta-invoice-templates')

      @endif

      @php($counter++)
    @endwhile

    @endif

@endsection
