<div class="addons-list-item tile">
    <div class="addon-list-item-image">
        <a href="{{ get_permalink() }}">
            @if (get_field('addon_logo'))
                @include('partials.components.global-image', ['img' => get_field('addon_logo')])
            @endif
        </a>
    </div>
    @if (get_field('description_summary'))
        <p class="addon-list-description">
            {{ get_field('description_summary') }}
        </p>
    @endif
    <p class="addons-link text-center">
        <a href="{{ get_permalink() }}">More about {{ get_the_title() }} </a>
    </p>
</div>