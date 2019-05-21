@php
    $bg_img = get_sub_field('background_image')['url'];
    $bg_img_mobile = get_sub_field('background_image_mobile')['url'];
@endphp

<style>
    .example-photos {
        background-image: {!! $bg_img ?  'url("' . $bg_img . '")' : 'none' !!}
    }

    @media screen and (max-width: 480px) {
        .example-photos {
            background-image: {!! $bg_img_mobile ?  'url("' . $bg_img_mobile . '")' : 'none' !!}
        }
    }
</style>

<div class="container">	
    <section>
        @if (get_sub_field('section_title'))
            <h2 class="text-center">{{ get_sub_field('section_title') }}</h2>
        @endif
        <div class="example-photos">
            @if (get_sub_field('profile_image'))
                <div class="profile-image">
                    @include('partials.components.global-image', ['img' => get_sub_field('profile_image')])
                </div>
            @endif
            <div class="text">
                @if (get_sub_field('name'))
                    <h3>{{ get_sub_field('name') }}</h3>
                @endif
                @if (get_sub_field('job_title_position'))
                    <p>{{ get_sub_field('job_title_position') }}</p>
                @endif
                @if (get_sub_field('profile_description'))
                    <span class="grey">{!! get_sub_field('profile_description') !!}</span>
                @endif
            </div>
        </div>
    </section>
</div>
