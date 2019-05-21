@php
    $section = false;

    if (isset($count)) {
        $section = 'section' . $count;
        if (get_field('content_image_cta_' . $count)) {
            $data = get_field('content_image_cta_' . $count);
        }
    } else {
        $data = get_field('content_image_cta');
    }
    $title = $data['title'];
    $content = $data['content'];
    $cta = $data['cta'];
    $image = $data['image'];
    $left = isset($data['left_align']) ? 'left-align' : '';
@endphp

<div class="container main-content content-image-cta {{ $left }}">
    <section id="{{ $section }}">
        @if ($title)
            <h2>{{ $title }}</h2>
        @endif
        @if ($content)
            <p>{!! $content !!}</p>
        @endif
        @if ($cta)
            @include('partials.components.global-link', ['btn' => $cta, 'classes' => 'extra-padding'])
        @endif
        @if ($image)
            @include('partials.components.global-image', ['img' => $image])
        @endif
    </section>
</div>
