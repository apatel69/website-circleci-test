@if (have_rows('three_col_two_row_content'))
    <div class="container">
        <section>
            <div class="column-parent thirds">
                @while (have_rows('three_col_two_row_content')) @php(the_row())

                    <div class="third">
                        <div class="third-container">
                            <div class="third-bullet">
                                @if (get_sub_field('number'))
                                    @php ($num = get_sub_field('number'))
                                    <p class="bullet">{{ $num }}</p>
                                @endif
                            </div>
                            <div class="third-inner">
                                <div class="third-title">
                                    @php($headingWeight = get_sub_field('heading_weight') ? get_sub_field('heading_weight') : 'h3')
                                    @if (get_sub_field('heading'))
                                        <{{$headingWeight}}>{{ get_sub_field('heading') }}</{{$headingWeight}}>
                                    @endif
                                </div>
                                <div class="third-content">
                                    @if (get_sub_field('content'))
                                        <p>{!! get_sub_field('content') !!}</p>
                                    @endif
                                </div>
                            </div>
                        </div>
                    </div>

                @endwhile
            </div>
        </section>
    </div>
@endif
