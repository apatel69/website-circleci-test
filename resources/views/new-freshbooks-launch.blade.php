{{--
  Template Name: New Freshbooks Launch
--}}

@extends('layouts.app')

@section('content')

    @if(have_posts())
        @while(have_posts()) @php(the_post())
            {{ the_content() }}
        @endwhile
    @endif

@endsection
