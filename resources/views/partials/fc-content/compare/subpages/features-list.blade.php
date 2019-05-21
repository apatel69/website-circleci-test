<div class="container feature-list" id="feature-list">
	<section>
        @if (get_sub_field('compare_feature_list_section_title'))
		    <h2>{{ get_sub_field('compare_feature_list_section_title') }}</h2>
        @endif
        @if (have_rows('compare_feature_list'))
            <ul class="list-items">
                @while (have_rows('compare_feature_list')) @php(the_row())
                    <li>{{ get_sub_field('compare_feature_list_item') }}</li>
                @endwhile
            </ul>
        @endif
        @if (get_sub_field('include_cta') && get_sub_field('compare_feature_list_cta'))
            <div class="cta-feature-list">
                @include('partials.components.global-link', ['btn' => get_sub_field('compare_feature_list_cta')])
            </div>
        @endif
	</section>
</div>
