<div class="container no-side-pad">
        <section id="freshbookers" class="freshbookers-showcase" data-scroll-offset="49">
            @if (get_sub_field('title'))
                <h2 class="text-center">{{ get_sub_field('title') }}</h2>    
            @endif
            <div class="team-search">
                <img src="@asset('images/icons/search.svg')" alt="Search for a FreshBooker" class="search-icon">
                <input type="text" placeholder="Search for a FreshBooker" id="team-search-field">
                <div class="autocomplete-wrapper"></div>
            </div>

            @if (have_rows('freshbookers_list'))
                <div class="canvas">
                    @while (have_rows('freshbookers_list')) @php (the_row())
                    <div class="freshbooker" id="{{ get_row_index() }}" tabindex="0">
                        <img src="{{ get_sub_field('freshbooker_photo')['url'] }}" alt="{{ get_sub_field('freshbooker_name') }}" width="125" height="125" />
                        @if (get_sub_field('freshbooker_name'))
                        <div class="tooltip">
                            <h3 class="freshbooker-name"><span>{{ get_sub_field('freshbooker_name') }}</span></h3>
                        </div>
                        @endif
                        </div>
                    @endwhile
                </div>
            @endif
        </section>
    </div>