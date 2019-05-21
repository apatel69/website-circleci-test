@php
    $colours = ['green', 'blue', 'orange'];
    if (isset($counter)) {
        $colour = $colours[$counter % 3];
    }
    $embedded = get_sub_field('embedded_section');
@endphp
<section id="section{{$counter}}">
    <div class="container two-col-modular {{ get_sub_field('orientation') ? 'flipped' : '' }}">

        @if (get_sub_field('orientation'))
            <div class="col col-image flipped">
                <img class="col-image-content flipped" src="{{ get_sub_field('background_image')['url'] }}" alt="">
                <svg class="triangle bottom-left" width="153px" height="153px">
                    <polygon points="0,0 153,153 0,153" class="{{ $colour }}"/>
                </svg>
            </div>
        @endif

        <div class="col col-text {{ get_sub_field('orientation') ? 'flipped' : '' }}">
            <h2>{!! get_sub_field('header') !!}</h2>
            {!! get_sub_field('text_body') !!}

            {{-- Optional Embedded Elements --}}
            @if ($embedded == 'image')
                @include('partials/fc-content/select/col-embed-image')
                <div class="divider"></div>
            @elseif ($embedded == 'pci')
                @include('partials.fc-content.select.pci-compliance')
            @elseif ($embedded == 'accordion')
                @include('partials/fc-content/select/col-accordion')
            @endif
            @if (get_sub_field('cta')['enable'])
                @if ($embedded !== 'accordion' && $embedded !== 'image')
                    <div class="divider"></div>
                @endif
                <a href="{{ get_sub_field('cta')['link']['url'] }}" name="button" class="btn-select">
                    {{ get_sub_field('cta')['link']['title'] }}
                </a>
            @endif

        </div>

        @if (!get_sub_field('orientation'))
            <div class="col col-image">
                <img class="col-image-content" src="{{ get_sub_field('background_image')['url'] }}" alt="">
                <svg class="triangle bottom-right" width="153px" height="153px">
                    <polygon class="{{ $colour }}" points="0,153 153,153 153,0"/>
                </svg>
            </div>
        @endif

    </div>
</section>
