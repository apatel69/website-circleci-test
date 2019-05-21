<?php

namespace App;

/**
 * Add <body> classes
 */
add_filter('body_class', function (array $classes) {
    /** Add page slug if it doesn't exist */
    if (is_single() || is_page() && !is_front_page()) {
        if (!in_array(basename(get_permalink()), $classes)) {
            $classes[] = basename(get_permalink());
        }
    }

    /** Add class if sidebar is active */
    if (display_sidebar()) {
        $classes[] = 'sidebar-primary';
    }

    /** Clean up class names for custom templates */
    $classes = array_map(function ($class) {
        return preg_replace(['/-blade(-php)?$/', '/^page-template-views/'], '', $class);
    }, $classes);

    return array_filter($classes);
});

/**
 * Add "… Continued" to the excerpt
 */
add_filter('excerpt_more', function () {
    return ' &hellip; <a href="' . get_permalink() . '">' . __('Continued', 'sage') . '</a>';
});

/**
 * Template Hierarchy should search for .blade.php files
 */
collect([
    'index', '404', 'archive', 'author', 'category', 'tag', 'taxonomy', 'date', 'home',
    'frontpage', 'page', 'paged', 'search', 'single', 'singular', 'attachment'
])->map(function ($type) {
    add_filter("{$type}_template_hierarchy", __NAMESPACE__.'\\filter_templates');
});

/**
 * Render page using Blade
 */
add_filter('template_include', function ($template) {
    $data = collect(get_body_class())->reduce(function ($data, $class) use ($template) {
        return apply_filters("sage/template/{$class}/data", $data, $template);
    }, []);
    if ($template) {
        echo template($template, $data);
        return get_stylesheet_directory().'/index.php';
    }
    return $template;
}, PHP_INT_MAX);

/**
 * Tell WordPress how to find the compiled path of comments.blade.php
 */
add_filter('comments_template', function ($comments_template) {
    $comments_template = str_replace(
        [get_stylesheet_directory(), get_template_directory()],
        '',
        $comments_template
    );
    return template_path(locate_template(["views/{$comments_template}", $comments_template]) ?: $comments_template);
});

/**
 * Add Fastly cache keys for easier purging
 */
add_action('purgely_pre_send_keys', function ($keys_object) {
    if (!is_404()) {
        $queried_obj = get_queried_object();
        $cache_keys = [
            'public-website'
        ];

        if (is_single() || is_page()) {
            $cache_keys[] = str_replace('_', '-', get_post_type($queried_obj->ID));

            if (is_front_page()) {
                $cache_keys[] = 'url_' . $queried_obj->post_name;
            } else {
                $cache_keys[] = 'url' . str_replace('/', '_', parse_url(get_permalink($queried_obj->ID))['path']);
            }
            if ($template_slug = get_page_template_slug()) {
                $cache_keys[] = 'tmp_' . str_replace(['views/', '.blade.php'], '', $template_slug);
            }
        } elseif (is_tax()) {
            $cache_keys[] = 'tax_' . str_replace('_', '-', $queried_obj->taxonomy);
            $cache_keys[] = 'url' . str_replace('/', '_', parse_url(get_term_link($queried_obj))['path']);
        }

        foreach ($cache_keys as $key) {
            if (substr($key, -1) !== '_') {
                $keys_object->add_key($key);
            }
        }
    }
});

/**
 * Add custom TTL values for Fastly caching
 */
add_action('purgely_pre_send_surrogate_control', function ($headers_object) {
    if (!is_404()) {
        $custom_ttl_values = [
            [
                'filter_type' => 'url',
                'filter_val'  => '/careers',
                'headers' => [
                    'max-age' => '3600'
                ],
            ],
            [
                'filter_type' => 'url',
                'filter_val'  => '/holiday-thank-you',
                'headers' => [
                    'max-age' => '0'
                ],
            ],
        ];

        foreach ($custom_ttl_values as $ttl_value) {
            $add_headers = false;

            switch ($ttl_value['filter_type']) {
                case 'url':
                    $add_headers = $add_headers || ( $ttl_value['filter_val'] === get_queried_object_url_path() );
                    break;
                case 'template':
                    $add_headers = $add_headers || ( $ttl_value['filter_val'] === get_queried_object_template() );
                    break;
            }

            if ($add_headers) {
                foreach ($ttl_value['headers'] as $header => $value) {
                    $headers_object->edit_headers([
                        $header => $value,
                    ]);
                }
            }
        }
    }
});
