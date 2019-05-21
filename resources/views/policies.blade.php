{{--
  Template Name: Policies - Flexible Content
--}}

@extends('layouts.app')

@section('content')
  
  @if(  have_rows('flexible_content_layouts')  )
  
    @while (have_rows('flexible_content_layouts')) @php (the_row())
      
      @if(  get_row_layout() === 'content_sidebar'  )
        @include('partials/fc-content/policies/content-sidebar')

      @elseif(  get_row_layout() === 'divider'  )
        @include('partials/fc-content/divider')

      @elseif(  get_row_layout() === 'cta_download_templates'  )
        @include('partials/fc-content/global/cta-invoice-templates')

      @endif
      
    @endwhile

  @endif

@endsection