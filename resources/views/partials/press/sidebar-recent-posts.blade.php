@php
    $limit = isset($number_of_posts) ? $number_of_posts : 5;

    $recent_posts = wp_get_recent_posts(array(
        'post_type' => get_post_type(),
        'numberposts' => $limit,
        'exclude' => get_the_id()
    ));

@endphp

<ul>
    @foreach( $recent_posts as $recent )
        <li>
            <a href="{{ get_permalink($recent["ID"]) }}">{{ $recent["post_title"] }}</a>
        </li>
    @endforeach
</ul>