@if (have_rows('four_column_content'))
    <div class="container">
        <section>
            <div class="quarters column-parent">
                @while (have_rows('four_column_content')) @php(the_row())
                    <div class="quarter">
                        @if (get_sub_field('title'))
                            <h3>{{ get_sub_field('title') }}</h3>
                        @endif
                        @if (get_sub_field('content'))
                            <p>{!! get_sub_field('content') !!}</p>
                        @endif
                    </div>
                @endwhile
            </div>
        </section>
    </div>
@endif
