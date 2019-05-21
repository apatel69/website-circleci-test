@php
    $cat_query_all = add_query_arg( 'template_category', 'all', get_permalink() );
@endphp
<li>
    <a class="gallery-category" data-cat="all" href="{{$cat_query_all}}">All</a>
</li>


@if ($categories)
    @foreach ($categories as $cat)
        @if ($cat->slug !== 'other')
            @php
                $cat_query = add_query_arg( 'template_category', $cat->term_id, get_permalink() );
            @endphp

            <li>
                <a class="gallery-category" data-cat="{{ $cat->term_id }}" href="{{$cat_query}}">
                    {{ get_field('label_type', $cat) == 'hidden' ? 'Other' : (get_field('label_type', $cat) == 'custom' ? get_field('custom_label', $cat) : $cat->name) }}
                </a>
            </li>
        @else 
            @php 
                $other = $cat;
                $cat_query_other = add_query_arg( 'template_category', $other->term_id, get_permalink() );
            @endphp
        @endif
    @endforeach


    @if (isset($other) && $other)
        <li>
            <a class="gallery-category" data-cat="{{ $other->term_id }}" href="{{$cat_query_other}}">
                {{ get_field('label_type', $other) == 'hidden' ? 'Other' : (get_field('label_type', $other) == 'custom' ? get_field('custom_label', $other) : $other->name) }}
            </a>
        </li>
    @endif
@endif