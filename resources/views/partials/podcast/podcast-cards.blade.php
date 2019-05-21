@php
    $soundCloudEndpoint = 'http://api.soundcloud.com/playlists/703174590?client_id=7x4yMnTtksyg5EYaRi3LZnWeu4qIyCUw';
    $response = wp_remote_get($soundCloudEndpoint);
    $return = json_decode(wp_remote_retrieve_body($response),true);
    $tracks = $return["tracks"];
    $anchorID = $data['anchor_id'] ?: '';
    $cardCounter = 0;
@endphp

<div id="{{ $anchorID }}" class="container podcast-cards">
	<section>
        <h2>{{ $data['header'] }}</h2>

        <img src="@asset('images/podcast/arrow-left.svg')" alt="Previous podcast" class="arrow arrow-left">
        <div class="card-container">

            @foreach ($tracks as $key => $item)
                @php
                    $date = strtotime($item["created_at"]);
                    $publishDate = date("D, d M Y", $date);
                    $hideCard = $cardCounter > 3 ? 'card-hidden' : '';
                @endphp

                <div class="card {{ $hideCard }}">
                    <div class="card-body">
                        <p class="date">{{ $publishDate }}</p>
                        <h4 class="episode">{{ $key == 0 ? 'Trailer' : 'Episode ' . $key }}</h4>
                        <p class="title">{{$item["title"]}}</p>
                        <a class="play" target="_blank" href="{{ $item["permalink_url"] }}">Listen Now</a>
                    </div>
                </div>

                @php
                    $cardCounter++;
                @endphp
            @endforeach
        </div>
        <img src="@asset('images/podcast/arrow-right.svg')" alt="Next podcast" class="arrow arrow-right">

        @if ($cardCounter > 4)
            <a name="expand-cards" class="expand-cards">View More Episodes</a>
        @endif
    </section>
</div>
