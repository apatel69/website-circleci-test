<div class="container box-container">  
  <section class="text-center">
    @if(get_sub_field('title'))
      <h2>{{get_sub_field('title')}}</h2>
    @endif
    @if(have_rows('news_list'))
		<div class="column-parent boxes">
      @while(have_rows('news_list')) @php(the_row())
			<div class="box">
        <img src="{{get_sub_field('image')['url']}}" alt="{{get_sub_field('image')['alt']}}">
        @if(get_sub_field('description'))
          <span>{{get_sub_field('description')}}</span>
        @endif
      </div>
      @endwhile
    </div>
    @endif
    @if (get_sub_field('news_cta'))
      @include('partials.components.global-link', ['btn' => get_sub_field('news_cta'), 'classes' => 'ghost-button no-width'])
    @endif
  </section>
</div>  