@php
  $section = isset($count) ? 'section' . $count : false;
  $data = get_field('two_column_image_cta');
  $title = $data['title'];
  $content = $data['content'];
  $cta = $data['cta'];
  $image = $data['image'];
  $header = $data['header_type'];
  $target_id = str_replace( [' ', '?', '.', ',', '&', '/'], '', strtolower($data['title']) );
@endphp

<div class="container two-col-image-cta">
    <section id="{{ $section }}">
        @if ($header == 'h2' && $title)
            <h2 id="{{ $target_id }}" data-scroll-offset="20">{!! $title !!}</h2>
        @endif
        <div class="row-contents column-parent">
            <div class="row-content">
                @if ($header == 'h3' && $title)
                    <h3 id="{{ $target_id }}" data-scroll-offset="20">{!! $title !!}</h3>
                @endif
                @if ($content)
                    <p>{!! $content !!}</p>
                @endif
                @if ($cta)
                    @include('partials.components.global-link', ['btn' => $cta, 'classes' => 'extra-padding mobile-hide'])
                @endif
            </div>
            <div class="row-content">
                @if ($image)
                    @include('partials.components.global-image', ['img' => $image])
                @endif
            </div>
            @if ($cta)
                <div class="row-content mobile-show">
                    @include('partials.components.global-link', ['btn' => $cta, 'classes' => 'extra-padding'])
                </div>
            @endif
        </div>
    </section>
</div>
