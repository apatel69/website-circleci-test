<div class="container">
    <section id="location">
            <div class="location-info-wrapper">
                {!! get_sub_field('location_content') !!}
            </div>
            <div class="google-maps-wrapper">
                {!! get_sub_field('google_map_iframe') !!}
            </div>
            @if (have_rows('location_photos'))
                <div class="column-parent location-photos-wrapper">
                    @while (have_rows('location_photos')) @php (the_row())
                    @include('partials.components.global-image', ['img' => get_sub_field('location_image') ])
                    @endwhile
                </div>
            @endif
    </section>
</div>

