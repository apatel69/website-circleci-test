@php
    $custom = get_sub_field('use_custom_content');
@endphp

<section id="section{{$counter}}">
    <div class="container featured-in">

        @if ($custom)

            <div class="copy">{{ get_sub_field('label') }}</div>
            @foreach (get_sub_field('logos') as $logo)
                @php ($img = $logo['logo'])
                @php ($hide = $logo['hide_after'])
                <div class="icon-container">
                    @include('partials.components.global-image', ['img' => $img, 'classes' => 'logo hide-' . $hide])
                </div>
            @endforeach

        @else

            <span class="copy">{{ get_field('featured_in_label', 'option') }}</span>
            @while( have_rows('featured_in_logos', 'option'))
                @php(the_row())
                @php($img = get_sub_field('logo'))
                @php($class = get_sub_field('featured_in_logo_custom_class'))
                @php($hide = get_sub_field('featured_logo_display'))
                <div class="icon-container">
                    @include('partials.components.global-image', ['img' => $img, 'classes' => 'logo ' . 'hide-' . $hide . ' ' . $class])
                </div>
            @endwhile

        @endif

    </div>
</section>
