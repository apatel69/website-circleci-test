@php 
  // $main_page = get_field('press_listings_page', 'option');
  $main_page_id = $main_page->ID;
@endphp

@if(have_rows('flexible_content_layouts', $main_page_id))
  @while(have_rows('flexible_content_layouts', $main_page_id)) @php(the_row())
    @if(get_row_layout() === 'centered_text')
      @include('partials/fc-content/global/centered-text')

    @elseif(  get_row_layout() === 'cta_full_width'  )
      @include('partials/fc-content/global/cta-full-width')
    
    @endif
  @endwhile
@endif