@extends('layouts.app')

@section('content')
<div class="resourceHub_postContent">
  @include('partials.resources.hero')
  @include('partials.resources.post-listing')
</div>
  @include('partials/resources/sticky-banner-cta')

@endsection
