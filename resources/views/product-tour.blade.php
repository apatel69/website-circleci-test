{{--
  Template Name: Product Tour - Flexible Content
--}}

@extends('layouts.app')

@section('content')

    @if(  have_rows('flexible_content')  )

    @php($counter = 1)

      @while (have_rows('flexible_content')) @php (the_row())
        @if(  get_row_layout() === 'page_header'  )
          @include('partials/fc-content/global/hero-with-cta')

        @elseif(  get_row_layout() === 'sub_header_menu'  )
          @include('partials/fc-content/global/sub-header-menu')

        @elseif(  get_row_layout() === 'main_content_centered'  )
          @include('partials/fc-content/global/main-content-centered')

        @elseif(  get_row_layout() === 'two_col_image_content'  )
          @include('partials/fc-content/global/two-col-image-content', ['count' => $counter])
          @php($counter++)

        @elseif(  get_row_layout() === 'two_col_content_cta'  )
          @include('partials/fc-content/product-tour/two-col-content-cta')

        @elseif(  get_row_layout() === 'awards_from'  )
          @include('partials/fc-content/product-tour/awards-from')

        @elseif(  get_row_layout() === 'faq_accordion'  )
          @include('partials/fc-content/global/faq-accordion')

        @elseif(  get_row_layout() === 'centered_text'  )
          @include('partials/fc-content/global/centered-text')

        @elseif(  get_row_layout() === 'divider'  )
          @include('partials/fc-content/global/divider')

        @elseif(  get_row_layout() === 'cta_full_width'  )
          @include('partials/fc-content/global/cta-full-width')

        @elseif(  get_row_layout() === 'getapp'  )
          @include('partials/fc-content/global/getapp')
        
        @elseif(  get_row_layout() === 'two_col_support'  )
          @include('partials/fc-content/global/two-col-support')

        @elseif(  get_row_layout() === 'cta_download_templates'  )
          @include('partials/fc-content/global/cta-invoice-templates')

        @elseif(  get_row_layout() === 'two_col_image_callout'  )
          @include('partials/fc-content/product-tour/two-col-image-callout')

        @endif

      @endwhile

    @endif

@endsection
