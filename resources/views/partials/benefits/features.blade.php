<section class="features">
    @if (have_rows('feature'))
        <ul class="featurelist-container">
            @while(have_rows('feature')) @php(the_row())
                <li class="featurelist-li">
                    @if (get_sub_field('icon'))
                        @include('partials.components.global-image', ['img' => get_sub_field('icon'), 'classes' => 'featurelist-sprite'])
                    @endif
                    @if (get_sub_field('feature_title'))
                        <h3 class="featurelist-title">{{ get_sub_field('feature_title') }}</h3>
                    @endif
                    @if (get_sub_field('feature_description'))
                        <p class="featurelist-description">{!! get_sub_field('feature_description') !!}</p>
                    @endif
                </li>
            @endwhile
        </ul>
    @endif
</section>