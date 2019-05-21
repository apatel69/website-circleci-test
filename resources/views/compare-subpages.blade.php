{{--
  Template Name: Compare Subpage - Flexible Content
--}}

@extends('layouts.app')

@section('content')

{{--
To do:
- Move inclusion of simple-progressive-reveal-form into Flexible content
- Create ACF fields for messaging in simple-progressive-reveal-form, can be similar to hero-signup fields
- Style Per invision: https://freshbooks.invisionapp.com/d/main#/console/16422334/341607073/inspect
--}}

@if(  have_rows('flexible_content')  )

    @while (have_rows('flexible_content')) @php (the_row())

        @if(  get_row_layout() === 'cta_hero'  )
            @include('partials/fc-content/compare/subpages/cta-hero')

        @elseif(  get_row_layout() === 'progressive_reveal_form'  )
            @include('partials/fc-content/global/simple-progressive-reveal-form')

        @elseif(  get_row_layout() === 'divider_med_length'  )
            @include('partials/fc-content/global/divider-med-length')

        @elseif(  get_row_layout() === 'faq_accordion'  )
            @include('partials/fc-content/global/faq-accordion', ['global' => true])

        @elseif(  get_row_layout() === 'cta_full_width'  )
            @include('partials/fc-content/global/cta-full-width')

        @elseif(  get_row_layout() === 'three_col_content'  )
            @include('partials/fc-content/compare/three-col-content')

        @elseif(  get_row_layout() === 'award_list'  )
            @include('partials/fc-content/compare/award-list')

        @elseif(  get_row_layout() === 'contact_cta'  )
            @include('partials/fc-content/compare/contact-cta')

        @elseif(  get_row_layout() === 'content_carousel'  )
            @include('partials/fc-content/global/content-carousel')

        @elseif(  get_row_layout() === 'three_col_testimonials'  )
            @include('partials/fc-content/compare/subpages/three-col-testimonials')

        @elseif(  get_row_layout() === 'comparison_chart'  )
            @include('partials/fc-content/compare/subpages/comparison-chart')

        @elseif(  get_row_layout() === 'features_list'  )
            @include('partials/fc-content/compare/subpages/features-list')

        @elseif(  get_row_layout() === 'featured_in'  )
            @include('partials/fc-content/compare/subpages/featured-in')

        @elseif(  get_row_layout() === 'centered_content'  )
            @include('partials/fc-content/compare/subpages/centered-content')

        @elseif(  get_row_layout() === 'breadcrumbs'  )
            @include('partials/fc-content/compare/subpages/breadcrumbs')

        @elseif(  get_row_layout() === 'competitor_menu'  )
            @include('partials/fc-content/compare/subpages/competitor-menu')

        @elseif(  get_row_layout() === 'getapp'  )
            @include('partials/fc-content/global/getapp')

        @elseif(  get_row_layout() === 'cta_download_templates'  )
            @include('partials/fc-content/global/cta-invoice-templates')

        @endif

    @endwhile

@endif

@endsection
