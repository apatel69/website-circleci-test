<div class="container">
	<section class="three-col-content">
        @if (get_field('three_col_content_title', 'option'))
            <h2>{{ get_field('three_col_content_title', 'option') }}</h2>
        @endif
        @if (have_rows('three_col_content', 'option'))        
            <div class="column-parent thirds">
                @while(have_rows('three_col_content', 'option')) @php(the_row())
                    <div class="third">
                        <div class="third-content">
                            @if (get_sub_field('three_col_content_column_image', 'option'))
                                @include('partials.components.global-image', ['img' => get_sub_field('three_col_content_column_image', 'option')])
                            @endif
                            
                            @if (get_sub_field('three_col_content_column_title', 'option'))
                                <h3>{{ get_sub_field('three_col_content_column_title', 'option') }}</h3>
                            @endif
                            
                            {!! get_sub_field('three_col_content_column_content', 'option') !!}
                        </div>
                    </div>
                @endwhile
            </div>
        @endif
	</section>
</div>
