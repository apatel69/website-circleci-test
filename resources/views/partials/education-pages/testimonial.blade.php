<div class="container" id="customer-testimonials">
  <section class="testimonials">
      @if (get_field('education_section_title','options'))
          <h2>{{ get_field('education_section_title','options') }}</h2>
      @endif
      @if (have_rows('education_testimonials','options'))
          <div class="smux-testimonials">
              @while (have_rows('education_testimonials','options')) @php(the_row())
                  <div class="testimonial-block">
                      <div class="img-text">
                          @if(get_sub_field('photo','options'))
                              @include('partials.components.global-image', ['img' => get_sub_field('photo','options'), 'classes' => 'content-img'])
                          @endif
                          @if(get_sub_field('testimonial'))
                              <em><q>{{ get_sub_field('testimonial','options') }}</q></em>
                          @endif
                      </div>
                      <hr>
                      <div class="bio">
                          @if(get_sub_field('name','options'))
                              <p>{{ get_sub_field('name','options' )}}</p>
                          @endif
                          @if(get_sub_field('title','options'))
                              <p class="subtext">{{ get_sub_field('title','options') }}</p>
                          @endif
                      </div>
                  </div>
              @endwhile
          </div>
      @endif
  </section>
</div>
