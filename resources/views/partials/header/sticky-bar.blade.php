<div class="sticky-bar-spacer"></div>
<div class="sticky-bar-nfb">
    @php
        $post_type = get_post_type();
        if ($post_type === 'page') {
            global $pagename;
            $post_type = $pagename;

            // NOTE: Ugly but required - DO NOT REMOVE
            if ($post_type == 'classic-api') {
                $post_type = 'developers';
            }

        }
        $header_text = get_field($post_type . '_classic_header_text', 'option');
    @endphp
    @if (isset($link_url))
        {!! str_replace( '#!link_url!#', $link_url, $header_text ) !!}
    @else
        {!! $header_text !!}
    @endif
    <span>
        @include('partials.components.global-image', ['img' => get_field($post_type . '_classic_hover_image', 'option')])
    </span>
</div>
