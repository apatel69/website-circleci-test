<div class="container">
  <section>
    <div class="freshmap-section">
      <div class="column-parent maps-info">
        @if(get_sub_field('freshmaps_image'))
          <div class="map-info">
            @include('partials.components.global-image', ['img' => get_sub_field('freshmaps_image')])
          </div>
        @endif
        <div class="map-info">
          @if(get_sub_field('freshmaps_title'))
            <h2>{{get_sub_field('freshmaps_title')}}</h2>
          @endif
          {!!get_sub_field('freshmaps_description')!!}
        </div>
      </div>
    </div>
  </section>
</div>