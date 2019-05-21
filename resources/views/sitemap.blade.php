{{--
  Template Name: Sitemap - Flexible Content
--}}

@extends('layouts.app')

@section('content')
  @if(  have_rows('flexible_content')  )
    
    @while (have_rows('flexible_content')) @php (the_row())
      @if(  get_row_layout() === 'sitemap_hero'  )
        @include('partials/fc-content/global/hero-with-title')

      @elseif(  get_row_layout() === 'sitemap_content'  )
        @include('partials/fc-content/sitemap/sitemap-content')

      @elseif(  get_row_layout() === 'cta_download_templates'  )
        @include('partials/fc-content/global/cta-invoice-templates')

      @endif
      
    @endwhile

  @endif

@endsection