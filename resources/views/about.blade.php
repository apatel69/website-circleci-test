{{--
  Template Name: About - Flexible Content
--}}

@extends('layouts.app')

@section('content')
  @if(  have_rows('flexible_content')  )
    
    @while (have_rows('flexible_content')) @php (the_row())
      @if(  get_row_layout() === 'about_hero'  )
        @include('partials/fc-content/global/hero-with-title')

      @elseif(get_row_layout() === 'two_col_content_cta_image')
        @include('partials/fc-content/about/two-col-content-cta-image')

      @elseif(get_row_layout() === 'three_col_fact_data')
        @include('partials/fc-content/about/three-col-fact-data')

      @elseif(get_row_layout() === 'three_col_news_section')
        @include('partials/fc-content/about/three-col-news-section')

      @elseif(get_row_layout() === 'divider')
        @include('partials/fc-content/global/divider')

      @elseif(get_row_layout() === 'centered_text')
        @include('partials/fc-content/global/centered-text')

      @elseif(get_row_layout() === 'sub_header_menu')
        @include('partials/fc-content/global/sub-header-menu')

      @elseif(  get_row_layout() === 'cta_full_width'  )
        @include('partials/fc-content/global/cta-full-width')

      @elseif(  get_row_layout() === 'cta_download_templates'  )
        @include('partials/fc-content/global/cta-invoice-templates')

      @endif
      
    @endwhile

  @endif

@endsection