{{--
  Template Name: Accountants - Flexible Content
--}}

@extends('layouts.app')

@section('content')
  @if(  have_rows('flexible_content')  )
    
    @while (have_rows('flexible_content')) @php (the_row())
      @if(  get_row_layout() === 'accountants_hero'  )
        @include('partials/fc-content/accountants/accountants-hero')

      @elseif(  get_row_layout() === 'featured_in'  )
        @include('partials/fc-content/global/featured-in')

      @elseif(  get_row_layout() === 'feature_carousel'  )
        @include('partials/fc-content/global/content-carousel')

      @elseif(  get_row_layout() === 'three_col_title_content'  )
        @include('partials/fc-content/accountants/three-col-title-content')

      @elseif(  get_row_layout() === 'centered_img_content'  )
        @include('partials/fc-content/accountants/centered-img-content')
      
      @elseif(  get_row_layout() === 'accountants_cta_full_width'  )
        @include('partials/fc-content/accountants/accountants-cta-full-width')

      @elseif(  get_row_layout() === 'cta_download_templates'  )
        @include('partials/fc-content/global/cta-invoice-templates')
      
      @endif
      
    @endwhile

  @endif

@endsection