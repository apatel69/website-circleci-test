<div class="container">
    <section id="why" class="four-col-container">
        
        @if (get_sub_field('title'))
            <h2 class="text-center">{{ get_sub_field('title') }}</h2>    
        @endif

        @if (have_rows('columns_with_content'))
            <div class="column-parent four-col-wrapper">
                @while (have_rows('columns_with_content')) @php (the_row())
                    <div class="four-col-column">
                        @if (get_sub_field('column_title'))
                        <h3>{{ get_sub_field('column_title') }}</h3>
                        @endif
                        {!! get_sub_field('column_content') !!}
                    </div>
                @endwhile
            </div>
        @endif
        
    </section>
</div>