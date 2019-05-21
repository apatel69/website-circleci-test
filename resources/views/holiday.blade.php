{{--
  Template Name: Holiday - Flexible Content
--}}

@extends('layouts.app')

@php
    $counter = 0;
@endphp

@section('content')

    @include ('partials/fc-content/holiday/thank-you', ['counter' => $counter])
    @php($counter++)

@endsection
