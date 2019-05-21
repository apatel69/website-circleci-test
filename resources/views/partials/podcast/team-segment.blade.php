<div class="container team-segment-podcast">
    <style media="screen">
      .team-segment-podcast > section {
        background: url({{$data['background_image']['global_image']['url']}}) no-repeat center 20px;
      }

      @media screen and (max-width: 767px) {
        .team-segment-podcast > section {
          background: url({{$data['mobile_background_image']['global_image']['url']}}) no-repeat center 20px;
          background-size: cover;
        }
      }
    </style>
	<section>
        <h2>{{ $data['header'] }}</h2>
        <div class="card card-full-width">
            <div class="avatar">
                @include('partials.components.global-image', ['img' => $data['card_full_width']['avatar']])
            </div>
            <div class="about">
                <h3>{!! $data['card_full_width']['header'] !!}</h3>
                <p>{!! $data['card_full_width']['body']!!}</p>
            </div>
        </div>
        <div class="card card-half-width">
            <div class="avatar">
                @include('partials.components.global-image', ['img' => $data['card_half_left']['avatar']])
            </div>
            <div class="about">
                <h3>{!! $data['card_half_left']['header'] !!}</h3>
                <p>{!! $data['card_half_left']['body']!!}</p>
            </div>
        </div>
        <div class="card card-half-width">
            <div class="avatar">
                @include('partials.components.global-image', ['img' => $data['card_half_right']['avatar']])
            </div>
            <div class="about">
                <h3>{!! $data['card_half_right']['header'] !!}</h3>
                <p>{!! $data['card_half_right']['body']!!}</p>
            </div>
        </div>
    </section>
</div>
