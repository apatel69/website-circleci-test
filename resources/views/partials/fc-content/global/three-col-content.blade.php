<div class="container">
	<section class="three-col-content">
        @if (get_sub_field('title'))
            <h2>{{ get_sub_field('title') }}</h2>
        @endif
        @if (have_rows('three_col_content'))        
            <div class="column-parent thirds">
                @while(have_rows('three_col_content')) @php(the_row())
                    <div class="third">
                        <div class="third-content">
                            @if (get_sub_field('column_image'))
                                @include('partials.components.global-image', ['img' => get_sub_field('column_image')])
                            @endif
                            
                            @if (get_sub_field('column_title'))
                                <h3>{{ get_sub_field('column_title') }}</h3>
                            @endif
                            
                            {!! get_sub_field('column_content') !!}
                        </div>
                    </div>
                @endwhile
            </div>
        @endif
	</section>
</div>
