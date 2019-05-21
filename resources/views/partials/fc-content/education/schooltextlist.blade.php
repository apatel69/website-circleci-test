<div id="education-school-list" class="education-school-list container">
        @if(get_sub_field('title'))
        <h3>{{get_sub_field('title')}}</h2>
        @endif
        <ul class="education-school-lists">
                @if(have_rows('school_names'))  
        @while(have_rows('school_names')) 
            <li>
            @php
                the_row();
                $school = get_sub_field('school');
                echo $school;
            @endphp
            </li>
        @endwhile
        @endif
    </ul>
</div>