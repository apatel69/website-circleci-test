<?php

namespace App;

use Roots\Sage\Container;
use Roots\Sage\Assets\JsonManifest;
use Roots\Sage\Template\Blade;
use Roots\Sage\Template\BladeProvider;

/**
 * Enqueue CSS & JS Template specific
 */

add_action('wp_enqueue_scripts', function () {

    global $template;
    $cpt_template = basename($template);
    $page_template = basename(get_page_template());

    if ($page_template == "home-page.blade.php") {
        wp_enqueue_style('homepage', asset_path('styles/homepage.css'), false, null);
        wp_enqueue_script('homepage', asset_path('scripts/homepage.js'), ['jquery'], null, true);
    } elseif ($page_template == "product-tour.blade.php") {
        wp_enqueue_style('products', asset_path('styles/product-tour.css'), false, null);
        wp_enqueue_script('products', asset_path('scripts/product-tour.js'), ['jquery'], null, true);
    } elseif ($page_template == "segment.blade.php") {
        wp_enqueue_style('products', asset_path('styles/segment.css'), false, null);
        wp_enqueue_script('products', asset_path('scripts/segment.js'), ['jquery'], null, true);
    } elseif ($page_template == "podcast.blade.php") {
        wp_enqueue_style('podcast', asset_path('styles/podcast.css'), false, null);
        wp_enqueue_script('podcast', asset_path('scripts/podcast.js'), ['jquery'], null, true);
    } elseif ($page_template == "seo-modular-page.blade.php") {
        wp_enqueue_style('seo-modular-page', asset_path('styles/seo-modular-page.css'), false, null);
        wp_enqueue_script('seo-modular-page', asset_path('scripts/seo-modular-page.js'), ['jquery'], null, true);
    } elseif ($page_template == "affiliate-program.blade.php") {
        wp_enqueue_style('affiliate-program', asset_path('styles/affiliate-program.css'), false, null);
        wp_enqueue_script('affiliate-program', asset_path('scripts/affiliate-program.js'), ['jquery'], null, true);
    } elseif ($page_template == "pricing-page.blade.php") {
        wp_enqueue_style('pricing', asset_path('styles/pricing-page.css'), false, null);
        wp_enqueue_script('pricing', asset_path('scripts/pricing-page.js'), ['jquery'], null, true);
    } elseif ($page_template == "direct-mail.blade.php") {
        wp_enqueue_style('direct-mail', asset_path('styles/direct-mail.css'), false, null);
        wp_enqueue_script('direct-mail', asset_path('scripts/direct-mail.js'), ['jquery'], null, true);
    } elseif ($page_template == "who-its-for.blade.php") {
        wp_enqueue_style('who-its-for', asset_path('styles/who-its-for.css'), false, null);
        wp_enqueue_script('who-its-for', asset_path('scripts/who-its-for.js'), ['jquery'], null, true);
    } elseif ($page_template == "careers.blade.php") {
        wp_enqueue_style('careers', asset_path('styles/careers.css'), false, null);
        wp_enqueue_script('careers', asset_path('scripts/careers.js'), ['jquery'], null, true);
    } elseif ($page_template == "philosophy.blade.php") {
        wp_enqueue_style('philosophy', asset_path('styles/philosophy.css'), false, null);
        wp_enqueue_script('philosophy', asset_path('scripts/philosophy.js'), ['jquery'], null, true);
    } elseif ($page_template == "about.blade.php") {
        wp_enqueue_style('about-overview', asset_path('styles/about.css'), false, null);
        wp_enqueue_script('about-overview', asset_path('scripts/about.js'), ['jquery'], null, true);
    } elseif ($page_template == "our-story.blade.php") {
        wp_enqueue_style('our-story', asset_path('styles/our-story.css'), false, null);
        wp_enqueue_script('our-story', asset_path('scripts/our-story.js'), ['jquery'], null, true);
    } elseif ($page_template == "about-team.blade.php") {
        wp_enqueue_style('team', asset_path('styles/about-team.css'), false, null);
        wp_enqueue_script('team', asset_path('scripts/about-team.js'), ['jquery'], null, true);
    } elseif ($page_template == "accessibility.blade.php") {
        wp_enqueue_style('accessibility', asset_path('styles/accessibility.css'), false, null);
        wp_enqueue_script('accessibility', asset_path('scripts/accessibility.js'), ['jquery'], null, true);
    } elseif ($page_template == "policies.blade.php") {
        wp_enqueue_style('policies', asset_path('styles/policies.css'), false, null);
        wp_enqueue_script('policies', asset_path('scripts/policies.js'), ['jquery'], null, true);
    } elseif ($page_template == "features.blade.php") {
        wp_enqueue_style('features', asset_path('styles/features.css'), false, null);
        wp_enqueue_script('features', asset_path('scripts/features.js'), ['jquery'], null, true);
    } elseif ($page_template == "affiliates-new-freshbooks.blade.php") {
        wp_enqueue_style('affiliates-new-freshbooks', asset_path('styles/affiliates-new-freshbooks.css'), false, null);
        wp_enqueue_script('affiliates-new-freshbooks', asset_path('scripts/affiliates-new-freshbooks.js'), ['jquery'], null, true);
    } elseif ($page_template == "education.blade.php") {
        wp_enqueue_style('education', asset_path('styles/education.css'), false, null);
        wp_enqueue_script('education', asset_path('scripts/education.js'), ['jquery'], null, true);
    } elseif ($page_template == "webinars.blade.php") {
        wp_enqueue_style('webinars', asset_path('styles/webinars.css'), false, null);
        wp_enqueue_script('webinars', asset_path('scripts/webinars.js'), ['jquery'], null, true);
    } elseif ($page_template == "sitemap.blade.php") {
        wp_enqueue_style('sitemap', asset_path('styles/sitemap.css'), false, null);
        wp_enqueue_script('sitemap', asset_path('scripts/sitemap.js'), ['jquery'], null, true);
    } elseif ($page_template == "accountants.blade.php") {
        wp_enqueue_style('accountants', asset_path('styles/accountants.css'), false, null);
        wp_enqueue_script('accountants', asset_path('scripts/accountants.js'), ['jquery'], null, true);
    } elseif ($page_template == "select.blade.php") {
        wp_enqueue_style('select', asset_path('styles/select.css'), false, null);
        wp_enqueue_script('select', asset_path('scripts/select.js'), ['jquery'], null, true);
    } elseif ($page_template == "compare.blade.php") {
        wp_enqueue_style('compare', asset_path('styles/compare.css'), false, null);
        wp_enqueue_script('compare', asset_path('scripts/compare.js'), ['jquery'], null, true);
    } elseif ($page_template == "reseller-program.blade.php") {
        wp_enqueue_style('reseller-program', asset_path('styles/reseller-program.css'), false, null);
        wp_enqueue_script('reseller-program', asset_path('scripts/reseller-program.js'), ['jquery'], null, true);
    } elseif ($page_template == "compare-subpages.blade.php") {
        wp_enqueue_style('compare-subpages', asset_path('styles/compare-subpages.css'), false, null);
        wp_enqueue_script('compare-subpages', asset_path('scripts/compare-subpages.js'), ['jquery'], null, true);
    } elseif ($page_template == "guides.blade.php") {
        wp_enqueue_style('guides', asset_path('styles/guides.css'), false, null);
        wp_enqueue_script('guides', asset_path('scripts/guides.js'), ['jquery'], null, true);
    } elseif ($page_template == "contact.blade.php") {
        wp_enqueue_style('contact', asset_path('styles/contact.css'), false, null);
        wp_enqueue_script('contact', asset_path('scripts/contact.js'), ['jquery'], null, true);
        wp_enqueue_script('recaptcha', 'https://www.google.com/recaptcha/api.js', null, null, true);
    } elseif ($page_template == "integrations-page.blade.php" || $cpt_template == "single-integrations.blade.php" || $cpt_template == "taxonomy-integration_categories.blade.php") {
        wp_enqueue_style('integrations', asset_path('styles/integrations.css'), false, null);
        wp_enqueue_script('integrations', asset_path('scripts/integrations.js'), ['jquery'], null, true);
    } elseif ($page_template == "resources-page.blade.php" || $cpt_template == "single-resources.blade.php" || $cpt_template == "taxonomy-resource_categories.blade.php") {
        wp_enqueue_style('resources', asset_path('styles/resources.css'), false, null);
        wp_enqueue_script('resources', asset_path('scripts/resources.js'), ['jquery'], null, true);
    } elseif ($page_template == "press-page.blade.php" || $cpt_template == "single-press_releases.blade.php" || $cpt_template == "single-data_research.blade.php") {
        wp_enqueue_style('press', asset_path('styles/press.css'), false, null);
        wp_enqueue_script('press', asset_path('scripts/press.js'), ['jquery'], null, true);
    } elseif ($page_template == "nfb-feature-education.blade.php") {
        wp_enqueue_style('nfb-feature-education', asset_path('styles/nfb-feature-education.css'), false, null);
        wp_enqueue_script('nfb-feature-education', asset_path('scripts/nfb-feature-education.js'), ['jquery'], null, true);
    } elseif ($cpt_template == "single-invoice_templates.blade.php" || $cpt_template == "taxonomy-invoice_templates_categories.blade.php") {
        wp_enqueue_style('invoice-templates', asset_path('styles/invoice-templates.css'), false, null);
        wp_enqueue_script('invoice-templates', asset_path('scripts/invoice-templates.js'), ['jquery'], null, true);
    } elseif ($page_template == "accounting-software.blade.php" || $cpt_template == "single-accounting_software.blade.php" || $cpt_template == "taxonomy-accounting_software_categories.blade.php") {
        wp_enqueue_style('accounting-software', asset_path('styles/accounting-software.css'), false, null);
        wp_enqueue_script('accounting-software', asset_path('scripts/accounting-software.js'), ['jquery'], null, true);
    } elseif ($page_template == "invoice-templates.blade.php") {
        wp_enqueue_style('free-invoice-templates', asset_path('styles/free-invoice-templates.css'), false, null);
        wp_enqueue_script('free-invoice-templates', asset_path('scripts/free-invoice-templates.js'), ['jquery'], null, true);
    } elseif ($page_template == "invoice-templates-gallery.blade.php") {
        wp_enqueue_style('invoice-templates-gallery', asset_path('styles/invoice-templates-gallery.css'), false, null);
        wp_enqueue_script('invoice-templates-gallery', asset_path('scripts/invoice-templates-gallery.js'), ['jquery'], null, true);
    } elseif ($page_template == "invoice-templates-flexible.blade.php") {
        wp_enqueue_style('invoice-templates-flexible', asset_path('styles/invoice-templates-flexible.css'), false, null);
        wp_enqueue_script('invoice-templates-flexible', asset_path('scripts/invoice-templates-flexible.js'), ['jquery'], null, true);
    } elseif ($page_template == "refer-a-friend.blade.php") {
        wp_enqueue_style('refer-a-friend', asset_path('styles/refer-a-friend.css'), false, null);
        wp_enqueue_script('refer-a-friend', asset_path('scripts/refer-a-friend.js'), ['jquery'], null, true);
    } elseif ($page_template == "free-invoice-creator.blade.php") {
        wp_enqueue_style('free-invoice-creator-landing-page', asset_path('styles/free-invoice-creator-landing-page.css'), false, null);
        wp_enqueue_script('free-invoice-creator-landing-page', asset_path('scripts/free-invoice-creator-landing-page.js'), ['jquery'], null, true);
    } elseif ($page_template == "partner-page.blade.php") {
        wp_enqueue_style('partner-page', asset_path('styles/partner-page.css'), false, null);
        wp_enqueue_script('partner-page', asset_path('scripts/partner-page.js'), ['jquery'], null, true);
    } elseif ($page_template == "free-invoice-creator.blade.php") {
        wp_enqueue_style('free-invoice-creator-page', asset_path('styles/free-invoice-creator-page.css'), false, null);
        wp_enqueue_script('free-invoice-creator-page', asset_path('scripts/free-invoice-creator-page.js'), ['jquery'], null, true);
    } elseif ($page_template == "holiday.blade.php") {
        wp_enqueue_style('holiday', asset_path('styles/holiday.css'), false, null);
        wp_enqueue_script('holiday', asset_path('scripts/holiday.js'), ['jquery'], null, true);
    } elseif ($page_template == "support-page.blade.php" || $cpt_template == "single-support.blade.php" || $cpt_template == "taxonomy-support_categories.blade.php") {
        wp_enqueue_style('support', asset_path('styles/support.css'), false, null);
        wp_enqueue_script('support', asset_path('scripts/support.js'), ['jquery'], null, true);
    } elseif (is_404() || is_attachment()) {
        wp_enqueue_style('404', asset_path('styles/404.css'), false, null);
        wp_enqueue_script('404', asset_path('scripts/404.js'), ['jquery'], null, true);
    } elseif ($page_template == "addons.blade.php" || $cpt_template == "taxonomy-addons_categories.blade.php" || $cpt_template == "single-addons.blade.php") {
        wp_enqueue_style('addons', asset_path('styles/addons.css'), false, null);
        wp_enqueue_script('addons', asset_path('scripts/addons.js'), ['jquery'], null, true);
    } elseif ($cpt_template == "single-lpat_pages.blade.php") {
        wp_enqueue_style('lpat-pages', asset_path('styles/lpat-pages.css'), false, null);
        wp_enqueue_script('lpat-pages', asset_path('scripts/lpat-pages.js'), ['jquery'], null, true);
    } elseif ($page_template == "benefits.blade.php") {
        wp_enqueue_style('benefits', asset_path('styles/benefits.css'), false, null);
        wp_enqueue_script('benefits', asset_path('scripts/benefits.js'), ['jquery'], null, true);
    } elseif ($page_template == "ca-invoice-software.blade.php") {
        wp_enqueue_style('ca-invoice-software', asset_path('styles/ca-invoice-software.css'), false, null);
        wp_enqueue_script('ca-invoice-software', asset_path('scripts/ca-invoice-software.js'), ['jquery'], null, true);
    } elseif ($page_template == "business-name-generator.blade.php") {
        wp_enqueue_style('business-name-generator', asset_path('styles/business-name-generator.css'), false, null);
        wp_enqueue_script('business-name-generator', asset_path('scripts/business-name-generator.js'), ['jquery'], null, true);
    } elseif ($page_template == "contact-us.blade.php") {
        wp_enqueue_style('contact-us', asset_path('styles/contact-us.css'), false, null);
        wp_enqueue_script('contact-us', asset_path('scripts/contact-us.js'), ['jquery'], null, true);
    } elseif ($page_template == "easy-bookkeeping.blade.php") {
        wp_enqueue_style('easy-bookkeeping', asset_path('styles/easy-bookkeeping.css'), false, null);
        wp_enqueue_script('easy-bookkeeping', asset_path('scripts/easy-bookkeeping.js'), ['jquery'], null, true);
    } elseif ($page_template == "which-version.blade.php") {
        wp_enqueue_style('which-version', asset_path('styles/which-version.css'), false, null);
        wp_enqueue_script('which-version', asset_path('scripts/which-version.js'), ['jquery'], null, true);
    } elseif ($page_template == "apple.blade.php") {
        wp_enqueue_style('apple', asset_path('styles/apple.css'), false, null);
        wp_enqueue_script('apple', asset_path('scripts/apple.js'), ['jquery'], null, true);
    } elseif ($page_template == "new-freshbooks-june-update.blade.php") {
        wp_enqueue_style('new-freshbooks-june-update', asset_path('styles/new-freshbooks-june-update.css'), false, null);
        wp_enqueue_script('new-freshbooks-june-update', asset_path('scripts/new-freshbooks-june-update.js'), ['jquery'], null, true);
    } elseif ($page_template == "new-freshbooks-launch.blade.php") {
        wp_enqueue_style('new-freshbooks-launch', asset_path('styles/new-freshbooks-launch.css'), false, null);
        wp_enqueue_script('new-freshbooks-launch', asset_path('scripts/new-freshbooks-launch.js'), ['jquery'], null, true);
    } elseif ($page_template == "new-freshbooks.blade.php") {
        wp_enqueue_style('new-freshbooks', asset_path('styles/new-freshbooks.css'), false, null);
        wp_enqueue_script('new-freshbooks', asset_path('scripts/new-freshbooks.js'), ['jquery'], null, true);
    } elseif ($cpt_template == "single-api.blade.php") {
        wp_enqueue_style('api', asset_path('styles/api.css'), false, null);
        wp_enqueue_script('api', asset_path('scripts/api.js'), ['jquery'], null, true);
    } elseif ($cpt_template == "single-education.blade.php") {
        wp_enqueue_style('education-pages', asset_path('styles/education-pages.css'), false, null);
        wp_enqueue_script('education-pages', asset_path('scripts/education-pages.js'), ['jquery'], null, true);
    } elseif ($page_template == "nice-reply.blade.php") {
        wp_enqueue_style('nice-reply', asset_path('styles/nice-reply.css'), false, null);
        wp_enqueue_script('nice-reply', asset_path('scripts/nice-reply.js'), ['jquery'], null, true);
    } elseif ($page_template == "signup.blade.php") {
        wp_enqueue_style('signup', asset_path('styles/signup.css'), false, null);
        wp_enqueue_script('signup', asset_path('scripts/signup.js'), ['jquery'], null, true);
    } elseif ($page_template == "signup-new.blade.php") {
        wp_enqueue_style('signup-new', asset_path('styles/signup-new.css'), false, null);
        wp_enqueue_script('signup-new', asset_path('scripts/signup-new.js'), ['jquery'], null, true);
    } elseif ($cpt_template == "newsletter-blog.blade.php") {
        wp_enqueue_style('newsletter-blog', asset_path('styles/newsletter-blog.css'), false, null);
        wp_enqueue_script('newsletter-blog', asset_path('scripts/newsletter-blog.js'), ['jquery'], null, true);
    } elseif ($page_template == "developers-page.blade.php" || $cpt_template == "single-developers.blade.php") {
        wp_enqueue_style('developers', asset_path('styles/developers.css'), false, null);
        wp_enqueue_script('developers', asset_path('scripts/developers.js'), ['jquery'], null, true);
    } elseif ($page_template == "annual-report.blade.php") {
        wp_enqueue_style('annual-report', asset_path('styles/annual-report.css'), false, null);
        wp_enqueue_script('annual-report-waypoint', 'https://cdnjs.cloudflare.com/ajax/libs/waypoints/4.0.1/jquery.waypoints.js', ['jquery'], null, true);
        wp_enqueue_script('annual-report', asset_path('scripts/annual-report.js'), ['jquery'], null, true);
    } elseif ($page_template == "partner-portal.blade.php") {
        wp_enqueue_style('partner-portal', asset_path('styles/partner-portal.css'), false, null);
        wp_enqueue_script('partner-portal', asset_path('scripts/partner-portal.js'), ['jquery'], null, true);
    } else {
        wp_enqueue_style('global', asset_path('styles/global.css'), false, null);
        wp_enqueue_script('global', asset_path('scripts/global.js'), ['jquery'], null, true);
    }
});

/**
 * Register custom scripts
 */

add_action('wp_enqueue_scripts', function () {
    wp_register_script('trustpilot', '//widget.trustpilot.com/bootstrap/v5/tp.widget.bootstrap.min.js', false, false, true);
});

add_action('wp_enqueue_scripts', function () {
    $page_template = basename(get_page_template());
    if ($page_template == 'home-page.blade.php' ||
        $page_template == 'product-tour.blade.php' ||
        $page_template == 'who-its-for.blade.php' ||
        $page_template == 'pricing-page.blade.php'
    ) {
        wp_enqueue_script('ethnio', '//ethn.io/53100.js', [], null, true);
    }
});

/**
 * Theme setup
 */
add_action('after_setup_theme', function () {
    /**
     * Enable features from Soil when plugin is activated
     * @link https://roots.io/plugins/soil/
     */
    add_theme_support('soil-clean-up');
    add_theme_support('soil-nav-walker');
    add_theme_support('soil-nice-search');
    add_theme_support('soil-relative-urls');

    /**
     * Enable plugins to manage the document title
     * @link https://developer.wordpress.org/reference/functions/add_theme_support/#title-tag
     */
    add_theme_support('title-tag');

    /**
     * Register navigation menus
     * @link https://developer.wordpress.org/reference/functions/register_nav_menus/
     */
    register_nav_menus([
        'primary_navigation' => __('Primary Navigation', 'sage')
    ]);

    /**
     * Enable post thumbnails
     * @link https://developer.wordpress.org/themes/functionality/featured-images-post-thumbnails/
     */
    add_theme_support('post-thumbnails');

    /**
     * Enable HTML5 markup support
     * @link https://developer.wordpress.org/reference/functions/add_theme_support/#html5
     */
    add_theme_support('html5', ['caption', 'comment-form', 'comment-list', 'gallery', 'search-form']);

    /**
     * Enable selective refresh for widgets in customizer
     * @link https://developer.wordpress.org/themes/advanced-topics/customizer-api/#theme-support-in-sidebars
     */
    add_theme_support('customize-selective-refresh-widgets');

    /**
     * Use main stylesheet for visual editor
     * @see resources/assets/styles/layouts/_tinymce.scss
     */
    add_editor_style(asset_path('styles/main.css'));
}, 20);

/**
 * Register sidebars
 */
add_action('widgets_init', function () {
    $config = [
        'before_widget' => '<section class="widget %1$s %2$s">',
        'after_widget'  => '</section>',
        'before_title'  => '<h3>',
        'after_title'   => '</h3>'
    ];
    register_sidebar([
        'name'          => __('Primary', 'sage'),
        'id'            => 'sidebar-primary'
    ] + $config);
    register_sidebar([
        'name'          => __('Footer', 'sage'),
        'id'            => 'sidebar-footer'
    ] + $config);
});

/**
 * Updates the `$post` variable on each iteration of the loop.
 * Note: updated value is only available for subsequently loaded views, such as partials
 */
add_action('the_post', function ($post) {
    sage('blade')->share('post', $post);
});

/**
 * Setup Sage options
 */
add_action('after_setup_theme', function () {
    /**
     * Add JsonManifest to Sage container
     */
    sage()->singleton('sage.assets', function () {
        return new JsonManifest(config('assets.manifest'), config('assets.uri'));
    });

    /**
     * Add Blade to Sage container
     */
    sage()->singleton('sage.blade', function (Container $app) {
        $cachePath = config('view.compiled');
        if (!file_exists($cachePath)) {
            wp_mkdir_p($cachePath);
        }
        (new BladeProvider($app))->register();
        return new Blade($app['view']);
    });

    /**
     * Create @asset() Blade directive
     */
    sage('blade')->compiler()->directive('asset', function ($asset) {
        return "<?= " . __NAMESPACE__ . "\\asset_path({$asset}); ?>";
    });
});
