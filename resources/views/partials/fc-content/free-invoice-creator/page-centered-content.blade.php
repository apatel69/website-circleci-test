@php
$title = get_field('full_width_centered_cta')['title'];
$sub_title = get_field('full_width_centered_cta')['sub_title'];
$sub_title_description = get_field('full_width_centered_cta')['sub_title_description'];
$description = get_field('full_width_centered_cta')['description'];
@endphp
<div class="container">
    <section class="centered-content">
            <h3>{{$title}}</h3>
        <div class="two-col column-parent">
            <div class="col">
                <h4 class="sub-title">{{$sub_title}}</h4>
                <h5 class="sub-title-description">{{$sub_title_description}}</h5>
                <p>{!!$description!!}</p>
            </div>
            <div class="col">
                    @include('partials.components.global-image', ['img' => get_field('full_width_centered_cta')['image']])
            </div>
        </div>
    </div>
</section>
  