@extends('layouts.app')

@section('content')
<div class="legacy-invoice-content">
  @include('partials.invoice-templates.hero')
  @include('partials.invoice-templates.breadcrumbs')
  @include('partials.invoice-templates.template-card-listing')
  @include('partials.invoice-templates.footer-cta')
</div>
@endsection
