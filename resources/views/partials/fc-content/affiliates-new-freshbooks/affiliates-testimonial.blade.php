<div class="container">
  <section>
    <div class="testimonial-container column-parent compact-testimonial">
      @if(get_sub_field('testimonial_image'))
        <div class="testimonial-image">
            @include('partials.components.global-image', ['img' => get_sub_field('testimonial_image')])
        </div>
      @endif
      <div class="testimonial-quote-source">
        @if(get_sub_field('testimonial_quote'))
          <div class="testimonial-quote">
            <blockquote>
              {!! get_sub_field('testimonial_quote', false, false) !!}
            </blockquote>
          </div>
        @endif
        @if(get_sub_field('testimonial_source'))
          <div class="testimonial-source">
            <p>{{ get_sub_field('testimonial_source') }}</p>
          </div>
        @endif
      </div>
    </div>
  </section>
</div>