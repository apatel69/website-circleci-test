@php
    wp_localize_script( 'holiday', 'holiday_api', [
        'base'  => esc_url_raw( rest_url() ),
        'nonce' => wp_create_nonce( 'wp_rest' )
    ] );
@endphp

<section id="section{{$counter}}">

    <div class="container thank-you">

        <h1 class="header-text invisible">{!! get_field('complete_header_text') !!}</h1>

        <h2 class="sub-header-text">{!! get_field('sub_header_text') !!}</h2>

        <img src="{{ get_field('image')['url'] }}" alt="" class="thank-you-img">

        <p class="footer-text">{!! get_field('footer_text') !!}</p>

    </div>

</section>
