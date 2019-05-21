{{--
  Template Name: Webinars - Flexible Content
--}}

@extends('layouts.app')

@section('content')
  @if(  have_rows('flexible_content')  )
    
    @while (have_rows('flexible_content')) @php (the_row())
      @if(  get_row_layout() === 'cta_full_width'  )
        @include('partials/fc-content/global/cta-full-width')

      @elseif(  get_row_layout() === 'webinars_hero'  )
        @include('partials/fc-content/webinars/webinars-hero')

      @elseif(  get_row_layout() === 'two_col_question_section'  )
        @include('partials/fc-content/webinars/two-col-question-section')

      @elseif(  get_row_layout() === 'cta_download_templates'  )
        @include('partials/fc-content/global/cta-invoice-templates')
      
      @endif
      
    @endwhile

  @endif

@endsection