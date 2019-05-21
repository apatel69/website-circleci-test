{{--
  Template Name: About Team - Flexible Content
--}}

@extends('layouts.app')

@section('content')

@if(  have_rows('flexible_content_layouts')  )
  
    @while (have_rows('flexible_content_layouts')) @php (the_row())

        @if(  get_row_layout() === 'hero_section'  )
            @include('partials/fc-content/global/hero-with-title')

        @elseif(  get_row_layout() === 'sub_header_menu'  )
            @include('partials/fc-content/global/sub-header-menu')
        
        @elseif(  get_row_layout() === 'anchor_links_navigation'  )
            @include('partials/fc-content/global/anchor-links-nav')

        @elseif(  get_row_layout() === 'executive_team'  )
            @include('partials/fc-content/team/executive-members')

        @elseif(  get_row_layout() === 'freshbookers'  )
            @include('partials/fc-content/team/freshbookers')

        @elseif(  get_row_layout() === 'cta_full_width'  )
            @include('partials/fc-content/global/cta-full-width')
        
        @elseif(  get_row_layout() === 'centered_text'  )
            @include('partials/fc-content/global/centered-text')

        @elseif(  get_row_layout() === 'full_width_divider'  )
            @include('partials/fc-content/global/divider')

        @elseif(  get_row_layout() === 'cta_download_templates'  )
            @include('partials/fc-content/global/cta-invoice-templates')

        @endif
  
    @endwhile

@endif


@endsection