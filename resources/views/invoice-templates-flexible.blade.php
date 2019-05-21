{{--
  Template Name: Invoice Templates - Flexible Content
--}}

@extends('layouts.app')

@section('content')
    <div class="legacy-invoice-content">
        @include('partials.invoice-templates.two-col-hero')
        @include('partials.invoice-templates.content-image-cta')
        @include('partials.invoice-templates.cta-full-width-outline')
        @include('partials.fc-content.global.cta-invoice-templates')
        @include('partials.fc-content.global.jump-links')
        @include('partials.invoice-templates.two-col-image-content-repeater')
        @include('partials.invoice-templates.centered-content', ['count' => 4])
        @include('partials.invoice-templates.centered-content', ['count' => 5])
        @include('partials.invoice-templates.centered-content', ['count' => 6])
        @include('partials.invoice-templates.template-card-listing')
        @include('partials.invoice-templates.two-col-image-content', ['count' => 7])
        @include('partials.invoice-templates.centered-content', ['count' => 8])
        @include('partials.invoice-templates.cta-full-width-outline', ['count' => 9])
        @include('partials.invoice-templates.content-image-cta', ['count' => 10])
        @include('partials.fc-content.global.three-col-two-row-content')
        @include('partials.invoice-templates.two-column-video-feature-cta')
        @include('partials.invoice-templates.three-col-content')
        @include('partials.invoice-templates.cta-full-width-outline', ['count' => 11])
        @include('partials.invoice-templates.centered-content', ['count' => 12])
        @include('partials.invoice-templates.template-chart')
        @include('partials.invoice-templates.content-imageless-cta')
    </div>
@endsection
