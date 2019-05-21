@extends('layouts.app')

@section('content')
    @while (have_posts()) @php(the_post())

        @include('partials/lpat/hero')
        @include('partials/lpat/recommendation-or-featured-in')
        @include('partials/lpat/three-col-content')

        @if (get_field('has_get_app_rating', 'options'))
            @include('partials/fc-content/global/getapp')
        @endif

        @include('partials/lpat/centered-cta-mobile')
        @include('partials/fc-content/global/content-carousel')
        @include('partials/lpat/testimonial')
        @include('partials/lpat/centered-text-cta')
        @include('partials/lpat/support-section')
        @include('partials/fc-content/global/faq-accordion', ['global' => true])
        @include('partials/fc-content/global/cta-full-width')

    @endwhile
@endsection
