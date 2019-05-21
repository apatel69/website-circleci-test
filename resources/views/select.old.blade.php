{{--
  Template Name: Select (Old) - Flexible Content
--}}

@extends('layouts.app')

@section('content')

  @if(  have_rows('flexible_content')  )

    @while (have_rows('flexible_content')) @php (the_row())
      @if(  get_row_layout() === 'select_hero'  )
        @include('partials/fc-content/select/select-hero')

      @elseif(  get_row_layout() === 'featured_in'  )
        @include('partials/fc-content/global/featured-in')

      @elseif(get_row_layout() === 'select_benefits_list')
        @include('partials/fc-content/select/select-benefits-list')

      @elseif(get_row_layout() === 'divider')
        @include('partials/fc-content/global/divider')

      @elseif(get_row_layout() === 'two_col_image_content_benefits_list')
        @include('partials/fc-content/select/two-col-image-content-benefits-list')

      @elseif(get_row_layout() === 'select_integrations_section')
        @include('partials/fc-content/select/select-integrations-section')

      @elseif(get_row_layout() === 'select_faq')
        @include('partials/fc-content/select/select-faq')

      @elseif(get_row_layout() === 'select_form')
        @include('partials/fc-content/select/select-form')

      @endif

    @endwhile

  @endif

@endsection
