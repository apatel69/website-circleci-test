{{--
  Template Name: Guides - Flexible Content
--}}

@extends('layouts.app')

@section('content')

    @if(  have_rows('flexible_content_layouts')  )
      
    @while (have_rows('flexible_content_layouts')) @php (the_row())
     
     @if(  get_row_layout() === 'hero_section_with_centered_title'  )
        @include('partials/fc-content/global/hero-with-title')

      @elseif(  get_row_layout() === 'cta_full_width'  )
        @include('partials/fc-content/global/cta-full-width')

      @elseif(  get_row_layout() === 'support_cta'  )
        @include('partials/fc-content/guides/support-cta')

      @elseif(  get_row_layout() === 'content_sidebar'  )
        @include('partials/fc-content/guides/content-sidebar')

      @elseif(  get_row_layout() === 'cta_download_templates'  )
        @include('partials/fc-content/global/cta-invoice-templates')

      @endif
      
    @endwhile

    @endif

@endsection