@extends('layouts.app')

@section('content')
<div class="resourceHub_postContent">
  @while(have_posts()) @php(the_post())
    @include('partials/content-single-'.get_post_type())
  @endwhile
</div>
  @include('partials/resources/sticky-banner-cta')  
@endsection
