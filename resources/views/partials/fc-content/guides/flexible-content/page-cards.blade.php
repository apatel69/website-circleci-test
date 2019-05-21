<div class="aff-image-wrap layout-component">
    @if (get_sub_field('section_title'))
        <h3>{{ get_sub_field('section_title') }}</h3>
    @endif
    @if (get_sub_field('featured_page_card'))
        @php ($card = get_sub_field('featured_page_card'))
        <div class="aff-image-large">
            @if ($card['card_image'])
                @include('partials.components.global-image', ['img' => $card['card_image']])
            @endif
            <div class="img-cap">
                @if ($card['card_title'])
                    <p><strong>{{ $card['card_title'] }}</strong></p>
                @endif
                @if ($card['card_description'])
                    <div class="caption-body">
                        {!! $card['card_description'] !!}
                    </div>
                @endif
                @if ($card['page_link'])
                    @include('partials.components.global-link', ['btn' => $card['page_link']])
                @endif
            </div>
        </div>
    @endif
    @if (have_rows('page_cards'))
        <div class="aff-image-collection layout-component">
            @while(have_rows('page_cards')) @php(the_row())
                <div class="aff-image-small">
                    @if (get_sub_field('card_image'))
                        @include('partials.components.global-image', ['img' => get_sub_field('card_image')])
                    @endif
                    <div class="img-cap">
                        @if (get_sub_field('card_title'))
                            <p><strong>{{ get_sub_field('card_title') }}</strong></p>
                        @endif
                        @if (get_sub_field('card_description'))
                            <div class="caption-body">
                                {!! get_sub_field('card_description') !!}
                            </div>
                        @endif
                        @if (get_sub_field('page_link'))
                            @include('partials.components.global-link', ['btn' => get_sub_field('page_link')])
                        @endif
                    </div>
                </div>
            @endwhile
        </div>
    @endif
</div>