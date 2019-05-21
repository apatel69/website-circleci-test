{{--
  Template Name: Free Invoice Creator
--}}


@extends('layouts.app')
@section('content')
  @if(get_field('page_hero'))
    @include('partials/fc-content/free-invoice-creator/page-hero')
  @endif
  @if(get_field('free_invoice_creator_markup') == true)
    @include('partials/fc-content/free-invoice-creator/page-markup')
  @endif
  @if(get_field('include_centered_cta') == true)
    @include('partials/fc-content/free-invoice-creator/page-centered-content')
  @endif
  @if(get_field('include_invoice_templates') == true)
    @include('partials/fc-content/free-invoice-creator/two-col-content')
  @endif
  @if(get_field('include_jump_links') == true)
    @include('partials/fc-content/free-invoice-creator/jump-links') 
  @endif
  @php (the_row())
    @if (get_field('include_page_faqs') == true)
      @include('partials.fc-content.global.faq-accordion')
  @endif
  @if(get_field('include_footer_cta') == true)
    @include('partials/fc-content/free-invoice-creator/footer-cta') 
  @endif
  @include('partials/fc-content/free-invoice-creator/mobile-modal')

  
@endsection
