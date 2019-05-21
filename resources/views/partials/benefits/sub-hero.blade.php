<div class="subhero-background">
    <section class="subhero">
        <div class="subhero-headline">
            @if (get_field('subhero_headline'))
                <p>{{ get_field('subhero_headline') }}</p>
            @endif
            @if (get_field('subhero_subtext'))
                <p class="subhero-headline-subtext">{{ get_field('subhero_subtext') }}</p>
            @endif
        </div>
        @include('partials.benefits.subscribe-form')
    </section>
</div>