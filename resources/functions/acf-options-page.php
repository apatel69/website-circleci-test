<?php

if( function_exists('acf_add_options_page') ) {

	acf_add_options_page(array(
		'page_title' 	=> 'General Settings',
		'menu_title'	=> 'General Settings',
		'menu_slug' 	=> 'theme-general-settings',
		'capability'	=> 'edit_pages',
		'redirect'		=> false
	));

	acf_add_options_sub_page(array(
		'page_title' 	=> 'Theme Header Settings',
		'menu_title'	=> 'Header',
		'parent_slug'	=> 'theme-general-settings',
        'capability'    => 'edit_pages',
	));

	acf_add_options_sub_page(array(
		'page_title' 	=> 'Theme Footer Settings',
		'menu_title'	=> 'Footer',
		'parent_slug'	=> 'theme-general-settings',
        'capability'    => 'edit_pages',
	));

	acf_add_options_sub_page(array(
		'page_title' 	=> 'Integration Page Settings',
		'menu_title'	=> 'Integrations',
		'parent_slug'	=> 'theme-general-settings',
        'capability'    => 'edit_all_integrations',
	));

	acf_add_options_sub_page(array(
		'page_title' 	=> 'Resource Page Settings',
		'menu_title'	=> 'Resources',
		'parent_slug'	=> 'theme-general-settings',
        'capability'    => 'edit_all_resources',
	));

	acf_add_options_sub_page(array(
		'page_title' 	=> 'Press Settings',
		'menu_title'	=> 'Press',
		'parent_slug'	=> 'theme-general-settings',
		'capability'    => 'edit_all_press_releases',
	));

	acf_add_options_page(array(
		'page_title' 	=> 'News Coverage',
		'menu_title'	=> 'News Coverage',
		'menu_slug' 	=> 'news-coverage',
		'icon_url' => 'dashicons-admin-post',
		'position' => '33.3',
		'parent_slug'	=> 'theme-general-settings',
		'redirect'		=> true,
		'capability'    => 'edit_all_press_releases',
	));

	acf_add_options_sub_page(array(
		'page_title' 	=> 'News Coverage',
		'menu_title'	=> 'News Coverage',
		'parent_slug'	=> 'news-coverage',
		'capability'    => 'edit_all_press_releases',
	));

	acf_add_options_sub_page(array(
		'page_title' 	=> 'Compare Section Settings',
		'menu_title'	=> 'Compare',
		'parent_slug'	=> 'theme-general-settings',
        'capability'    => 'edit_pages',
	));

	acf_add_options_page(array(
		'page_title' 	=> 'Site Configuration',
		'menu_title'	=> 'Site Configuration',
		'menu_slug' 	=> 'site-configuration',
		'capability'	=> 'manage_options', // Only admin can view this field. Ref: https://codex.wordpress.org/Roles_and_Capabilities
		'redirect'		=> true
	));

	acf_add_options_sub_page(array(
		'page_title' 	=> 'Contact Form Settings',
		'menu_title'	=> 'Contact Form Settings',
		'parent_slug'	=> 'site-configuration',
        'capability'    => 'manage_options',
	));

	acf_add_options_sub_page(array(
		'page_title' 	=> 'Webinar Page Settings',
		'menu_title'	=> 'Webinar Page Settings',
		'parent_slug'	=> 'site-configuration',
        'capability'    => 'manage_options',
	));

	acf_add_options_sub_page(array(
		'page_title' 	=> '404 Page',
		'menu_title'	=> '404 Page',
		'parent_slug'	=> 'theme-general-settings',
        'capability'    => 'manage_options',
	));

	acf_add_options_sub_page(array(
		'page_title' 	=> 'Invoice Templates',
		'menu_title'	=> 'Invoice Templates',
		'parent_slug'	=> 'theme-general-settings',
        'capability'    => 'edit_all_invoice_templates',
	));

	acf_add_options_sub_page(array(
		'page_title' 	=> 'Accounting Software',
		'menu_title'	=> 'Accounting Software',
		'parent_slug'	=> 'theme-general-settings',
        'capability'    => 'edit_all_accounting_software',
	));

	acf_add_options_sub_page(array(
		'page_title' 	=> 'Notification Banners',
		'menu_title'	=> 'Notification Banners',
		'parent_slug'	=> 'theme-general-settings',
        'capability'    => 'manage_options',
	));

	acf_add_options_sub_page(array(
		'page_title' 	=> 'Support',
		'menu_title'	=> 'Support',
		'parent_slug'	=> 'theme-general-settings',
        'capability'    => 'edit_all_support',
	));

	acf_add_options_sub_page(array(
		'page_title' 	=> 'Optimizely Settings',
		'menu_title'	=> 'Optimizely Settings',
		'parent_slug'	=> 'site-configuration',
        'capability'    => 'manage_options',
  ));

  	acf_add_options_sub_page(array(
		'page_title' 	=> 'LPAT Pages',
		'menu_title'	=> 'LPAT Pages',
		'parent_slug'	=> 'theme-general-settings',
        'capability'    => 'edit_all_lpat_pages',
	));

	acf_add_options_sub_page(array(
		'page_title' 	=> 'Education',
		'menu_title'	=> 'Education',
		'parent_slug'	=> 'theme-general-settings',
        'capability'    => 'edit_all_education',
	));

    acf_add_options_sub_page(array(
        'page_title' 	=> 'Add-ons',
        'menu_title'	=> 'Add-ons',
        'parent_slug'	=> 'theme-general-settings',
        'capability'    => 'edit_all_addons',
	));

    acf_add_options_sub_page(array(
        'page_title'    => 'API Pages',
        'menu_title'    => 'API Pages',
        'parent_slug'   => 'theme-general-settings',
        'capability'    => 'edit_all_api',
    ));

  	acf_add_options_sub_page(array(
		'page_title' 	=> 'Developer Resources',
		'menu_title'	=> 'Developer Resources',
		'parent_slug'	=> 'theme-general-settings',
        'capability'    => 'edit_all_developers',
	));

}
