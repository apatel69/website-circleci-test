@extends('layouts.app')

@section('content')
    @include('partials.support.hero')

    @if(have_posts()) @php(the_post())
        @include('partials.content-single-'.get_post_type())
    @endif
@endsection
