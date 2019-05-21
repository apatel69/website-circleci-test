@extends('layouts.app')

@section('content')
  @include('partials.accounting-software.category-hero')
  @include('partials.invoice-templates.breadcrumbs')
  @include('partials.accounting-software.template-card-listing')
  @include('partials.fc-content.global.cta-full-width')
@endsection
