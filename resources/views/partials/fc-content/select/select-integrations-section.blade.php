<div class="container select-content">
  <section class="select-integrations">
    <div class="integration-details column-parent">
      @if(get_sub_field('title'))
        <div class="integration-detail-column">
          <h2>{{get_sub_field('title')}}</h2>
        </div>
      @endif
      @if(have_rows('integration_details'))
      <div class="integration-detail-column">
        @while(have_rows('integration_details')) @php(the_row())
          {!!get_sub_field('detail')!!}
        @endwhile
      </div>
      @endif
    </div>
    @if(have_rows('integration_images'))
      <div class="column-parent integrations">
        @while(have_rows('integration_images')) @php(the_row())
        @if(get_sub_field('image'))
          <div class="integration">
              @include('partials.components.global-image', ['img' => get_sub_field('image')])
          </div>
        @endif
        @endwhile
      </div>
    @endif
  </section>
</div>