<div class="assurances-wrap">
    <section class="section-assurances">
        @if (have_rows('quotes'))
            <div class="assurances-left">
                <ul>
                    @while(have_rows('quotes'))
                        @php(the_row())
                        <li class="assurance">
                            @if (get_sub_field('quote') )
                                <p>{{ get_sub_field('quote') }}</p>
                            @endif
                            @if (get_sub_field('company_logo') )
                                @include('partials.components.global-image', ['img' => get_sub_field('company_logo') ])
                            @endif
                        </li>
                    @endwhile
                </ul>
            </div>
        @endif
        <div class="assurances-right">
            @if (get_field('assurance_percent_image'))
                @include('partials.components.global-image', ['img' => get_field('assurance_percent_image'), 'classes' => 'assurance-percent' ])
            @endif
            @if (get_field('assurance_percent_text'))
                <div class="assurance-percent-text">{{ get_field('assurance_percent_text') }}</div>
            @endif
        </div>
    </section>
</div>