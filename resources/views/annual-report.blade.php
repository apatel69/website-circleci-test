{{--
  Template Name: Annual Report
--}}

@extends('layouts.app')

@section('content')

<div class="annualReport">
  @include('partials.annual-report.clipboard')
  @include('partials.annual-report.hero')
  @include('partials.annual-report.introduction')
  @include('partials.annual-report.back-to-top')
  @include('partials.annual-report.trends-in-self-employment')
  @include('partials.annual-report.snapshot-of-sep')
  @include('partials.annual-report.self-employment-changes')
  @include('partials.annual-report.talent-tug-of-war')
  @include('partials.annual-report.modern-workforce')
  @include('partials.annual-report.about')
</div>
@endsection
