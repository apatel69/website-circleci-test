<div class="webinars-list">
    @if(get_sub_field('webinar_registration_title'))
      <h3>{{get_sub_field('webinar_registration_title')}}</h3>
    @endif
    @php
      $webinars_data = Webinars::upcomingWebinars();
      $message = $webinars_data->message;
      $upcomingwebinars = isset($webinars_data->webinars) ? $webinars_data->webinars : false;
    @endphp

    @if (!empty($upcomingwebinars))
        <ul>
        @foreach ($upcomingwebinars as $webinar)
            <li>
                <div class="day-time">
                    <strong>{{$webinar['date']}}</strong><br>
                    <span class="grey-text">{{ $webinar['start_time'] }} - {{ $webinar['end_time'] }} {{ $webinar['timezone'] }}</span>
                </div>
                <div class="register-button">
                    <a href="{{$webinar['url']}}" class="ghost-button no-width" alt="Register now!">Register <span class="hide-mobile">Now</span></a>
                </div>
            </li>
        @endforeach
        </ul>
    @elseif ($message != "OK")
        <div class="info-webinars"><p>Something went wrong. Please <a href="mailto:support@freshbooks.com?subject=I%20have%20a%20Webinar%20question">contact us</a> for information on the next webinar.</p></div>
    @else
        <div class="info-webinars">{!! get_sub_field('no_webinars_message') !!}</div>
    @endif

</div>
