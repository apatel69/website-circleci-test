@php
    $categories = get_terms( array(
        'taxonomy' => 'invoice_templates_categories',
        'hide_empty' => false,
    ) );
@endphp

<div class="gallery-filter-search-bar container">
    <section class="outer-wrapper">
        <div class="inner-wrapper--desktop">
            <ul>
                @include('partials.invoice-templates-gallery.filter-list-desktop')
            </ul>
        </div>

        <div class="inner-wrapper--mobile">
            <div class="select-wrap">
                <select class="select-nav">
                    @include('partials.invoice-templates-gallery.filter-list-mobile')
                </select>
            </div>
        </div>

        <form class="search-form" action="{{ get_permalink() }}">
            <input type="hidden" name="template_category" value="all" />
            <input class="search-form__input" type="text" name="search" placeholder="Search for an invoice">
        </form>
    </section>
</div>

@php wp_reset_postdata(); @endphp