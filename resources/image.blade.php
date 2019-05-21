{{-- This code 404s all the attachment URLs so that smart redirecting from WordPress is disabled. We had to add this as sending 404 will forward the request to statmic on Fastly CDN --}}

@php 
    global $wp_query;
    $wp_query->set_404();
    status_header( 404 );
@endphp

@include('404')

@php exit(); @endphp