<div class="container">
    <section class="addons column-parent" id="cpy-addons">
        <div class="two-col-parent-col content">
            @if (get_sub_field('addons_title'))
                <h2>{{ get_sub_field('addons_title') }} </h2> 
            @endif				
            {!! get_sub_field('addons_content') !!}
            @if(get_sub_field('cta'))
                @include('partials.components.global-link', ['btn' => get_sub_field('cta'), 'classes' => 'ghost-button no-width'])
            @endif 
        </div>
        <div class="two-col-parent-col addons-img">
            @if(get_sub_field('addons_image'))
                @include('partials.components.global-image', ['img' => get_sub_field('addons_image'), 'classes' => 'content-img'])
            @endif
        </div>
    </section>
</div>  