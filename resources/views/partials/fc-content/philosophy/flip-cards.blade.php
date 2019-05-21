<div class="container">
    <section>
        @if (get_sub_field('section_title'))
            <h2 class="text-center">{{ get_sub_field('section_title') }}</h2>
        @endif
        <span class="text-center">{!! get_sub_field('section_description') !!}</span>
    </section>
    <div class="card-container">
        @if(have_rows('flip_cards'))
            @while(have_rows('flip_cards')) @php(the_row())
                <div class="card effect-hover">
                    <div class="card-front">
                        <div class="color {!! get_sub_field('card_color') !!}"></div>
                        @if (get_sub_field('card_title'))
                            <h2 class="card-text">{{ get_sub_field('card_title') }}</h2>
                        @endif
                        <span class="plus">+</span>
                    </div>
                    <div class="card-back">
                        <div class="color {!! get_sub_field('card_color') !!}"></div>
                        <span class="card-text">{!! get_sub_field('card_description') !!}</span>
                    </div>
                </div>
            @endwhile
        @endif
    </div>
</div>