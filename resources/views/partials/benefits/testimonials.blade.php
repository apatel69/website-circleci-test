@if (have_rows('testimonial'))
    <div class="testimonial">
        <section class="testimonial-tabs">
            <div class="blockquote-section">
                <div class="tab-content">
                    @php $tab_count = 0; @endphp
                    @while(have_rows('testimonial'))
                        @php 
                            the_row(); 
                            $tab_count++; 
                        @endphp
                        <div id="tab{{ $tab_count }}">
                            @if (get_sub_field('quote'))
                                <blockquote>
                                    <q>{{ get_sub_field('quote') }}</q>
                                </blockquote>
                            @endif
                        </div>
                    @endwhile
                </div>
                <div class="gallery-holder">
                    <div class="cycle-gallery">
                        <span class="arrow icon-arrow-down"></span>
                        <div class="mask">
                            <ul class="slideset tabset">
                                @php $slide_count = 0; @endphp
                                @while(have_rows('testimonial'))
                                    @php 
                                        the_row(); 
                                        $slide_count++; 
                                    @endphp
                                    <li class="{{ $slide_count == 1 ? 'active' : '' }} slide">
                                        <a data-tab="#tab{{ $slide_count }}">
                                            <i class="icon-arrow-down"></i>
                                            <div class="name-block">
                                                <div class="img-wrapp">
                                                    @if(get_sub_field('image'))
                                                        @include('partials.components.global-image', ['img' => get_sub_field('image') ])
                                                    @endif
                                                </div>
                                                <div class="text-wrapp">
                                                    @if(get_sub_field('name'))
                                                        <strong class="name-holder">{{ get_sub_field('name') }}</strong>
                                                    @endif
                                                    @if(get_sub_field('job_title'))
                                                        <span>{!! get_sub_field('job_title') !!}</span>
                                                    @endif
                                                </div>
                                            </div>
                                        </a>
                                    </li>
                                @endwhile
                            </ul>
                        </div>
                        <a class="btn-prev icon-arrow-left" data-arrow="#"></a>
                        <a class="btn-next icon-arrow-right" data-arrow="#"></a>
                    </div>
                </div>
            </div>
        </section>
    </div>
@endif