<div class="container compare">
    <section>
        <table>
            <tr>
                @if (get_field('competitor_name'))
                    <th>{{ get_sub_field('chart_title') }}</th>
                @endif
                <th>FreshBooks</th>
                @if (get_field('competitor_name'))
                    @php ($competitor_name = get_field('competitor_name'))
                    <th>{{ $competitor_name }}</th>
                @endif
            </tr>
            @if (have_rows('comparison_features'))
                @while (have_rows('comparison_features')) @php(the_row())
                    <tr>
                        <td>
                            @if (get_sub_field('feature_title'))
                                <h3>{{ get_sub_field('feature_title') }}</h3>
                            @endif
                            @if (get_sub_field('feature_description'))
                                <p>{{ get_sub_field('feature_description') }}</p>
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
                                @if (get_sub_field('competitor_included'))
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
        </table>
    </section>
</div>