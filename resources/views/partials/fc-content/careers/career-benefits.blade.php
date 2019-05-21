<div class="container">
    <section id="benefits" class="benefits-wrapper">
        @if (get_sub_field('title'))
            <h2 class="text-center">{{ get_sub_field('title') }}</h2>
        @endif
        @if (have_rows('benefits_list'))
            <div class="column-parent benefits-list">
                @while (have_rows('benefits_list')) @php (the_row())
                    <div class="benefit">
                        <img src="" data-src="{{ get_sub_field('benefit_icon')['url'] }}" alt="{{ get_sub_field('benefit_icon')['alt'] }}" class="lazy">
                        @if (get_sub_field('benefit_description'))
                            <p>{!! get_sub_field('benefit_description') !!}</p>
                        @endif
                    </div>
                @endwhile
            </div>
        @endif
    </section>
</div>
