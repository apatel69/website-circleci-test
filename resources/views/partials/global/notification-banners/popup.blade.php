@php
    $data = $content['popup'];
    $delay_class = intval($data['show_delay']) > 0 ? 'show-delay' : '';
    $delay_length = intval($data['show_delay']) > 0 ? 'delay-length = '. $data['show_delay'] .'' : '';
@endphp

<style media="screen">
  .cta-after-image::after {
    background-image: url("{{ $data['cta_side_image']['global_image']['url'] }}");
  }
  @media screen and (max-width: 768px) {
    .cta-after-image::after {
      background-image: url("{{ $data['cta_side_image_mobile']['global_image']['url'] }}");
    }
  }
</style>

<div id="{{ $bid }}" class="banner banner-popup banner-hidden {{ $delay_class }}" {{ $delay_length }}>

    <div class="card">
        <a href="#" class="banner-close popup-close"></a>
        <div class="content">
            <div class="col">
                <h2 class="header">{{ $data['title'] }}</h2>
                <div class="body">
                    {!! $data['body'] !!}
                </div>
            </div>
            <div class="col">
                @include('partials.components.global-image', ['img' => $data['popup_image'], 'classes' => 'off-center-left'])
            </div>
            <div class="cta">
                @include('partials.components.global-link', ['btn' => $data['cta'], 'classes' => 'cta-after-image'])
            </div>
            <div class="footer">
                {{ $data['footer'] }}
            </div>
        </div>
    </div>

</div>
