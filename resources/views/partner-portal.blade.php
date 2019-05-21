{{--
  Template Name: Partner Portal (Fullwidth) - Flexible Content
--}}

@extends('layouts.app')

@section('content')
    @if( have_rows('flexible_content') )
        @while (have_rows('flexible_content')) @php (the_row())
            @if( get_row_layout() === 'hero_two_column_cta' )
                @include('partials.fc-content.partner-portal.hero-two-col-cta')
            @elseif( get_row_layout() === 'two_column_image_content' )
                @include('partials.fc-content.partner-portal.two-col-image-content')
            @elseif( get_row_layout() === 'cta_tiles' )
                @include('partials.fc-content.partner-portal.cta-tiles')
            @elseif( get_row_layout() === 'testimonial' )
                @include('partials.fc-content.partner-portal.testimonial')
            @elseif( get_row_layout() === 'stats_support' )
                @include('partials.fc-content.partner-portal.stats-support')
          @endif
        @endwhile
  @endif
@endsection