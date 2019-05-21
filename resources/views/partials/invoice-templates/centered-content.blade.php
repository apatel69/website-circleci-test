@php
    $section = isset($count) ? 'section' . $count : false;
    if (isset($count)) {
        if (get_field('centered_content_' . $count)) {
            $data = get_field('centered_content_' . $count);
        }
    } else {
        $data = get_field('centered_content');
    }
    $left = isset($data['left_align']) ? 'left-align' : '';
    $wide_title = isset($data['wide_title']) && $data['wide_title'] ? 'wide-title' : '';
    $headingWeight = $data['heading_weight'] ? $data['heading_weight'] : 'h2' ;
@endphp

<div class="container centered-content {{ $left }}">
    <section class="switch-competitor {{ $wide_title }}">
        @if ($data['section_title'])
            <{{$headingWeight}} class="heading">{{ $data['section_title'] }}</{{$headingWeight}}>
        @endif
        {!! $data['section_content'] !!}
    </section>
</div>
