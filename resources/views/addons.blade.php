{{--
  Template Name: Add-ons
--}}

@extends('layouts.app')

@section('content')
    @include('partials.addons.overlay')
    @include('partials.addons.hero')
    @include('partials.addons.search')
    @include('partials.addons.main-content')
    @include('partials.addons.api-callout')
@endsection