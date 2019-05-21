{{--
  Template Name: Easy Bookkeeping
--}}

@extends('layouts.app')

@section('content')

    @if(have_posts())
        @while(have_posts()) @php(the_post())
            {{ the_content() }}
            @include('partials/fc-content/global/faq-accordion')
            @include('partials/fc-content/global/cta-full-width-centered')
        @endwhile
    @endif

@endsection
