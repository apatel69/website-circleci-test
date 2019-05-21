<div class="container">
    <section class="switch-competitor">
        @if (get_sub_field('section_title'))
            <h2>{{ get_sub_field('section_title') }}</h2>
        @endif
        {!! get_sub_field('section_content') !!}
    </section>
</div>