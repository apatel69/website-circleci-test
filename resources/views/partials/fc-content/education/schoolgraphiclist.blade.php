<div class="container education-loved-by">
    @if(get_sub_field('title'))
     <h2 class="text-center">{{get_sub_field('title')}}</h2>
     @endif
    
     <ul>
        @if(have_rows('school_logos'))
            @while(have_rows('school_logos')) 
                <li>
                    @php
                        the_row();
                        $img = get_sub_field('logo');
                     @endphp
                    @include('partials.components.global-image', ['img' => $img, 'classes' => 'logo '])
                </li>
            @endwhile
        @endif
    </ul>
    
    @if (get_sub_field('cta_link'))
        @php
            $link = get_sub_field('cta_link');
        @endphp
        <a href="{{$link['url']}}" target="{{$link['target']}}" class="education-more-educators">{{$link['title']}}&rightarrow;</a>
    @endif
</div>