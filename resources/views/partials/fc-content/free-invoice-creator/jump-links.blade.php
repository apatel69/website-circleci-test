@php
$title = get_field('jump_links')['title'];
$sectionId = $title ? strtolower(preg_replace("/[^a-zA-Z]+/", "", $title)) : 'jump-links';
@endphp
<div id="{{$sectionId}}" class="container jump-links">
  <section class="jump-links-section">
    <div class="col">
        @if ($title)
            <h2>{{ $title }}</h2>
        @endif
        <ul>
            @foreach (get_field('jump_links')['link'] as $link)
                @if ($link['link']['title'] && $link['link']['url'])
                    <li>
                        <a href="{{ $link['link']['url'] }}">{{ $link['link']['title'] }}</a>
                    </li>
                @endif
            @endforeach
        </ul>
    </div>
    <div class="col text-center">
        @include('partials.components.global-image', ['img' => get_field('jump_links')['image']])
    </div>
  </section>
</div>
