{{--
  Template Name: Invoice Templates Gallery - Flexible Content
--}}

@extends('layouts.app')

@section('content')

    @if ( have_rows('flexible_content_layouts') )
        @while ( have_rows('flexible_content_layouts')) @php (the_row())

            @if(  get_row_layout() === 'hero_section'  )
                @include('partials/fc-content/global/hero-with-title')

            @elseif (get_row_layout() === "templates_section")
                @include('partials.invoice-templates-gallery.invoice-templates-gallery')

            @endif

        @endwhile
    @endif
@endsection
