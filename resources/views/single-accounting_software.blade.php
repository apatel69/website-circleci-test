@extends('layouts.app')

@section('content')  
  @include('partials.accounting-software.hero')
  @include('partials.invoice-templates.breadcrumbs')
  @include('partials.content-single-'.get_post_type())
  @include('partials.invoice-templates.template-listing')
  @include('partials.fc-content.global.cta-full-width')
@endsection
