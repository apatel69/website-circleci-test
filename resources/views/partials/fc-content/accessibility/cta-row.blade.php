@if (have_rows('ctas'))
<div class="container">
    <div class="one-col">
        <section>
            <div class="text-center">
                @while (have_rows('ctas')) @php(the_row())
                    @include('partials.components.global-link', ['btn' => get_sub_field('cta'), 'classes' => 'ghost-button info-button no-width'])
                @endwhile
            </div>
        </section>
    </div>
</div>
@endif