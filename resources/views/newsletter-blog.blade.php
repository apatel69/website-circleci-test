{{--
  Template Name: Blog Newsletter
--}}

@extends('layouts.app')

@section('content')

<div class="newsletter-blog-wrapper">
    <div class="newsletter-header-logo">
        <img src="@asset('images/navigation/default-logo.svg')" alt="FreshBooks Cloud Accounting">
    </div>
            
    @while(have_posts()) @php(the_post())
        @php(the_content())
      @endwhile
    @endsection
</div>
