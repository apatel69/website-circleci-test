<div class="container">
	<section>
        @if (get_sub_field('title'))
		    <h2 class="text-center">{{ get_sub_field('title') }}</h2>
        @endif
		<div class="tweets">
            @php
                $tweets = get_sub_field( 'tweets' );
                $tweet_count = count($tweets);
                $random_num = $tweet_count > 3 ? 3 : $tweet_count;
                $random_tweets = array_rand( $tweets, $random_num );
            @endphp
            @if( is_array( $random_tweets ) )
                @foreach( $random_tweets as $random_tweet )
                    @php($tweet = $tweets[$random_tweet])
                    <div class="tweet">
                        <div class="twitter-info">
                            @if ($tweet['profile_image'])
                                @include('partials.components.global-image', ['img' => $tweet['profile_image'], 'classes' => 'twitter-photo'])
                            @endif
                            <a href="{{ $tweet['tweet_url'] }}" title="link to user's profile." target="_blank" rel="noopener">
                                <span class="twitter-user-name">{{ $tweet['name'] }}</span>
                                <div class="twitter-icon-handle">
                                    <img src="@asset('images/icons/twitter-sm.svg')" alt="twitter logo">
                                    <span class="twitter-handle">{{ $tweet['twitter_handle'] }}</span>
                                </div>
                            </a>
                        </div>
                        <div class="twitter-message">
                            {!! $tweet['twitter_content'] !!}
                        </div>
                    </div>
                @endforeach
            @endif
		</div>
	</section>
</div>
