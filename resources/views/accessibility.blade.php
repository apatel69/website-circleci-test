{{--
  Template Name: Accessibility - Flexible Content
--}}

@extends('layouts.app')

@section('content')

  @if(  have_rows('flexible_content_layouts')  )
    
    @while (have_rows('flexible_content_layouts')) @php (the_row())

      @if(  get_row_layout() === 'hero_section_with_centered_title'  )
        @include('partials/fc-content/global/hero-with-title')

      @elseif(  get_row_layout() === 'content_section'  )
        @include('partials/fc-content/accessibility/content-section')

      @elseif(  get_row_layout() === 'cta_row'  )
        @include('partials/fc-content/accessibility/cta-row')

      @elseif(  get_row_layout() === 'divider'  )
        @include('partials/fc-content/divider')

      @elseif(  get_row_layout() === 'cta_download_templates'  )
        @include('partials/fc-content/global/cta-invoice-templates')

      @endif
      
    @endwhile

  @endif

@endsection