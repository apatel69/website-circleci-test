{{--
  Template Name: Our Story - Flexible Content
--}}

@extends('layouts.app')

@section('content')
    @if(  have_rows('flexible_content_layouts')  )
      
      @while (have_rows('flexible_content_layouts')) @php (the_row())
        @if(  get_row_layout() === 'hero_section_with_centered_title'  )
          @include('partials/fc-content/global/hero-with-title')

        @elseif(  get_row_layout() === 'sub_header_menu'  )
          @include('partials/fc-content/global/sub-header-menu')

        @elseif(  get_row_layout() === 'cta_full_width'  )
          @include('partials/fc-content/global/cta-full-width')
          
        @elseif(  get_row_layout() === 'centered_text'  )
          @include('partials/fc-content/global/centered-text')

        @elseif(  get_row_layout() === 'divider'  )
          @include('partials/fc-content/global/divider')
          
        @elseif(  get_row_layout() === 'two_col_content_timeline'  )
          @include('partials/fc-content/our-story/two-col-content-timeline')

        @elseif(  get_row_layout() === 'cta_full_width'  )
          @include('partials/fc-content/global/cta-full-width')

        @elseif(  get_row_layout() === 'cta_download_templates'  )
          @include('partials/fc-content/global/cta-invoice-templates')

        @endif
        
      @endwhile

    @endif

@endsection