<option class="gallery-category" value="all">All</option>

@if ($categories)
    @foreach ($categories as $cat)
        @if ($cat->slug !== 'other')
            <option class="gallery-category" value="{{ $cat->term_id }}">
                {{ get_field('label_type', $cat) == 'hidden' ? 'Other' : (get_field('label_type', $cat) == 'custom' ? get_field('custom_label', $cat) : $cat->name) }}
            </option>
        @else 
            @php 
                $other = $cat;
            @endphp
        @endif
    @endforeach
    @if (isset($other) && $other)
        <option class="gallery-category" value="{{ $other->term_id }}">
            {{ get_field('label_type', $other) == 'hidden' ? 'Other' : (get_field('label_type', $other) == 'custom' ? get_field('custom_label', $other) : $other->name) }}
        </option>
    @endif
@endif