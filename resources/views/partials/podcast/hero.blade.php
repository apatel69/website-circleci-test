<div class="hero-podcast">
    <style media="screen">
        .hero-podcast > section {
          background-image: url({{ $data['background_image']['global_image']['url'] }});
        }

        @media screen and (max-width: 767px) {
          .hero-podcast > section {
            background-image: url({{ $data['mobile_background_image']['global_image']['url'] }});
          }
        }
    </style>
	<section>
        <div class="text-container">
            <h1>{{ $data['header'] }}</h1>
            <p>{!! $data['body'] !!}</p>
            {{-- <a class="btn-primary primary-cta" href="{{$data['cta']['url']}}">{{$data['cta']['title']}}</a> --}}
            <div class="cta">
                @include ('partials.components.global-link', ['btn' => $data['cta']])
            </div>
        </div>
    </section>
</div>
