<div class="container">
    <section class="who-its-for column-parent">
        <a id="section{{ $counter }}" class="anchor"></a>
        @if (have_rows('two_col_content'))
            @while (have_rows('two_col_content')) @php(the_row())
                <div class="who-its-for-col">
                    @if(get_sub_field('column_title'))
                        <h2>{!! get_sub_field('column_title') !!}</h2>
                    @endif

                    @if (get_sub_field('column_image'))
                        @include('partials.components.global-image', ['img' => get_sub_field('column_image')])
                    @endif

                    {!! get_sub_field('column_description') !!}

                    @if (get_sub_field('column_cta'))
                        @include('partials.components.global-link', ['btn' => get_sub_field('column_cta'), 'classes' => 'ghost-button learn-more'])
                    @endif
                </div>
            @endwhile
        @endif
	</section>
</div>
