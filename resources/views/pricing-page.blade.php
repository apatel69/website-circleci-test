{{--
Template Name: Pricing Page - Flexible Content

--}}

@extends('layouts.app')

@section('content')

    @if(  have_rows('flexible_content')  )

        @while (have_rows('flexible_content')) @php (the_row())

            @if(  get_row_layout() === 'cta_hero'  )
                @include('partials/fc-content/pricing/cta-hero')

            @elseif (  get_row_layout() === 'top_banner'  )
                @include('partials/fc-content/global/top-banner')

            @elseif(  get_row_layout() === 'faq_accordion'  )
                @include('partials/fc-content/global/faq-accordion')

            @elseif(  get_row_layout() === 'cta_full_width'  )
                @include('partials/fc-content/global/cta-full-width')

            @elseif(  get_row_layout() === 'pricing_table_tabs'  )
                @include('partials/fc-content/pricing/pricing-table-tabs')

            @elseif(  get_row_layout() === 'two_column_icon_text_list'  )
                @include('partials/fc-content/pricing/two-col-icon-text-list')

            @elseif(  get_row_layout() === 'three_col_content'  )
                @include('partials/fc-content/global/three-col-content')

            @elseif (  get_row_layout() === 'getapp'  )
                @include('partials/fc-content/global/getapp')

            @elseif (  get_row_layout() === 'featured_in'  )
                @include('partials/fc-content/global/featured-in')

            @elseif(  get_row_layout() === 'two_col_hero_cta'  )
                @include('partials/fc-content/global/two-col-hero-cta')

            @endif

        @endwhile

    @endif

@endsection
