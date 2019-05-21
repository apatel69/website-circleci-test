@extends('layouts.app')

@section('content')
    @include('partials.addons.overlay')
    @include('partials.addons.single.breadcrumbs')  
    @include('partials.addons.single.meta')
    @if (get_field('include_image_gallery'))
      @include('partials.addons.single.gallery')
    @endif
    @include('partials.addons.single.details')
    @include('partials.addons.api-callout')
@endsection
