<div class="container ctaTiles" id="become-a-partner">
    <section class="fullWidthLayout__content ctaTiles__container">
        @if (get_sub_field('title'))
            <h2>{{ get_sub_field('title') }}</h2>
        @endif
        <div class="ctaTiles__tileContainer">
            @if (have_rows('tiles'))
                @while(have_rows('tiles'))
                    @php(the_row())
                    @if (get_sub_field('tile_link'))
                        <a href="{{ get_sub_field('tile_link') }}" class="ctaTiles__tile">
                            <div>
                                @if (get_sub_field('tile_title'))
                                    <h3>{{ get_sub_field('tile_title') }}</h3>
                                @endif
                                @if (get_sub_field('tile_icon'))
                                    @include('partials.components.global-image', ['img' => get_sub_field('tile_icon')])    
                                @endif
                                @if (get_sub_field('tile_description'))
                                    <p>{{ get_sub_field('tile_description') }}</p>
                                @endif
                                @if (get_sub_field('tile_button_text'))
                                    <button class="ctaTiles__tileButton">{{ get_sub_field('tile_button_text') }}</button>
                                @endif
                            </div>
                        </a>
                    @endif
                @endwhile
            @endif
        </div>
    </section>
</div>