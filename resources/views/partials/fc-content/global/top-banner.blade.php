@php
    $enabled = get_sub_field('enable');
    $timed = get_sub_field('enable_timing');
    if ($timed) {
        $start = strtotime(get_sub_field('start_time'));
        $end = strtotime(get_sub_field('end_time'));
        $now = strtotime(date("Y-m-d H:i:s"));
    }
    $live = $timed && $start < $now && $now < $end ? true : false;
@endphp

@if ($enabled && $live)
    <style media="screen">
      .cta-after-image::before {
        background-image: url("{{ get_sub_field('cta_image')['global_image']['url'] }}");
      }
      @media screen and (max-width: 767px) {
        .cta-after-image::before {
          background-image: url("{{ get_sub_field('cta_image_mobile')['global_image']['url'] }}");
        }
      }
    </style>

    <div class="container top-banner {{ get_sub_field("use_for_test") ? 'show-split-test' : '' }}">
    	<section>
    		<div class="content">

                <div class="col">
                    <h2>{{ get_sub_field("header") }}</h2>
                    {!! get_sub_field('body') !!}
                    <div class="cta">
                        @include('partials.components.global-link', ['btn' => get_sub_field('cta'), 'classes' => 'cta-after-image'])
                    </div>
                    <div class="footer">
                        {!! get_sub_field('footer') !!}
                    </div>
                </div>

                <div class="col">
                    @include('partials.components.global-image', ['img' => get_sub_field('main_image'), 'classes' => 'off-center-left'])
                </div>

            </div>
    	</section>
    </div>
@endif
