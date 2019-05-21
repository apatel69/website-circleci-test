{{--
  Template Name: Compare - Flexible Content
--}}

@extends('layouts.app')

@section('content')
  
@if(  have_rows('flexible_content')  )
  
    @while (have_rows('flexible_content')) @php (the_row())
      
      @if(  get_row_layout() === 'cta_hero'  )
        @include('partials/fc-content/compare/cta-hero')

      @elseif(  get_row_layout() === 'divider_med_length'  )
        @include('partials/fc-content/global/divider-med-length')

      @elseif(  get_row_layout() === 'cta_full_width'  )
        @include('partials/fc-content/global/cta-full-width')

      @elseif(  get_row_layout() === 'three_col_content'  )
        @include('partials/fc-content/compare/three-col-content')

      @elseif(  get_row_layout() === 'compare_list'  )
        @include('partials/fc-content/compare/compare-list')

      @elseif(  get_row_layout() === 'award_list'  )
        @include('partials/fc-content/compare/award-list')

      @elseif(  get_row_layout() === 'contact_cta'  )
        @include('partials/fc-content/compare/contact-cta')

      @elseif(  get_row_layout() === 'getapp'  )
        @include('partials/fc-content/global/getapp')

      @elseif(  get_row_layout() === 'cta_download_templates'  )
        @include('partials/fc-content/global/cta-invoice-templates')
      
      @endif
      
    @endwhile

@endif

@endsection