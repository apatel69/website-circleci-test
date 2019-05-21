<div class="container profession-list">
    @if (is_single())
        @php 
            $cat = get_post_primary_category($post->ID, get_post_type() . '_categories')['primary_category'];
        @endphp
    
        @include('partials.invoice-templates.category-template-list', ['term' => $cat])
        <div class="rule"></div>        
    @else
        @php
            if (get_the_ID() == get_field('accounting_software_listing_page', 'option')->ID) {
                $post_type = 'accounting_software_categories';
            } else {
                $post_type = 'invoice_templates_categories';
            }
            $categories = get_terms( array(
                'taxonomy' => $post_type,
                'hide_empty' => false,
            ) );
        @endphp

        @if ($categories)
            @foreach ($categories as $cat)
                @if ($cat->slug !== 'other')                
                    @include('partials.invoice-templates.category-template-list', ['term' => $cat])
                    <div class="rule"></div>
                @else 
                    @php 
                        $other = $cat;
                    @endphp
                @endif
            @endforeach

            @if (isset($other) && $other)
                @include('partials.invoice-templates.category-template-list', ['term' => $other])
                <div class="rule"></div>                
            @endif
        @endif
    @endif
</div>
