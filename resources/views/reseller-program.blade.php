{{--
  Template Name: Reseller Program - Flexible Content
--}}

@extends('layouts.app')

@section('content')
  @if(have_rows('flexible_content'))
    
    @while (have_rows('flexible_content')) @php (the_row())
      @if(get_row_layout() === 'partner_program_faq')
        @include('partials/fc-content/global/faq-accordion')

      @elseif(get_row_layout() === 'partner_program_hero')
        @include('partials/fc-content/reseller-program/partner-program-hero')

      @elseif(get_row_layout() === 'offers_title_content')
        @include('partials/fc-content/reseller-program/offers-title-content')

      @elseif(get_row_layout() === 'reseller_program_details')
        @include('partials/fc-content/reseller-program/reseller-program-details')

      @elseif(get_row_layout() === 'three_col_freshbooks_partner_section')
        @include('partials/fc-content/reseller-program/three-col-partner-section')

      @elseif(get_row_layout() === 'partner_form')
        @include('partials/fc-content/reseller-program/reseller-form')

      @elseif(get_row_layout() === 'cta_download_templates')
        @include('partials/fc-content/global/cta-invoice-templates')

      @endif
      
    @endwhile

  @endif

@endsection