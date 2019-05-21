@extends('layouts.app')

@section('content')
  @include('partials.api.classic-bar')
  <div class="container no-side-pad developers">
    @include('partials.api.sidebar')
    <div class="content">
      <div class="content-section">
          @include('partials.api.content')
          @include('partials.api.code')
      </div>
    </div>
  </div>
@endsection
