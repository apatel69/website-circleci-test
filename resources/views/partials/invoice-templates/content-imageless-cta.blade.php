@if (get_field('content_imageless_cta'))
    <div class="container main-content content-image-cta">
        <section id="cpy-main-content">
            @php($content_imageless_cta = get_field('content_imageless_cta'))
            @if ($content_imageless_cta['title'])
                <h2>{{ $content_imageless_cta['title'] }}</h2>
            @endif
            @if ($content_imageless_cta['content'])
                <p>{!! $content_imageless_cta['content'] !!}</p>
            @endif
            @if ($content_imageless_cta['cta'])
                @include('partials.components.global-link', ['btn' => $content_imageless_cta['cta']])
            @endif
        </section>
    </div>
@endif
