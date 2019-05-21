@php
    $post_type = $post['post_type'];
    if ($post_type == "news") {
        $meta = $post['post_publication'];
        $url = $post['post_url'];
        $external = true;
    } elseif ($post_type == "press_releases") {
        $meta = date("d/m/Y", strtotime($post['post_date']));
        $url = get_permalink($post['ID']);
    } elseif ($post_type == "data_research") {
        $meta = '';
        $url = get_permalink($post['ID']);
    }
    $title = strlen($post['post_title']) > 85 ? substr($post['post_title'], 0, 85) . "..." : $post['post_title'];
@endphp

<a class="press-center-item" href="{{ $url }}" {{ isset($external) ? 'target="_blank" rel="noopener"' : '' }}>
	@if ($meta)
        <p class="meta">
            {{ $meta }}
        </p>
    @endif
	<h3 class="article-headline">{{ $title }}</h3>
</a>