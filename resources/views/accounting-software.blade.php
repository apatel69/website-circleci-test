{{--
  Template Name: Accounting Software
--}}

@extends('layouts.app')

@section('content')
  @include('partials.accounting-software.category-hero')
  @include('partials.accounting-software.listing-page-content')
  @include('partials.invoice-templates.template-listing')
  @include('partials.fc-content.global.cta-full-width')
@endsection