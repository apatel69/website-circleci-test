@extends('layouts.app')

@section('content')
  @if (get_field('display_classic_bar', 'option'))
    @include('partials.integrations.classic-bar')
  @endif

  @include('partials.integrations.hero')  
  @include('partials.integrations.post-listing')  
  @include('partials.integrations.cta-full-width')  
@endsection
