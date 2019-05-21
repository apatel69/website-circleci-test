<div class="container fresh-blue-background">
  <section class="work-smarter">
    @if(get_sub_field('title'))
      <h2>{{get_sub_field('title')}}</h2>
    @endif
    {!!get_sub_field('description')!!}
    <div class="column-parent contacts">
      @if(get_sub_field('phone_number'))
        <div class="contact">
          <span class="phone">
            {{get_sub_field('phone_number')}}
          </span>
        </div>
      @endif
      @if(get_sub_field('email'))
        <div class="contact">
          <span class="email">
            <a href="mailto:{{get_sub_field('email')}}">{{get_sub_field('email')}}</a>
          </span>
        </div>
      @endif
    </div>
  </section>
</div>