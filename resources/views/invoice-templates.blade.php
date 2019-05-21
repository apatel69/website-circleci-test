{{--
  Template Name: Invoice Templates
--}}

@extends('layouts.app')

@section('content')
<div class="legacy-invoice-content">
  @include('partials.invoice-templates.two-col-hero')
  @include('partials.invoice-templates.content-image-cta')
  @include('partials.fc-content.global.three-col-two-row-content')
  @include('partials.invoice-templates.two-col-image-cta')
  @include('partials.invoice-templates.two-column-video-feature-cta')
  @include('partials.invoice-templates.freeformtext')
  @include('partials.invoice-templates.three-col-content')
  @include('partials.fc-content.global.cta-full-width-outline')
  @include('partials.invoice-templates.centered-content')
  @include('partials.invoice-templates.template-chart')
  @include('partials.fc-content.global.faq-accordion')
  @include('partials.invoice-templates.template-card-listing')
  @include('partials.invoice-templates.content-imageless-cta')
  @include('partials.invoice-templates.template-listing')
</div>
@endsection
