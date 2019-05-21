{{--
  Template Name: Careers - Flexible Content
--}}

@extends('layouts.app')

@section('content')

    @if(  have_rows('flexible_content_layouts')  )
      
    @while (have_rows('flexible_content_layouts')) @php (the_row())
      @if(  get_row_layout() === 'hero_section_with_centered_title'  )
        @include('partials/fc-content/global/hero-with-title')

      @elseif(  get_row_layout() === 'sub_header_menu'  )
        @include('partials/fc-content/global/sub-header-menu')

      @elseif(  get_row_layout() === 'anchor_links_navigation'  )
        @include('partials/fc-content/global/anchor-links-nav')

      @elseif(  get_row_layout() === 'full_width_divider'  )
        @include('partials/fc-content/global/divider')

      @elseif(  get_row_layout() === 'job_listings'  )
        @include('partials/fc-content/careers/careers-jobs-listing')
        
      @elseif(  get_row_layout() === 'careers_two_col_intro'  )
        @include('partials/fc-content/careers/careers-two-col-intro')

      @elseif(  get_row_layout() === 'four_column_content_with_title'  )
        @include('partials/fc-content/careers/four-col-content')

      @elseif(  get_row_layout() === 'two_column_centered_content_image_at_bottom'  )
        @include('partials/fc-content/careers/two-col-centered')
      
      @elseif(  get_row_layout() === 'full_width_location_content_above_map'  )
        @include('partials/fc-content/careers/location-content')
        
      @elseif(  get_row_layout() === 'careers_employee_benefits'  )
        @include('partials/fc-content/careers/career-benefits')

      @elseif(  get_row_layout() === 'cta_full_width'  )
        @include('partials/fc-content/global/cta-full-width')

      @elseif(  get_row_layout() === 'cta_content_only'  )
        @include('partials/fc-content/global/centered-text')

      @elseif(  get_row_layout() === 'cta_download_templates'  )
        @include('partials/fc-content/global/cta-invoice-templates')

      @endif
      
    @endwhile

    @endif

@endsection