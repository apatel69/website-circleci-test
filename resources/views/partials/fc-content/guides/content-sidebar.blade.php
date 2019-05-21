<div class="aff-guide aff-guide-body container">
    <div class="two-col">
        <div class="sidebar-content" style="top: 0px;">
            @if (have_rows('anchor_links'))
                <ul>
                    @while (have_rows('anchor_links')) @php (the_row())
                        @if (get_sub_field('anchor_link'))
                          <li>@include('partials.components.global-link', ['btn' => get_sub_field('anchor_link')])</li>        
                        @endif
                    @endwhile
                </ul>
            @endif
        </div>
        <div class="main-content" id="top">
            @if(  have_rows('flexible_content')  )
                
                @while (have_rows('flexible_content')) @php (the_row())
                    
                    @if(  get_row_layout() === 'text_content'  )
                        @include('partials/fc-content/guides/flexible-content/wysiwyg-content')

                    @elseif(  get_row_layout() === 'page_cards'  )
                        @include('partials/fc-content/guides/flexible-content/page-cards')

                    @elseif(  get_row_layout() === 'accordion_dropdown'  )
                        @include('partials/fc-content/global/faq-accordion')

                    @endif
                
                @endwhile

            @endif
        </div>
    </div>
</div>