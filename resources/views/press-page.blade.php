{{--
  Template Name: Press - Flexible Content
--}}

@extends('layouts.app')

@section('content')
  @if(  have_rows('flexible_content_layouts')  )
    
    @while (have_rows('flexible_content_layouts')) @php (the_row())
      @if(  get_row_layout() === 'hero_section_with_centered_title'  )
        @include('partials/fc-content/global/hero-with-title', ['page' => 'press'])

      @elseif(get_row_layout() === 'divider')
        @include('partials/fc-content/global/divider')

      @elseif(get_row_layout() === 'centered_text')
        @include('partials/fc-content/global/centered-text')

      @elseif(get_row_layout() === 'sub_header_menu')
        @include('partials/fc-content/global/sub-header-menu')

      @elseif(  get_row_layout() === 'cta_full_width'  )
        @include('partials/fc-content/global/cta-full-width')

      @elseif(  get_row_layout() === 'anchor_links_navigation'  )
          @include('partials/fc-content/global/anchor-links-nav')

      @elseif(  get_row_layout() === 'recent_posts_listing'  )
          @include('partials/fc-content/press/recent-post-listing')

      @elseif(  get_row_layout() === 'post_listing'  )
          @include('partials/fc-content/press/post-listing')

      @elseif(  get_row_layout() === 'awards_list'  )
          @include('partials/fc-content/press/awards-list')

      @elseif(  get_row_layout() === 'resources'  )
          @include('partials/fc-content/press/resources')

      @elseif(  get_row_layout() === 'cta_download_templates'  )
          @include('partials/fc-content/global/cta-invoice-templates')

      @endif
      
    @endwhile

  @endif

@endsection