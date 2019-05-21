<div id="videos" class="container">
  <section>
    @if(get_sub_field('title'))
      <h2 class="text-center">{{get_sub_field('title')}}</h2>
    @endif
    @if(have_rows('videos_list'))
    <div class="education-videos column-parent">
      @while(have_rows('videos_list')) 
      @php 
      the_row();
      $parts = parse_url(get_sub_field('youtube_link'));
      parse_str($parts['query'], $query);
      $linkId = $query['v'];
      @endphp
        <div class="education-video" id="video{{get_row_index()}}">
          @if(get_sub_field('youtube_link'))
            <div class="youtube-player" data-id="{{$linkId}}"></div>
          @endif
          @if(get_sub_field('sub_text'))
            <p>{{get_sub_field('sub_text')}}</p>
          @endif
        </div>
      @endwhile
    </div>
    @endif
  </section>
</div>