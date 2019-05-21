@extends('layouts.app')

@section('content')
  @if (get_field('display_classic_bar', 'option'))
    @include('partials.integrations.classic-bar')
  @endif

  @while(have_posts()) @php(the_post())
    @include('partials.content-single-'.get_post_type())
    @include('partials.integrations.cta-full-width')  
  @endwhile
@endsection
