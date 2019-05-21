<?php
    global $post;
    $post_slug=$post->post_name;
?>
<div class="container">
    <section>
    <div class="min-award column-parent additional-margin {{ esc_attr($post_slug) }}">
            @if (get_field('award_list_section_title', 'option'))
                <h4 class="copy">{{ get_field('award_list_section_title', 'option') }}</h4>
            @endif
            @if (have_rows('award_list_award_images', 'option'))
                @while (have_rows('award_list_award_images', 'option')) @php(the_row())
                    @if (get_sub_field('award_list_image', 'option'))
                        @include('partials.components.global-image', ['img' => get_sub_field('award_list_image', 'option')])
                    @endif
                @endwhile
            @endif
        </div>
    </section>
</div>