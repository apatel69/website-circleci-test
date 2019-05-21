<div class="container compare">
        <section>
            <table>
                <tr>
                    <th>Features</th>
                    <th>FreshBooks</th>
                    @if (get_field('template_chart')['chart_title'])
                        @php ($chart_title = get_field('template_chart')['chart_title'])
                        <th>{{ $chart_title }}</th>
                    @endif
                </tr>
                @if (have_rows('template_chart'))
                    @while (have_rows('template_chart')) @php(the_row())
    
                        @if (have_rows('comparison_row'))
                            @while(have_rows('comparison_row')) @php(the_row())
                                <tr>
                                    <td>
                                        @if (get_sub_field('row_title'))
                                            <h3>{{ get_sub_field('row_title') }}</h3>
                                        @endif
                                        @if (get_sub_field('row_description'))
                                            <p>{{ get_sub_field('row_description') }}</p>
                                        @endif
                                    </td>
                                    <td>
                                        <div class="competitor-status">
                                            @if (get_field('freshbook_has_feature_icon', 'option'))
                                                @include('partials.components.global-image', ['img' => get_field('freshbook_has_feature_icon', 'option')])
                                            @endif
                                        </div>
                                    </td>
                                    <td>
                                        <div class="competitor-status">
                                            @if (get_sub_field('included'))
                                                @if (get_field('competitor_has_feature_icon', 'option'))
                                                    @include('partials.components.global-image', ['img' => get_field('competitor_has_feature_icon', 'option')])
                                                @endif
                                            @else
                                                @if (get_field('competitor_lacks_feature_icon', 'option'))
                                                    @include('partials.components.global-image', ['img' => get_field('competitor_lacks_feature_icon', 'option')])
                                                @endif
                                            @endif
                                        </div>
                                    </td>
                                </tr>
                            @endwhile
                        @endif
    
                    @endwhile
                @endif
            </table>
        </section>
    </div>
    