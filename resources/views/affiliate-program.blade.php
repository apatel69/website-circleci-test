{{--
  Template Name: Affiliate Program - Flexible Content
--}}

@extends('layouts.app')

@section('content')
  
@if(  have_rows('flexible_content')  )
  
    @while (have_rows('flexible_content')) @php (the_row())

      @if(  get_row_layout() === 'affiliate_hero'  )
        @include('partials/fc-content/affiliate-program/affiliate-hero')

      @elseif(  get_row_layout() === 'affiliate_commission_details_section'  )
        @include('partials/fc-content/affiliate-program/affiliate-commission-details-section')

      @elseif(  get_row_layout() === 'two_col_image_content'  )
        @include('partials/fc-content/affiliate-program/two-col-image-content')
      
      @elseif(  get_row_layout() === 'faq_accordion'  )
        @include('partials/fc-content/global/faq-accordion')

      @elseif(  get_row_layout() === 'cta_full_width'  )
        @include('partials/fc-content/global/cta-full-width')  

      @elseif(  get_row_layout() === 'featured_in'  )
        @include('partials/fc-content/global/featured-in')

      @elseif(  get_row_layout() === 'cta_download_templates'  )
        @include('partials/fc-content/global/cta-invoice-templates')

      @endif
      
    @endwhile

@endif

@endsection