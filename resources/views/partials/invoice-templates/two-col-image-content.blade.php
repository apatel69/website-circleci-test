@php
    $section = isset($count) ? 'section' . $count : false;


    if (isset($count)) {
        if (get_field('two_col_image_content_' . $count)) {
            $data = get_field('two_col_image_content_' . $count);
        }
    } else {
        $data = get_field('two_column_image_content');
    }

    $title = $data['title'];
    $content = $data['content'];
    $image = $data['image'];
    $header = $data['header_type'];
    $target_id = str_replace( [' ', '?', '.', ',', '&', '/'], '', strtolower($data['title']) );
@endphp
<div class="container two-col-image-content {{ $header == 'h3' ? 'inline-title' : '' }}">
    <section id="{{ $section }}">
        @if ($header == 'h2' && $title)
            <h2 id="{{ $target_id }}" data-scroll-offset="20">{!! $title !!}</h2>
        @endif
        <div class="row-contents column-parent">
            <div class="row-content {{ $header == 'h2' ? 'col-half' : '' }}">
                @if ($header == 'h3' && $title)
                    <h3 id="{{ $target_id }}" data-scroll-offset="20">{!! $title !!}</h3>
                @endif
                @if ($content)
                    <p>{!! $content !!}</p>
                @endif
            </div>
            <div class="row-content {{ $header == 'h2' ? 'col-half' : '' }}">
                @if ($image)
                    @include('partials.components.global-image', ['img' => $image])
                @endif
            </div>
        </div>
    </section>
</div>
