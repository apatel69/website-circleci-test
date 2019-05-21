{{--
  Template Name: Contact - Flexible Content
--}}

@extends('layouts.app')

@section('content')

    @if(  have_rows('flexible_content')  )
      
    @while (have_rows('flexible_content')) @php (the_row())
     
     @if(  get_row_layout() === 'hero'  )
        @include('partials/fc-content/global/hero-with-title')

      @elseif(  get_row_layout() === 'main_content_block'  )
        @include('partials/fc-content/contact/content-block')

      @elseif(  get_row_layout() === 'cta_download_templates'  )
        @include('partials/fc-content/global/cta-invoice-templates')

      @endif
      
    @endwhile

    @endif

@endsection