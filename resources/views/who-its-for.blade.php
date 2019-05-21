{{--
  Template Name: Who It's For - Flexible Content
--}}

@extends('layouts.app')

@section('content')

    @if(  have_rows('flexible_content')  )
      
      @while (have_rows('flexible_content')) @php (the_row())
        @if(  get_row_layout() === 'page_header'  )
          @include('partials/fc-content/global/hero-with-cta')

        @elseif(  get_row_layout() === 'centered_text'  )
          @include('partials/fc-content/global/centered-text')

        @elseif(  get_row_layout() === 'divider'  )
          @include('partials/fc-content/global/divider')

        @elseif(  get_row_layout() === 'cta_full_width'  )
          @include('partials/fc-content/global/cta-full-width')

        @elseif(  get_row_layout() === 'featured_in'  )
          @include('partials/fc-content/global/featured-in')

        @elseif(  get_row_layout() === 'two_col_fixed_content'  )
          @include('partials/fc-content/who-its-for/two-col-fixed-content')

        @elseif(  get_row_layout() === 'cta_download_templates'  )
          @include('partials/fc-content/global/cta-invoice-templates')

        @endif
        
      @endwhile

    @endif

@endsection