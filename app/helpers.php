<?php

namespace App;

use Roots\Sage\Container;

/**
 * Get the sage container.
 *
 * @param string $abstract
 * @param array  $parameters
 * @param Container $container
 * @return Container|mixed
 */
function sage($abstract = null, $parameters = [], Container $container = null) {
    $container = $container ?: Container::getInstance();
    if (!$abstract) {
        return $container;
    }
    return $container->bound($abstract)
        ? $container->makeWith($abstract, $parameters)
        : $container->makeWith("sage.{$abstract}", $parameters);
}

/**
 * Get / set the specified configuration value.
 *
 * If an array is passed as the key, we will assume you want to set an array of values.
 *
 * @param array|string $key
 * @param mixed $default
 * @return mixed|\Roots\Sage\Config
 * @copyright Taylor Otwell
 * @link https://github.com/laravel/framework/blob/c0970285/src/Illuminate/Foundation/helpers.php#L254-L265
 */
function config($key = null, $default = null) {
    if (is_null($key)) {
        return sage('config');
    }
    if (is_array($key)) {
        return sage('config')->set($key);
    }
    return sage('config')->get($key, $default);
}

/**
 * @param string $file
 * @param array $data
 * @return string
 */
function template($file, $data = []) {
    if (remove_action('wp_head', 'wp_enqueue_scripts', 1)) {
        wp_enqueue_scripts();
    }

    return sage('blade')->render($file, $data);
}

/**
 * Retrieve path to a compiled blade view
 * @param $file
 * @param array $data
 * @return string
 */
function template_path($file, $data = []) {
    return sage('blade')->compiledPath($file, $data);
}

/**
 * @param $asset
 * @return string
 */
function asset_path($asset) {
    return sage('assets')->getUri($asset);
}

/**
 * @param string|string[] $templates Possible template files
 * @return array
 */
function filter_templates($templates) {
    $paths = apply_filters('sage/filter_templates/paths', [
        'views',
        'resources/views'
    ]);
    $paths_pattern = "#^(" . implode('|', $paths) . ")/#";

    return collect($templates)
        ->map(function ($template) use ($paths_pattern) {
            /** Remove .blade.php/.blade/.php from template names */
            $template = preg_replace('#\.(blade\.?)?(php)?$#', '', ltrim($template));

            /** Remove partial $paths from the beginning of template names */
            if (strpos($template, '/')) {
                $template = preg_replace($paths_pattern, '', $template);
            }

            return $template;
        })
        ->flatMap(function ($template) use ($paths) {
            return collect($paths)
                ->flatMap(function ($path) use ($template) {
                    return [
                        "{$path}/{$template}.blade.php",
                        "{$path}/{$template}.php",
                        "{$template}.blade.php",
                        "{$template}.php",
                    ];
                });
        })
        ->filter()
        ->unique()
        ->all();
}

/**
 * @param string|string[] $templates Relative path to possible template files
 * @return string Location of the template
 */
function locate_template($templates) {
    return \locate_template(filter_templates($templates));
}

/**
 * Determine whether to show the sidebar
 * @return bool
 */
function display_sidebar() {
    static $display;
    isset($display) || $display = apply_filters('sage/display_sidebar', false);
    return $display;
}

function is_post_type($type) {
    global $wp_query;
    if ($wp_query->have_posts()) :
        if ($type == get_post_type($wp_query->post->ID)) { return true;
        }
    endif;
    return false;
}

/**
 * Determine if post/page is for UK
 * @return bool
 */
function is_uk($page) {
    $uk_pages = get_field('global_uk_pages', 'option');
    $is_uk = false;
    if (in_array($page, $uk_pages)) {
        $is_uk = true;
    }
    return $is_uk;
}


/**
 * Gets the path component of the URL for the currently queried page/post/archive/etc.
 *
 * @return string
 */
function get_queried_object_url_path() {
    global $queried_object_url_path;

    if (!empty($queried_object_url_path)) {
        return $queried_object_url_path;
    }

    $queried_object_url_path = '';
    $object = get_queried_object();

    if (!empty($object)) {
        if (is_single() || is_page()) {
            $queried_object_url_path = parse_url(get_permalink($object->ID))['path'];
        } elseif (is_tax()) {
            $queried_object_url_path = parse_url(get_term_link($object))['path'];
        }
    }

    return $queried_object_url_path;
}

/**
 * Gets the template filename (with optional path) for the currently queried page/post/archive/etc.
 *
 * @param string|bool $path Should the path be returned (valid options are true/false and 'full').
 * @return string
 */
function get_queried_object_template($path = false) {
    global $queried_object_template;

    if (!empty($queried_object_template)) {
        return $queried_object_template;
    }

    $template_path = '';

    if (is_page()) {
        $template_path = get_page_template();
    } elseif (is_single()) {
        $template_path = get_single_template();
    } elseif (is_tax()) {
        $template_path = get_taxonomy_template();
    }

    if ($path === 'full') {
        $queried_object_template = $template_path;
    } elseif ($path) {
        $queried_object_template = str_replace(trailingslashit(TEMPLATEPATH), '', $template_path);
    } else {
        $queried_object_template = basename($template_path);
    }

    return $queried_object_template;
}

/**
 * Return the appropriate form action based on which domain we're currently on.
 *
 * @param string|null $hostname
 * @return string
 */
function getFormActionDomain($hostname = null) {
    if ($hostname === null) {
        $hostname = $_SERVER["SERVER_NAME"];
    }

    switch ($hostname) {
        case 'www.freshbooks.com':
            return 'my.freshbooks.com';
        case 'www.staging.freshenv.com':
        case 'www.uat.freshenv.com':
        case 'qatunezo.kinsta.com':
            return 'my.staging.freshenv.com';
        case 'www.freshbooks.test':
        case 'www.dev.freshenv.com':
            return 'my.dev.freshenv.com';
    }
}
