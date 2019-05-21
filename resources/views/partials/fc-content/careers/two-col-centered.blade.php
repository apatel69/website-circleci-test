@php
    $left_col_data = get_sub_field('left_column');
    $right_col_data = get_sub_field('right_column');
@endphp

<div class="container">
    <section id="culture">
        <div class="column-parent two-col-centered-wrapper">
            <div class="content left-content-col">
                <h2>{{ $left_col_data['column_title'] }}</h2>
                {!! $left_col_data['column_content'] !!}
            </div>
            <div class="content right-content-col">
                <h2>{{ $right_col_data['column_title'] }}</h2>
                {!! $right_col_data['column_content'] !!}
            </div>
            <div class="image-col image-left-col">
                @include('partials.components.global-image', ['img' => $left_col_data['column_image'] ])
            </div>
            <div class="image-col image-right-col">
                @include('partials.components.global-image', ['img' => $right_col_data['column_image'] ])
            </div>
        </div>
    </section>
</div>
