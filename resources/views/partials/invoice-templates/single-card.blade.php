<a class="card {{ (isset($hover) && $hover !== true) ? '' : 'effect-hover' }}" href="{{ is_tax() ? get_permalink() : get_term_link($term) }}">
    <div class="card-front">
        <div class="color {{ get_field('category_color', $term) }}"></div>
        <div class="card-content">
            @if (is_tax())
                <span>{{ get_field('profession', get_the_ID()) }}</span>
            @else 
                <span>{{ get_field('alternative_label', $term) ? get_field('alternative_label', $term) : $term->name }}<br>{{ get_field('category_label') }}</span>
            @endif
        </div>
    </div>
    @if (!isset($hover) || $hover !== false)
        <div class="card-back">
            <div class="color {{ get_field('category_color', $term) }}"></div>
            <div class="card-content">
                @if (get_field('thumbnail_image', $term))
                    @include('partials.components.global-image', ['img' => get_field('thumbnail_image', $term)])
                @endif
            </div>
        </div>
    @endif
</a>