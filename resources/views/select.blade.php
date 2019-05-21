{{--
  Template Name: Select - Flexible Content
--}}

@extends('layouts.app')

@php
  $counter = 0;
@endphp

@section('content')
    @if(  have_rows('flexible_content')  )
        @while (have_rows('flexible_content')) @php (the_row())

            @if (get_row_layout() === 'select_hero')
                @include ('partials/fc-content/select/hero', ['counter' => $counter])

            @elseif (get_row_layout() === 'two_column_content')
                @include ('partials/fc-content/select/two-col', ['counter' => $counter])

            @elseif (get_row_layout() === 'featured_in')
                @include ('partials/fc-content/select/featured-in', ['counter' => $counter])
                
            @elseif(  get_row_layout() === 'two_col_features_section'  )
                @include('partials/fc-content/select/select-two-col-vertical-carousel')

            @elseif (get_row_layout() === 'footer_full_width_cta')
                @include ('partials/fc-content/select/select-full-width-cta', ['counter' => $counter])

            @elseif(  get_row_layout() === 'cta_download_templates'  )
                @include('partials/fc-content/global/cta-invoice-templates')

            @endif

            @php($counter++)

        @endwhile
    @endif
@endsection
