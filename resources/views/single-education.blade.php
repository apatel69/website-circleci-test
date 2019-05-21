@extends('layouts.app')

@section('content')
  @while(have_posts()) @php(the_post())
    @include('partials.education-pages.hero')
    @include('partials.education-pages.recommendation-or-featured-in')
    @include('partials.education-pages.three-col-content')
    @if(get_field('has_get_app_rating','options'))
      @include('partials/fc-content/global/getapp')
    @endif
    @include('partials.education-pages.centered-cta-mobile')
    @include('partials/fc-content/global/content-carousel')
    @include('partials.education-pages.testimonial')
    @include('partials.education-pages.centered-text-cta')
    @include('partials.education-pages.support-section')
    @include('partials/fc-content/global/faq-accordion', ['global' => true])
    @include('partials/fc-content/global/cta-full-width')
  @endwhile
@endsection
