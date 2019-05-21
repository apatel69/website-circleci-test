<div class="all-features">
  <div class="container">
    <section class="features">
      <div class="feature-title">
        @if(get_sub_field('feature_title'))
          <h2>{{get_sub_field('feature_title')}}</h2>
        @endif
        @if(get_sub_field('feature_cta'))
          @include('partials.components.global-link', ['btn' => get_sub_field('feature_cta'),'classes' => 'ghost-button more-info' ])
        @endif
      </div>
      @if(have_rows('feature_details'))
      <div class="mobile-feature-details">
        <div class="feature-details">
          @while(have_rows('feature_details')) @php(the_row())
            <div class="individual-feature {{get_sub_field('feature_layout')=='image' ? 'feature-image' : '' }}">
              @if(get_sub_field('feature_layout')=='content')
                @if(get_sub_field('title'))
                  <h4>{{get_sub_field('title')}}</h4>
                @endif

                @if(get_sub_field('description'))
                  {!!get_sub_field('description')!!}
                @endif
              @endif

              @if(get_sub_field('image') && get_sub_field('feature_layout')=='image')
                @include('partials.components.global-image', ['img' => get_sub_field('image') ])
              @endif

            </div>
          @endwhile    
        </div>
      </div>
      @endif
    </section>
  </div>
</div>