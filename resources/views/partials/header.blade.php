<header>
    @php($page_template = basename(get_page_template()))
    @if (get_field('use_header_banner'))
        @include('partials.header.header-banner')
    @endif
    @if (!get_field('override_wp_header'))
        @if (
            get_field('use_custom_header') ||
            App\is_post_type('invoice_templates') || is_tax('invoice_templates_categories') ||
            App\is_post_type('accounting_software') || is_tax('accounting_software_categories') ||
            App\is_post_type('lpat_pages') ||
            App\is_post_type('api') ||
            App\is_post_type('education') ||
            App\is_post_type('resources') ||
            App\is_post_type('support') || is_tax('support_categories') || $page_template === 'support-page.blade.php'
            )
            @if ( (App\is_post_type('support') || is_tax('support_categories') || $page_template === 'support-page.blade.php') && get_field('support_display_classic_bar', 'option') )
                @include('partials.header.sticky-bar', ['link_url' => is_single() ? get_field('paired_article_url') : 'https://support.freshbooks.com'])
            @endif
            @include('partials.header.custom-header')
        @elseif (App\is_post_type('addons') || is_tax('addons_categories') || $page_template === 'addons.blade.php' || App\is_post_type('developers') || $page_template === 'developers-page.blade.php')
            @include('partials.header.sticky-bar')
            @include('partials.components.global-classic-header')
        @elseif ($page_template === 'benefits.blade.php' || $page_template === 'business-name-generator.blade.php')
            @include('partials.components.global-classic-header')
        @elseif ($page_template === 'annual-report.blade.php')
            @include('partials.annual-report.header')
        @elseif ($page_template === 'select.blade.php')
            @include('partials.select.header')
        @else
            @include('partials.components.global-header')
        @endif
    @endif
</header>
