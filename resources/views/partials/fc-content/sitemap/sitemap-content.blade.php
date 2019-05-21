@if(have_rows('sitemaps_list'))
  <div class="container">
    <section>
      <div class="sitemap-content">
        @while(have_rows('sitemaps_list')) @php(the_row())
          <div class="sitemap-section">
            @if(get_sub_field('title'))
              <h2 class="sitemap-section-title">{{get_sub_field('title')}}</h2>
            @endif
            @if(have_rows('links_list'))
              @while(have_rows('links_list')) @php(the_row())
                @if (get_sub_field('site_link'))
                  <span>
                    @include('partials.components.global-link', ['btn' => get_sub_field('site_link'), 'classes' => 'sitemap-link'])
                  </span>
                @endif	
              @endwhile		
            @endif	
          </div>
        @endwhile
      </div>
    </section>
  </div>
@endif
