<div class="container who-its-for-content">
    <div class="static-column">
        <div class="content">
            @if (get_sub_field('section_title'))
                <h2>{{ get_sub_field('section_title') }}</h2>
            @endif
            @if (get_sub_field('right_container_content'))
                <div class="inline_container">
                    {!! get_sub_field('right_container_content') !!}  
                </div>
            @endif
            {!! get_sub_field('fixed_column_content') !!}  
        </div>
        @php ($column2 = get_sub_field('column_2'))
        @if ($column2['bottom_image'])
            @php($bg_img = $column2['bottom_image']['url'])
        @endif
        <div class="floating-column">
            <div class="floating_column_container" {!! isset($bg_img) ? 'style="background-image: url('. $bg_img .');"' : '' !!}>
                <div class="floating_column_container_inner" id="cpy-wif-cta-1">
                    
                    @if ($column2['top_title'])
                        <h2>{{ $column2['top_title'] }}</h2>
                    @endif
                    
                    @if ($column2['top_section_cta'])
                        @include('partials.components.global-link', ['btn' => $column2['top_section_cta'], 'classes' => 'primary-cta'])
                    @endif
                    
                    <div class="rule"></div>
                    
                    @if ($column2['bottom_title'])
                        <h2>{{ $column2['bottom_title'] }}</h2>
                    @endif
                    
                    {!! $column2['bottom_section_content'] !!}

                    <div class="phone-wrap">
                        <span class="number">{!! $column2['phone_number'] !!}</span>
                        <span class="subtext">{!! $column2['subtext'] !!}</span>
                    </div>

                </div>
            </div>
        </div>
    </div>
</div>