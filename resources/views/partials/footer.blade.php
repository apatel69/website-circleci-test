@if (!get_field('override_wp_footer'))
    @php
        $page_template = basename(get_page_template());
        $is_classic = $page_template === 'addons.blade.php' || App\is_post_type('addons') || is_tax('addons_categories') || $page_template === 'benefits.blade.php' || $page_template === 'business-name-generator.blade.php';
    @endphp
    <footer>
        @if (!get_field('remove_footer_menu') && !App\is_post_type('invoice_templates') && !is_tax('invoice_templates_categories') && !App\is_post_type('accounting_software') && !is_tax('accounting_software_categories') && !$is_classic && !App\is_post_type('lpat_pages') && !App\is_post_type('education'))
            @include('partials.components.global-footer-menu')
        @endif

        @if (!$is_classic)
            @include('partials.fc-content.global.divider')
            @include('partials.components.global-footer')
        @else
            @include('partials.components.global-classic-footer')
        @endif
    </footer>
@endif
