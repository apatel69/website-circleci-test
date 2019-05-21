@php 
  $post_type = $post->post_type;
  if ($post_type == 'news') {
    $main_page_id = get_field('press_news_coverage_page', 'option')->ID;
  } elseif ($post_type == 'press_releases') {
    $main_page_id = get_field('press_release_page', 'option')->ID;
  } elseif ($post_type = 'data_research') {
    $main_page_id = get_field('press_data_research_page', 'option')->ID;
  }
@endphp

@if(have_rows('flexible_content_layouts', $main_page_id))
  @while(have_rows('flexible_content_layouts', $main_page_id)) @php(the_row())
    @if( get_row_layout() == 'hero_section_with_centered_title' )
      @include('partials/fc-content/global/hero-with-title')		
    
    @elseif(get_row_layout() === 'sub_header_menu')
      @include('partials/fc-content/global/sub-header-menu')
    
    @endif
  @endwhile
@endif