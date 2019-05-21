<div class="twoColImageContent container">
    <div class="fullWidthLayout__content twoColImageContent__container">
        <div class="twoColImageContent__image">
            @if (get_sub_field('image'))
                @include('partials.components.global-image', ['img' => get_sub_field('image') ])
            @endif
        </div>
        <div class="twoColImageContent__content">
            @if (get_sub_field('title'))
                <h2>{{ get_sub_field('title') }}</h2>
            @endif
            {!! get_sub_field('description') !!}
        </div>
    </div>
</div>