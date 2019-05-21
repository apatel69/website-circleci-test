@extends('layouts.app')

@section('content')
  @while(have_posts()) @php(the_post())
    @include('partials.content-single-'.get_post_type())
    @include('partials.press.centered-text')
    @include('partials.fc-content.global.cta-full-width')
  @endwhile
@endsection
