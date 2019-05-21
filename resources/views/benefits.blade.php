{{--
  Template Name: Benefits
--}}
@extends('layouts.app')

@section('content')
    @include('partials.benefits.hero')
    @include('partials.benefits.sub-hero')
    @include('partials.benefits.features')
    @include('partials.benefits.testimonials')
    @include('partials.benefits.assurances')
    @include('partials.benefits.footer')
    @include('partials.addons.overlay')
@endsection