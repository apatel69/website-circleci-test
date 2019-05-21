{{--
Template Name: Segment - Flexible Content
--}}

@extends('layouts.app')

@section('content')

    @if(have_rows('flexible_content'))

        @php($counter = 0)

        @while (have_rows('flexible_content')) @php (the_row())

            @if(get_row_layout() === 'cta_hero')
                @include('partials/fc-content/global/hero-with-cta', ['count' => $counter])

            @elseif(get_row_layout() === 'sub_header_menu')
                @include('partials/fc-content/global/sub-header-menu', ['count' => $counter])

            @elseif(get_row_layout() === 'getapp')
                @include('partials/fc-content/global/getapp', ['count' => $counter])

            @elseif(get_row_layout() === 'main_content_centered')
                @include('partials/fc-content/global/main-content-centered', ['count' => $counter])

            @elseif(get_row_layout() === 'two_col_image_content')
                @include('partials/fc-content/global/two-col-image-content', ['count' => $counter])

            @elseif(get_row_layout() === 'two_col_small_image')
                @include('partials/fc-content/global/two-col-small-image', ['count' => $counter])

            @elseif(  get_row_layout() === 'divider'  )
                @include('partials/fc-content/global/divider')

            @elseif(  get_row_layout() === 'cta_full_width'  )
                @include('partials/fc-content/global/cta-full-width')

            @endif

            @php($counter++)

        @endwhile

    @endif

@endsection
