<div class="container no-side-pad">
  <section>
    <div class="awards-container">
      @if(get_sub_field('awards_label'))
        <p>{{get_sub_field('awards_label')}}</p>
      @endif
      @if(have_rows('logos'))
        @while(have_rows('logos')) @php(the_row())
          <div class="award-logo">
            <img class="lazy" data-src="{{get_sub_field('logo')['url']}}" alt="{{get_sub_field('logo')['alt']}}" src="" >
          </div>
        @endwhile
      @endif
    </div>
  </section>
</div>