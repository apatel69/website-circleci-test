{{--
  Template Name: Philosophy - Flexible Content
--}}

@extends('layouts.app')

@section('content')
  
  @if(  have_rows('flexible_content_layouts')  )
    
    @while (have_rows('flexible_content_layouts')) @php (the_row())
      @if(  get_row_layout() === 'hero_section_with_centered_title'  )
        @include('partials/fc-content/global/hero-with-title')

      @elseif(  get_row_layout() === 'sub_header_menu'  )
        @include('partials/fc-content/global/sub-header-menu')

      @elseif(  get_row_layout() === 'full_width_divider'  )
        @include('partials/fc-content/global/divider')

      @elseif(  get_row_layout() === 'four_column_content_with_image'  )
        @include('partials/fc-content/philosophy/four-col-content')

      @elseif(  get_row_layout() === 'centered_text'  )
        @include('partials/fc-content/global/centered-text')

      @elseif(  get_row_layout() === 'cta_full_width'  )
        @include('partials/fc-content/global/cta-full-width')

      @elseif(  get_row_layout() === 'cta_full_width_outline'  )
        @include('partials/fc-content/global/cta-full-width-outline')

      @elseif(  get_row_layout() === 'profile_example'  )
        @include('partials/fc-content/philosophy/profile-example')

      @elseif(  get_row_layout() === 'flip_cards_section'  )
        @include('partials/fc-content/philosophy/flip-cards')

      @elseif(  get_row_layout() === 'twitter_testimonials'  )
        @include('partials/fc-content/philosophy/twitter-testimonials')

      @elseif(  get_row_layout() === 'cta_download_templates'  )
        @include('partials/fc-content/global/cta-invoice-templates')

    @endif
      
    @endwhile

  @endif

@endsection