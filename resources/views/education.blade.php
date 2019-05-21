{{--
  Template Name: Education - Flexible Content
--}}

@extends('layouts.app')

@section('content')
  @if(  have_rows('flexible_content')  )
    
    @while (have_rows('flexible_content')) @php (the_row())
      @if(  get_row_layout() === 'education_hero'  )
        @include('partials/fc-content/education/education-hero')

      @elseif(  get_row_layout() === 'featured_in'  )
        @include('partials/fc-content/global/featured-in')

      @elseif(  get_row_layout() === 'feature_carousel'  )
        @include('partials/fc-content/global/content-carousel')

      @elseif(  get_row_layout() === 'two_col_content_form'  )
        @include('partials/fc-content/education/two-col-content-form')

      @elseif(  get_row_layout() === 'testimonial'  )
        @include('partials/fc-content/education/testimonial')
        
      @elseif(  get_row_layout() === 'school_logos'  )
        @include('partials/fc-content/education/schoolgraphiclist')

      @elseif(  get_row_layout() === 'passion'  )
        @include('partials/fc-content/education/passion')

      @elseif(  get_row_layout() === 'video'  )
        @include('partials/fc-content/education/video')
        
      @elseif(  get_row_layout() === 'three_col_education_content'  )
        @include('partials/fc-content/education/three-col-education-content')
        
      @elseif(  get_row_layout() === 'school_name_text_list'  )
        @include('partials/fc-content/education/schooltextlist')
      
      @elseif(  get_row_layout() === 'education_cta_full_width'  )
        @include('partials/fc-content/education/education-cta-full-width')

      @elseif(  get_row_layout() === 'cta_download_templates'  )
        @include('partials/fc-content/global/cta-invoice-templates')

      @endif
      
    @endwhile

  @endif

@endsection