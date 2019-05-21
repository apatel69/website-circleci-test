@php
    $title = get_sub_field('title') ?: get_field('jump_links')['title'];
    $links = get_sub_field('links') ?: get_field('jump_links')['links'];
    $image = get_sub_field('image') ?: get_field('jump_links')['image'];
    $container_id = $title ? strtolower(preg_replace("/[^a-zA-Z]+/", "", $title)) : 'jump-links';
@endphp
<div id="{{$container_id}}" class="container jump-links">
    <section class="jump-links-section">
        <div class="col">
            @if ($title)
                <h2>{{ $title }}</h2>
            @endif
            <ul>
                @foreach ($links as $link)
                    @if (isSet($link['link']['title']) && isSet($link['link']['url']))
                        <li>
                            <a href="{{ $link['link']['url'] }}">{{ $link['link']['title'] }}</a>
                        </li>
                    @endif
                @endforeach
            </ul>
        </div>
        <div class="col text-center">
            @include('partials.components.global-image', ['img' => $image, 'classes' => 'initial loaded'])
        </div>
    </section>
</div>
