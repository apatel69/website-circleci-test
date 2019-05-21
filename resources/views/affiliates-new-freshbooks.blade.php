{{--
  Template Name: Affiliates New FreshBooks - Flexible Content
--}}

@extends('layouts.app')

@section('content')
  @if(  have_rows('flexible_content')  )
    
    @while (have_rows('flexible_content')) @php (the_row())
      @if(  get_row_layout() === 'affiliates_new_features_page_hero'  )
        @include('partials/fc-content/affiliates-new-freshbooks/affiliates-new-freshbooks-hero')

      @elseif(get_row_layout() === 'two_col_content_cta_image')
        @include('partials/fc-content/about/two-col-content-cta-image')

      @elseif(get_row_layout() === 'two_col_affiliates_details')
        @include('partials/fc-content/affiliates-new-freshbooks/two-col-affiliates-details')

      @elseif(get_row_layout() === 'three_col_benefits_section')
        @include('partials/fc-content/affiliates-new-freshbooks/three-col-benefits-section')

      @elseif(get_row_layout() === 'affiliates_testimonial')
        @include('partials/fc-content/affiliates-new-freshbooks/affiliates-testimonial')

      @elseif(get_row_layout() === 'two_col_features_section')
        @include('partials/fc-content/affiliates-new-freshbooks/two-col-features-section')

      @elseif(get_row_layout() === 'affiliate_image_content')
        @include('partials/fc-content/affiliates-new-freshbooks/affiliates-image-content')

      @elseif(get_row_layout() === 'divider_half_width')
        @include('partials/fc-content/affiliates-new-freshbooks/divider-with-padding')

      @elseif(get_row_layout() === 'affiliates_help_section')
        @include('partials/fc-content/affiliates-new-freshbooks/affiliates-help-section')

      @elseif(  get_row_layout() === 'cta_download_templates'  )
        @include('partials/fc-content/global/cta-invoice-templates')

      @endif
      
    @endwhile

  @endif

@endsection