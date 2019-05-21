@if (have_rows('anchor_links'))
@php
    $sticky_nav = get_sub_field('sticky_nav');
    
    if (!$sticky_nav){
            $sticky_nav_status = "true";
        }
@endphp
<div class="container subNavigation stickynav--{{ $sticky_nav_status }}">
    <section class="anchor-navigation">
        <div  id="subNavigation" class="column-parent anchor-links">
        @while (have_rows('anchor_links')) @php (the_row())
            @if(get_sub_field('link'))
                    @include('partials.components.global-link', ['btn' => get_sub_field('link'),'classes' => 'subNavigation-navigationItem' ])
            @endif
        @endwhile
        </div>
        @if(get_sub_field('cta_link'))
            @include('partials.components.global-link', ['btn' => get_sub_field('cta_link'), 'classes' => 'primary-cta'])
        @endif
    </section>
</div>
@endif
