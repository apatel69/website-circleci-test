<?php

/**
 * Do not edit anything in this file unless you know what you're doing
 */

use Roots\Sage\Config;
use Roots\Sage\Container;

/**
 * Helper function for prettying up errors
 * @param string $message
 * @param string $subtitle
 * @param string $title
 */
$sage_error = function ($message, $subtitle = '', $title = '') {
    $title = $title ?: __('Sage &rsaquo; Error', 'sage');
    $footer = '<a href="https://roots.io/sage/docs/">roots.io/sage/docs/</a>';
    $message = "<h1>{$title}<br><small>{$subtitle}</small></h1><p>{$message}</p><p>{$footer}</p>";
    wp_die($message, $title);
};

/**
 * Ensure compatible version of PHP is used
 */
if (version_compare('7', phpversion(), '>=')) {
    $sage_error(__('You must be using PHP 7 or greater.', 'sage'), __('Invalid PHP version', 'sage'));
}

/**
 * Ensure compatible version of WordPress is used
 */
if (version_compare('4.7.0', get_bloginfo('version'), '>=')) {
    $sage_error(__('You must be using WordPress 4.7.0 or greater.', 'sage'), __('Invalid WordPress version', 'sage'));
}

/**
 * Ensure dependencies are loaded
 */
if (!class_exists('Roots\\Sage\\Container')) {
    if (!file_exists($composer = __DIR__.'/../vendor/autoload.php')) {
        $sage_error(
            __('You must run <code>composer install</code> from the Sage directory.', 'sage'),
            __('Autoloader not found.', 'sage')
        );
    }
    require_once $composer;
}

/**
 * Sage required files
 *
 * The mapped array determines the code library included in your theme.
 * Add or remove files to the array as needed. Supports child theme overrides.
 */
array_map(function ($file) use ($sage_error) {
    $file = "../app/{$file}.php";
    if (!locate_template($file, true, true)) {
        $sage_error(sprintf(__('Error locating <code>%s</code> for inclusion.', 'sage'), $file), 'File not found');
    }
}, ['helpers', 'setup', 'filters', 'admin']);

/**
 * Here's what's happening with these hooks:
 * 1. WordPress initially detects theme in themes/sage/resources
 * 2. Upon activation, we tell WordPress that the theme is actually in themes/sage/resources/views
 * 3. When we call get_template_directory() or get_template_directory_uri(), we point it back to themes/sage/resources
 *
 * We do this so that the Template Hierarchy will look in themes/sage/resources/views for core WordPress themes
 * But functions.php, style.css, and index.php are all still located in themes/sage/resources
 *
 * This is not compatible with the WordPress Customizer theme preview prior to theme activation
 *
 * get_template_directory()   -> /srv/www/example.com/current/web/app/themes/sage/resources
 * get_stylesheet_directory() -> /srv/www/example.com/current/web/app/themes/sage/resources
 * locate_template()
 * ├── STYLESHEETPATH         -> /srv/www/example.com/current/web/app/themes/sage/resources/views
 * └── TEMPLATEPATH           -> /srv/www/example.com/current/web/app/themes/sage/resources
 */
array_map(
    'add_filter',
    ['theme_file_path', 'theme_file_uri', 'parent_theme_file_path', 'parent_theme_file_uri'],
    array_fill(0, 4, 'dirname')
);
Container::getInstance()
    ->bindIf('config', function () {
        return new Config([
            'assets' => require dirname(__DIR__).'/config/assets.php',
            'theme' => require dirname(__DIR__).'/config/theme.php',
            'view' => require dirname(__DIR__).'/config/view.php',
        ]);
    }, true);

/**
 * Disable Comment section on admin panel
 */
require_once('functions/disable-comments.php');

/**
 * Add filter to save acf-json fields
 */
require_once('functions/acf-json.php');

/**
 * ACF options page
 */
require_once('functions/acf-options-page.php');

/**
 * Filter to disable emojicons
 */

require_once('filters/disable-emojis.php');

/**
 * Filter to disable resource hints
 */
require_once('filters/disable-resource-hints.php');

/**
 * Function to move jQuery & Migrate to bottom of page from head
 */

require_once('functions/move-wp-scripts.php');

/**
 * Action to remove generator meta tag
 */
remove_action('wp_head', 'wp_generator');

/**
 * Register custom menus
 */
require_once('filters/register-menus.php');

/**
 * Walker menu for Primary Navigation with Icons
 */
require_once('functions/primary-nav-walker.php');

/**
 * Walker menu for stripping ul li and nav container
 */
require_once('functions/secondary-nav-walker.php');

/**
 * Walker menu for removing a tag from current menu
 */
require_once('functions/policies-sidebar-nav-walker.php');

/**
 * Walker menu for dropdown select
 */
require_once('functions/dropdown-nav-walker.php');

/**
 * Walker menu for Press section
 */
require_once('functions/press-nav-walker.php');

/**
 * Get Menu Name for Footer Column Titles
 */
require_once('functions/menu-name-by-location.php');

/**
 * Filter to disable resource hints
 */
require_once('filters/upload_mimes.php');

/**
 * Filter to get all menus and populate as select option to render Tab navigation on certain templates
 */
require_once('filters/popluate_menus_in_dropdown.php');

/**
 * Filter to correct support formatting issues
 */
require_once('filters/support-content-filters.php');

/**
 * Shortcake shortcodes
 */
require_once('functions/shortcakes/init.php');
require_once('functions/shortcakes/blockquotes.php');
require_once('functions/shortcakes/images.php');
require_once('functions/shortcakes/invoice_template_name.php');
require_once('functions/shortcakes/title.php');
require_once('functions/shortcakes/integration_url.php');

/**
 * Disable default wp search
 */
require_once('functions/disable-wp-search.php');

/**
 * Asynchronously load scripts
 */
require_once('filters/async-scripts.php');

/**
 * Contact Page Form JSON API
 */
require_once('functions/contact-form.php');
/**
 * Nice Reply Form JSON API
 */
require_once('functions/nicereply.php');
/**
 * Primary Category for Custom Posts
 */
require_once('functions/primary-category.php');

/**
 * Return specified URI parameter value
 */
require_once('functions/get-uri-param.php');

/**
 * Add inline swifttype script for search
 */
require_once('functions/enqueue-swiftype.php');

/**
 * Add inline friend buy script for refer a friend pages
 */
require_once('functions/enqueue-friendbuy.php');
/**
 * Add inline Full Story script for journey tracking
 */
require_once('functions/enqueue-fullstory.php');

/**
 * Add custom HTTP headers
 */
require_once('functions/custom-http-headers.php');

/**
 * Remove trailing slashes
 */
add_filter('redirect_canonical', 'remove_trailing_slashes', 10, 2);

function remove_trailing_slashes($redirect_url, $requested_url) {
    preg_match("/^(.*)\/$/", $requested_url, $output_array);
    return isset($output_array[1]) ? $output_array[1] : $requested_url;
}

/**
 * Add shortcode capability to ACF textarea
 */
add_filter('acf/format_value/type=textarea', 'do_shortcode');


/**Add custom user roles for Freshbooks content editors */
require_once('functions/freshbooks-user-roles.php');

/**Add inline Optimizely script */
require_once('functions/enqueue-optimizely.php');

/**Add Free Invoice Creator Script */
require_once('functions/enqueue-free-invoice-creator.php');

//** Add option for async scripts*/
// Async load
function fb_enqueue_async($url) {
    if (strpos($url, '#asyncload') === false) {
        return $url;
    } elseif (is_admin()) {
        return str_replace('#asyncload', '', $url);
    } else { return str_replace('#asyncload', '', $url)."' async='async";
    }
}
add_filter('clean_url', 'fb_enqueue_async', 11, 1);

/**
 * Estimates the reading time for a given piece of $content.
 *
 * @param string $content Content to calculate read time for.
 * @param int $wpm Estimated words per minute of reader.
 *
 * @returns int $time Esimated reading time in minutes
 */
function estimated_reading_time($content = '', $wpm = 200) {
    $clean_content = strip_shortcodes($content);
    $clean_content = strip_tags($clean_content);
    $word_count = str_word_count($clean_content);
    $time = ceil($word_count / $wpm);
    return $time;
}

/**
 * Append URLs to Ypoast sitemap
 */
require_once('functions/append-urls-to-sitemap.php');
/**
 * Remove Yoast Schema to insert our own
 */
function bybe_remove_yoast_json($data) {
    $data = [];
    return $data;
}
add_filter('wpseo_json_ld_output', 'bybe_remove_yoast_json', 10, 1);

/** Disable XML-RPC **/
add_filter('xmlrpc_enabled', '__return_false');
remove_action('wp_head', 'rsd_link');

/** Remove unused shortlink tags from head **/
remove_action('wp_head', 'wp_shortlink_wp_head', 10);
remove_action('template_redirect', 'wp_shortlink_header', 11);

/** Block User Listing with WP-API **/
add_filter('rest_endpoints', function ($endpoints) {
    if (isset($endpoints['/wp/v2/users'])) {
        unset($endpoints['/wp/v2/users']);
    }
    if (isset($endpoints['/wp/v2/users/(?P<id>[\d]+)'])) {
        unset($endpoints['/wp/v2/users/(?P<id>[\d]+)']);
    }
    return $endpoints;
});

/**
 * Add API Categories from Options page to Single Page as dropdown
 */
require_once('functions/api-categories.php');

/**
 * Change <title> tags for custom post type
 */

require_once('functions/custom-title-tag.php');

/**
 * Add custom REST API endpoints/functions
 */
require_once('functions/rest-api-holiday-page.php');
require_once('functions/rest-api-geo-location.php');

/**
 * Business Name Generator Endpoint
 */
require_once('functions/business-name-generator.php');

/**
 * Add custom REST API endpoints/functions for invoice templates gallery page
 */
require_once('functions/rest-api-invoice-templates-gallery.php');

/** Temporary fox for select field types in ACF for default value types */
require_once('filters/acf-select-field-fix.php');

/** 
 * Rewrites for resource hub
 */
require_once('filters/resource-hub-rewrites.php');
