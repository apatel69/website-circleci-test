<div class="container" {!! get_sub_field('anchor_id') ? 'id="' . get_sub_field('anchor_id') . '"' : '' !!}>
    <section id="resources">
        @if (get_sub_field('section_title'))
            <h2 class="text-center">{{ get_sub_field('section_title') }}</h2>
        @endif
        @if (have_rows('resource_row'))
            @while(have_rows('resource_row')) @php(the_row())
                @php ($resource = get_sub_field('resource_type'))
                <section id="{{ sanitize_title_with_dashes(get_sub_field("anchor_id")) }}" class="add-pad">
                    <div class="column-parent resources">
                        <div class="content">
                            @if (get_sub_field('resource_title'))
                                <h3>{{ get_sub_field('resource_title') }}</h3>
                            @endif
                            {!! get_sub_field('resource_description') !!}
                            @if (get_sub_field('file_download_link')['global_link_text'])
                                <span>
                                    @include('partials.components.global-link', ['btn' => get_sub_field('file_download_link')]) {{ get_sub_field('file_download_description') }}
                                </span>
                            @endif
                            @if ($resource == 'screenshots')
                                @if (get_sub_field('screenshot_dropdown_label'))
                                    <span>
                                        <a href="#" class="expand-chevron">{{ get_sub_field('screenshot_dropdown_label') }}</a>
                                    </span>
                                @endif
                            @endif
                        </div>
                        @if ($resource == 'logo')
                            @if (have_rows('logo_previews'))
                                <div class="freshbooks-logos">
                                    @while(have_rows('logo_previews')) @php(the_row())
                                        <div class="fb-logo">
                                            @if (get_sub_field('preview_image'))
                                                {{ get_sub_field('custom_image_class') }}
                                                @include('partials.components.global-image', ['img' => get_sub_field('preview_image')])
                                            @endif
                                            @if (have_rows('download_links'))
                                                @while (have_rows('download_links')) @php(the_row())
                                                    @if (get_sub_field('download_link'))
                                                        @include('partials.components.global-link', ['btn' => get_sub_field('download_link')])
                                                    @endif
                                                @endwhile
                                            @endif
                                        </div>
                                    @endwhile
                                </div>
                            @endif
                        @else
                            @if (get_sub_field('resource_image'))
                                <div class="image">
                                    @include('partials.components.global-image', ['img' => get_sub_field('resource_image'), 'classes' => get_sub_field('resource_custom_image_class')])
                                </div>
                            @endif
                        @endif
                    </div>
                </section>
            </section>
            @if (get_sub_field('device_images'))
                </section>
                </div>
                <div class="container{{ get_sub_field('background_color') == 'blue' ? ' blue-background' : '' }}">
                    <section id="assets">
                        <div class="devices">
                            <a href="#" class="close-button"><img src="@asset('images/icons/close.svg')" alt="Close" class="close-icon"></a>
                            @if(have_rows('device_images'))
                                @while(have_rows('device_images')) @php(the_row())
                                    <div class="device">
                                        @if (get_sub_field('device_image'))
                                            @include('partials.components.global-image', ['img' => get_sub_field('device_image'), 'classes' => get_sub_field('custom_image_class')])
                                        @endif
                                        @if (get_sub_field('device_image_name'))
                                            <span>{{ get_sub_field('device_image_name') }}</span>
                                        @endif
                                        @if (get_sub_field('download_image_link'))
                                            <span>@include('partials.components.global-link', ['btn' => get_sub_field('download_image_link')])</span>
                                        @endif
                                    </div>
                                @endwhile
                            @endif
                        </div>
                    </section>
                </div>
                <div class="container">
            @endif
        @endwhile
    @endif
</div>
