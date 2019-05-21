{{--
  Template Name: Partner Page - Flexible Content
--}}

@extends('layouts.app')
@php
    $counter = 0;
    $trial_length = '';
    $abobeInsightsTrackingElement = '';
    $adobeInsightsExitLink = '';
    $isChasePayments = false;   
    $currentURL = $_SERVER['REQUEST_URI']; 
    if ($currentURL === "/chase-payments" || $currentURL === "/chasepayments") {
        $abobeInsightsTrackingElement = 'chaseanalytics-track-element';
        $adobeInsightsExitLink = 'chaseanalytics-opt-exlnk';
    }
@endphp
@section('content')
    @if(  have_rows('flexible_content')  )
        @while (have_rows('flexible_content')) @php (the_row())
            @if(  get_row_layout() === 'home_page_header'  )
                @include('partials/fc-content/global/hero-with-cta')
            @elseif(  get_row_layout() === 'content_carousel'  )
                @include('partials/fc-content/global/content-carousel')
            @elseif(  get_row_layout() === 'content_carousel'  )
                @include('partials/fc-content/global/content-carousel')  
            @elseif(  get_row_layout() === 'partner_call_out'  )
                @include('partials/fc-content/global/partner-call-out')    
            @elseif(  get_row_layout() === 'testimonial_columns'  )
                @include('partials/fc-content/global/testimonial-columns')
            @elseif(  get_row_layout() === 'three_col_content'  )
                @include('partials/fc-content/global/three-col-content')    
            @elseif(  get_row_layout() === 'partner_call_out'  )
                @include('partials/fc-content/global/partner-call-out')  
            @elseif(  get_row_layout() === 'getapp_widget'  )
                @include('partials/fc-content/global/getapp')
            @elseif(  get_row_layout() === 'cta_full_width_outline'  )
                @include('partials/fc-content/global/cta-full-width-outline')
            @elseif( get_row_layout() === 'support_full_width' )
                @include('partials/fc-content/global/support-full-width')
            @elseif(  get_row_layout() === 'cta_full_width'  )
                @include('partials/fc-content/global/cta-full-width')  
            @elseif(  get_row_layout() === 'cta_download_templates'  )
                @include('partials/fc-content/global/cta-invoice-templates')  
          @endif
          
          @php($counter++)
        @endwhile
  @endif
@endsection