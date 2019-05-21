<div class="container" id="customer-testimonials">
        <section class="testimonials">
            @if (get_sub_field('section_title'))
                <h2>{{ get_sub_field('section_title') }}</h2>
            @endif
            @if (have_rows('testimonials'))
                <div class="smux-testimonials">
                    @while (have_rows('testimonials')) @php(the_row())
                        <div class="testimonial-block">
                            <div class="img-text">
                                @if(get_sub_field('photo'))
                                    @include('partials.components.global-image', ['img' => get_sub_field('photo'), 'classes' => 'content-img'])
                                @endif
                                @if(get_sub_field('testimonial'))
                                    <em><q>{{ get_sub_field('testimonial') }}</q></em>
                                @endif
                            </div>
                            <hr>
                            <div class="bio">
                                @if(get_sub_field('name'))
                                    <p>{{ get_sub_field('name' )}}</p>
                                @endif
                                @if(get_sub_field('title'))
                                    <p class="subtext">{{ get_sub_field('title') }}</p>
                                @endif
                            </div>
                        </div>
                    @endwhile
                </div>
            @endif
        </section>
    </div>
