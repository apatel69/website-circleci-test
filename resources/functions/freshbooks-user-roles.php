<?php
/* Add custom user roles */
function add_user_roles() {
    global $wp_roles;

    if ( !isset($wp_roles) ) {
        $wp_roles = wp_roles();
    }

    add_role("affiliate_editor", "Affiliate Marketing Editor", [
        // Builtin
        "read"                   => true,
        "edit_posts"             => true,
        "publish_posts"          => true,
        "copy_posts"             => true,
        "unfiltered_html"        => true,
        "upload_files"           => true,
        "create_pages"           => true,
        "delete_others_pages"    => true,
        "delete_pages"           => true,
        "delete_published_pages" => true,
        "edit_others_pages"      => true,
        "edit_pages"             => true,
        "edit_published_pages"   => true,
        "publish_pages"          => true,
        "export"                 => true,
        // Custom Types - LPAT Pages
        "create_all_lpat_pages"           => true,
        "delete_others_all_lpat_pages"    => true,
        "delete_all_lpat_pages"           => true,
        "delete_published_all_lpat_pages" => true,
        "edit_others_all_lpat_pages"      => true,
        "edit_all_lpat_pages"             => true,
        "edit_published_all_lpat_pages"   => true,
        "publish_all_lpat_pages"          => true,
    ]);

    add_role("bd_editor", "Business Development Editor", [
        // Builtin
        "read"                   => true,
        "edit_posts"             => true,
        "publish_posts"          => true,
        "copy_posts"             => true,
        "unfiltered_html"        => true,
        "upload_files"           => true,
        "create_pages"           => true,
        "delete_others_pages"    => true,
        "delete_pages"           => true,
        "delete_published_pages" => true,
        "edit_others_pages"      => true,
        "edit_pages"             => true,
        "edit_published_pages"   => true,
        "publish_pages"          => true,
        "export"                 => true,
        // Custom Types - Addons
        "create_all_addons"           => true,
        "delete_others_all_addons"    => true,
        "delete_all_addons"           => true,
        "delete_published_all_addons" => true,
        "edit_others_all_addons"      => true,
        "edit_all_addons"             => true,
        "edit_published_all_addons"   => true,
        "publish_all_addons"          => true,
        // Custom Types - Education
        "create_all_education"           => true,
        "delete_others_all_education"    => true,
        "delete_all_education"           => true,
        "delete_published_all_education" => true,
        "edit_others_all_education"      => true,
        "edit_all_education"             => true,
        "edit_published_all_education"   => true,
        "publish_all_education"          => true,
        // Custom Types - Integrations
        "create_all_integrations"           => true,
        "delete_others_all_integrations"    => true,
        "delete_all_integrations"           => true,
        "delete_published_all_integrations" => true,
        "edit_others_all_integrations"      => true,
        "edit_all_integrations"             => true,
        "edit_published_all_integrations"   => true,
        "publish_all_integrations"          => true,
        // Custom Types - LPAT Pages
        "create_all_lpat_pages"           => true,
        "delete_others_all_lpat_pages"    => true,
        "delete_all_lpat_pages"           => true,
        "delete_published_all_lpat_pages" => true,
        "edit_others_all_lpat_pages"      => true,
        "edit_all_lpat_pages"             => true,
        "edit_published_all_lpat_pages"   => true,
        "publish_all_lpat_pages"          => true,
        // Integration Categories
        "manage_integration_categories" => true,
        "edit_integration_categories"   => true,
        "delete_integration_categories" => true,
        "assign_integration_categories" => true,
        // Integration Tags
        "manage_integration_tags" => true,
        "edit_integration_tags"   => true,
        "delete_integration_tags" => true,
        "assign_integration_tags" => true,
        // Addons Categories
        "manage_addons_categories" => true,
        "edit_addons_categories"   => true,
        "delete_addons_categories" => true,
        "assign_addons_categories" => true,
    ]);

    add_role("hr_editor", "HR Editor", [
        // Builtin
        "read"                   => true,
        "edit_posts"             => true,
        "publish_posts"          => true,
        "copy_posts"             => true,
        "unfiltered_html"        => true,
        "upload_files"           => true,
        "create_pages"           => true,
        "delete_others_pages"    => true,
        "delete_pages"           => true,
        "delete_published_pages" => true,
        "edit_others_pages"      => true,
        "edit_pages"             => true,
        "edit_published_pages"   => true,
        "publish_pages"          => true,
        "export"                 => true,
    ]);

    add_role("pr_editor", "PR Editor", [
        // Builtin
        "read"                   => true,
        "edit_posts"             => true,
        "publish_posts"          => true,
        "copy_posts"             => true,
        "unfiltered_html"        => true,
        "upload_files"           => true,
        "create_pages"           => true,
        "delete_others_pages"    => true,
        "delete_pages"           => true,
        "delete_published_pages" => true,
        "edit_others_pages"      => true,
        "edit_pages"             => true,
        "edit_published_pages"   => true,
        "publish_pages"          => true,
        "export"                 => true,
        // Custom Types - Data Research
        "create_all_data_research"           => true,
        "delete_others_all_data_research"    => true,
        "delete_all_data_research"           => true,
        "delete_published_all_data_research" => true,
        "edit_others_all_data_research"      => true,
        "edit_all_data_research"             => true,
        "edit_published_all_data_research"   => true,
        "publish_all_data_research"          => true,
        // Custom Types - Press Releases
        "create_all_press_releases"           => true,
        "delete_others_all_press_releases"    => true,
        "delete_all_press_releases"           => true,
        "delete_published_all_press_releases" => true,
        "edit_others_all_press_releases"      => true,
        "edit_all_press_releases"             => true,
        "edit_published_all_press_releases"   => true,
        "publish_all_press_releases"          => true,
    ]);

    add_role("pd_editor", "Product Development Editor", [
        // Builtin
        "read"                   => true,
        "edit_posts"             => true,
        "publish_posts"          => true,
        "copy_posts"             => true,
        "unfiltered_html"        => true,
        "upload_files"           => true,
        "create_pages"           => true,
        "delete_others_pages"    => true,
        "delete_pages"           => true,
        "delete_published_pages" => true,
        "edit_others_pages"      => true,
        "edit_pages"             => true,
        "edit_published_pages"   => true,
        "publish_pages"          => true,
        "export"                 => true,
        // Custom Types - API
        "create_all_api"           => true,
        "delete_others_all_api"    => true,
        "delete_all_api"           => true,
        "delete_published_all_api" => true,
        "edit_others_all_api"      => true,
        "edit_all_api"             => true,
        "edit_published_all_api"   => true,
        "publish_all_api"          => true,
        // Custom Types - API (Classic)
        "create_all_developers"           => true,
        "delete_others_all_developers"    => true,
        "delete_all_developers"           => true,
        "delete_published_all_developers" => true,
        "edit_others_all_developers"      => true,
        "edit_all_developers"             => true,
        "edit_published_all_developers"   => true,
        "publish_all_developers"          => true,
    ]);

    add_role("seo_editor", "SEO Editor", [
        // Builtin
        "read"                   => true,
        "edit_posts"             => true,
        "publish_posts"          => true,
        "copy_posts"             => true,
        "unfiltered_html"        => true,
        "upload_files"           => true,
        "create_pages"           => true,
        "delete_others_pages"    => true,
        "delete_pages"           => true,
        "delete_published_pages" => true,
        "edit_others_pages"      => true,
        "edit_pages"             => true,
        "edit_published_pages"   => true,
        "publish_pages"          => true,
        "export"                 => true,
        // Yoast Permissions
        "wpseo_bulk_edit"              => true,
        "wpseo_edit_advanced_metadata" => true,
        "wpseo_manage_options"         => true,
        // Custom Types - Accounting Software
        "create_all_accounting_software"           => true,
        "delete_others_all_accounting_software"    => true,
        "delete_all_accounting_software"           => true,
        "delete_published_all_accounting_software" => true,
        "edit_others_all_accounting_software"      => true,
        "edit_all_accounting_software"             => true,
        "edit_published_all_accounting_software"   => true,
        "publish_all_accounting_software"          => true,
        // Custom Types - Invoice Templates
        "create_all_invoice_templates"           => true,
        "delete_others_all_invoice_templates"    => true,
        "delete_all_invoice_templates"           => true,
        "delete_published_all_invoice_templates" => true,
        "edit_others_all_invoice_templates"      => true,
        "edit_all_invoice_templates"             => true,
        "edit_published_all_invoice_templates"   => true,
        "publish_all_invoice_templates"          => true,
        // Custom Types - Resources
        "create_all_resources"           => true,
        "delete_others_all_resources"    => true,
        "delete_all_resources"           => true,
        "delete_published_all_resources" => true,
        "edit_others_all_resources"      => true,
        "edit_all_resources"             => true,
        "edit_published_all_resources"   => true,
        "publish_all_resources"          => true,
        // Accounting Software Categories
        "manage_accounting_software_categories" => true,
        "edit_accounting_software_categories"   => true,
        "delete_accounting_software_categories" => true,
        "assign_accounting_software_categories" => true,
        // Invoice Templates Categories
        "manage_invoice_templates_categories" => true,
        "edit_invoice_templates_categories"   => true,
        "delete_invoice_templates_categories" => true,
        "assign_invoice_templates_categories" => true,
        // Resource Categories
        "manage_resource_categories" => true,
        "edit_resource_categories"   => true,
        "delete_resource_categories" => true,
        "assign_resource_categories" => true,
    ]);

    // Site Manager is a hybrid Editor/Admin with some restrictions
    add_role("site-manager", "Site Manager", array_merge($wp_roles->get_role('editor')->capabilities, [
        // Builtin
        "export"        => true,
        "edit_users"    => true,
        "create_users"  => true,
        "delete_users"  => true,
        "list_users"    => true,
        "promote_users" => true,
        "remove_users"  => true,
    ]));

    add_role("support_editor", "Support Editor", [
        // Builtin
        "read"                   => true,
        "edit_posts"             => true,
        "publish_posts"          => true,
        "copy_posts"             => true,
        "unfiltered_html"        => true,
        "upload_files"           => true,
        "create_pages"           => true,
        "delete_others_pages"    => true,
        "delete_pages"           => true,
        "delete_published_pages" => true,
        "edit_others_pages"      => true,
        "edit_pages"             => true,
        "edit_published_pages"   => true,
        "publish_pages"          => true,
        "export"                 => true,
        // Custom Types - Support
        "create_all_support"           => true,
        "delete_others_all_support"    => true,
        "delete_all_support"           => true,
        "delete_published_all_support" => true,
        "edit_others_all_support"      => true,
        "edit_all_support"             => true,
        "edit_published_all_support"   => true,
        "publish_all_support"          => true,
        // Support Categories
        "manage_support_categories" => true,
        "edit_support_categories"   => true,
        "delete_support_categories" => true,
        "assign_support_categories" => true,
    ]);

}

/* Add capabilities to the custom user roles */
function add_user_capabilities() {

    /* Yoast Role - SEO Editor */
    $wpseo_editor = get_role('wpseo_editor');
    if ( !is_null($wpseo_editor) ) {
        // Custom Types - Accounting Software
        $wpseo_editor->add_cap("create_all_accounting_software");
        $wpseo_editor->add_cap("delete_others_all_accounting_software");
        $wpseo_editor->add_cap("delete_all_accounting_software");
        $wpseo_editor->add_cap("delete_published_all_accounting_software");
        $wpseo_editor->add_cap("edit_others_all_accounting_software");
        $wpseo_editor->add_cap("edit_all_accounting_software");
        $wpseo_editor->add_cap("edit_published_all_accounting_software");
        $wpseo_editor->add_cap("publish_all_accounting_software");
        // Custom Types - Invoice Templates
        $wpseo_editor->add_cap("create_all_invoice_templates");
        $wpseo_editor->add_cap("delete_others_all_invoice_templates");
        $wpseo_editor->add_cap("delete_all_invoice_templates");
        $wpseo_editor->add_cap("delete_published_all_invoice_templates");
        $wpseo_editor->add_cap("edit_others_all_invoice_templates");
        $wpseo_editor->add_cap("edit_all_invoice_templates");
        $wpseo_editor->add_cap("edit_published_all_invoice_templates");
        $wpseo_editor->add_cap("publish_all_invoice_templates");
        // Custom Types - Resources
        $wpseo_editor->add_cap("create_all_resources");
        $wpseo_editor->add_cap("delete_others_all_resources");
        $wpseo_editor->add_cap("delete_all_resources");
        $wpseo_editor->add_cap("delete_published_all_resources");
        $wpseo_editor->add_cap("edit_others_all_resources");
        $wpseo_editor->add_cap("edit_all_resources");
        $wpseo_editor->add_cap("edit_published_all_resources");
        $wpseo_editor->add_cap("publish_all_resources");
        // Accounting Software Categories
        $wpseo_editor->add_cap("manage_accounting_software_categories");
        $wpseo_editor->add_cap("edit_accounting_software_categories");
        $wpseo_editor->add_cap("delete_accounting_software_categories");
        $wpseo_editor->add_cap("assign_accounting_software_categories");
        // Invoice Templates Categories
        $wpseo_editor->add_cap("manage_invoice_templates_categories");
        $wpseo_editor->add_cap("edit_invoice_templates_categories");
        $wpseo_editor->add_cap("delete_invoice_templates_categories");
        $wpseo_editor->add_cap("assign_invoice_templates_categories");
        // Resource Categories
        $wpseo_editor->add_cap("manage_resource_categories");
        $wpseo_editor->add_cap("edit_resource_categories");
        $wpseo_editor->add_cap("delete_resource_categories");
        $wpseo_editor->add_cap("assign_resource_categories");
    }

    /* Yoast Role - SEO Manager */
    $wpseo_manager = get_role('wpseo_manager');
    if ( !is_null($wpseo_manager) ) {
        // Custom Types - Accounting Software
        $wpseo_manager->add_cap("create_all_accounting_software");
        $wpseo_manager->add_cap("delete_others_all_accounting_software");
        $wpseo_manager->add_cap("delete_all_accounting_software");
        $wpseo_manager->add_cap("delete_published_all_accounting_software");
        $wpseo_manager->add_cap("edit_others_all_accounting_software");
        $wpseo_manager->add_cap("edit_all_accounting_software");
        $wpseo_manager->add_cap("edit_published_all_accounting_software");
        $wpseo_manager->add_cap("publish_all_accounting_software");
        // Custom Types - Invoice Templates
        $wpseo_manager->add_cap("create_all_invoice_templates");
        $wpseo_manager->add_cap("delete_others_all_invoice_templates");
        $wpseo_manager->add_cap("delete_all_invoice_templates");
        $wpseo_manager->add_cap("delete_published_all_invoice_templates");
        $wpseo_manager->add_cap("edit_others_all_invoice_templates");
        $wpseo_manager->add_cap("edit_all_invoice_templates");
        $wpseo_manager->add_cap("edit_published_all_invoice_templates");
        $wpseo_manager->add_cap("publish_all_invoice_templates");
        // Custom Types - Resources
        $wpseo_manager->add_cap("create_all_resources");
        $wpseo_manager->add_cap("delete_others_all_resources");
        $wpseo_manager->add_cap("delete_all_resources");
        $wpseo_manager->add_cap("delete_published_all_resources");
        $wpseo_manager->add_cap("edit_others_all_resources");
        $wpseo_manager->add_cap("edit_all_resources");
        $wpseo_manager->add_cap("edit_published_all_resources");
        $wpseo_manager->add_cap("publish_all_resources");
        // Accounting Software Categories
        $wpseo_manager->add_cap("manage_accounting_software_categories");
        $wpseo_manager->add_cap("edit_accounting_software_categories");
        $wpseo_manager->add_cap("delete_accounting_software_categories");
        $wpseo_manager->add_cap("assign_accounting_software_categories");
        // Invoice Templates Categories
        $wpseo_manager->add_cap("manage_invoice_templates_categories");
        $wpseo_manager->add_cap("edit_invoice_templates_categories");
        $wpseo_manager->add_cap("delete_invoice_templates_categories");
        $wpseo_manager->add_cap("assign_invoice_templates_categories");
        // Resource Categories
        $wpseo_manager->add_cap("manage_resource_categories");
        $wpseo_manager->add_cap("edit_resource_categories");
        $wpseo_manager->add_cap("delete_resource_categories");
        $wpseo_manager->add_cap("assign_resource_categories");
    }

    // Editors, Site Managers, and Admins need all custom capabilities
    foreach (['editor', 'site-manager', 'administrator'] as $role) {
        $roleObj = get_role($role);
        if (!is_null($roleObj)) {
            // Yoast Permissions
            $roleObj->add_cap("wpseo_bulk_edit");
            $roleObj->add_cap("wpseo_edit_advanced_metadata");
            $roleObj->add_cap("wpseo_manage_options");
            // Custom Types - Addons
            $roleObj->add_cap("create_all_addons");
            $roleObj->add_cap("delete_others_all_addons");
            $roleObj->add_cap("delete_all_addons");
            $roleObj->add_cap("delete_published_all_addons");
            $roleObj->add_cap("edit_others_all_addons");
            $roleObj->add_cap("edit_all_addons");
            $roleObj->add_cap("edit_published_all_addons");
            $roleObj->add_cap("publish_all_addons");
            // Custom Types - Education
            $roleObj->add_cap("create_all_education");
            $roleObj->add_cap("delete_others_all_education");
            $roleObj->add_cap("delete_all_education");
            $roleObj->add_cap("delete_published_all_education");
            $roleObj->add_cap("edit_others_all_education");
            $roleObj->add_cap("edit_all_education");
            $roleObj->add_cap("edit_published_all_education");
            $roleObj->add_cap("publish_all_education");
            // Custom Types - Integrations
            $roleObj->add_cap("create_all_integrations");
            $roleObj->add_cap("delete_others_all_integrations");
            $roleObj->add_cap("delete_all_integrations");
            $roleObj->add_cap("delete_published_all_integrations");
            $roleObj->add_cap("edit_others_all_integrations");
            $roleObj->add_cap("edit_all_integrations");
            $roleObj->add_cap("edit_published_all_integrations");
            $roleObj->add_cap("publish_all_integrations");
            // Custom Types - LPAT Pages
            $roleObj->add_cap("create_all_lpat_pages");
            $roleObj->add_cap("delete_others_all_lpat_pages");
            $roleObj->add_cap("delete_all_lpat_pages");
            $roleObj->add_cap("delete_published_all_lpat_pages");
            $roleObj->add_cap("edit_others_all_lpat_pages");
            $roleObj->add_cap("edit_all_lpat_pages");
            $roleObj->add_cap("edit_published_all_lpat_pages");
            $roleObj->add_cap("publish_all_lpat_pages");
            // Integration Categories
            $roleObj->add_cap("manage_integration_categories");
            $roleObj->add_cap("edit_integration_categories");
            $roleObj->add_cap("delete_integration_categories");
            $roleObj->add_cap("assign_integration_categories");
            // Integration Tags
            $roleObj->add_cap("manage_integration_tags");
            $roleObj->add_cap("edit_integration_tags");
            $roleObj->add_cap("delete_integration_tags");
            $roleObj->add_cap("assign_integration_tags");
            // Addons Categories
            $roleObj->add_cap("manage_addons_categories");
            $roleObj->add_cap("edit_addons_categories");
            $roleObj->add_cap("delete_addons_categories");
            $roleObj->add_cap("assign_addons_categories");
            // Custom Types - Data Research
            $roleObj->add_cap("create_all_data_research");
            $roleObj->add_cap("delete_others_all_data_research");
            $roleObj->add_cap("delete_all_data_research");
            $roleObj->add_cap("delete_published_all_data_research");
            $roleObj->add_cap("edit_others_all_data_research");
            $roleObj->add_cap("edit_all_data_research");
            $roleObj->add_cap("edit_published_all_data_research");
            $roleObj->add_cap("publish_all_data_research");
            // Custom Types - Press Releases
            $roleObj->add_cap("create_all_press_releases");
            $roleObj->add_cap("delete_others_all_press_releases");
            $roleObj->add_cap("delete_all_press_releases");
            $roleObj->add_cap("delete_published_all_press_releases");
            $roleObj->add_cap("edit_others_all_press_releases");
            $roleObj->add_cap("edit_all_press_releases");
            $roleObj->add_cap("edit_published_all_press_releases");
            $roleObj->add_cap("publish_all_press_releases");
            // Custom Types - API
            $roleObj->add_cap("create_all_api");
            $roleObj->add_cap("delete_others_all_api");
            $roleObj->add_cap("delete_all_api");
            $roleObj->add_cap("delete_published_all_api");
            $roleObj->add_cap("edit_others_all_api");
            $roleObj->add_cap("edit_all_api");
            $roleObj->add_cap("edit_published_all_api");
            $roleObj->add_cap("publish_all_api");
            // Custom Types - API (Classic)
            $roleObj->add_cap("create_all_developers");
            $roleObj->add_cap("delete_others_all_developers");
            $roleObj->add_cap("delete_all_developers");
            $roleObj->add_cap("delete_published_all_developers");
            $roleObj->add_cap("edit_others_all_developers");
            $roleObj->add_cap("edit_all_developers");
            $roleObj->add_cap("edit_published_all_developers");
            $roleObj->add_cap("publish_all_developers");
            // Custom Types - Accounting Software
            $roleObj->add_cap("create_all_accounting_software");
            $roleObj->add_cap("delete_others_all_accounting_software");
            $roleObj->add_cap("delete_all_accounting_software");
            $roleObj->add_cap("delete_published_all_accounting_software");
            $roleObj->add_cap("edit_others_all_accounting_software");
            $roleObj->add_cap("edit_all_accounting_software");
            $roleObj->add_cap("edit_published_all_accounting_software");
            $roleObj->add_cap("publish_all_accounting_software");
            // Custom Types - Invoice Templates
            $roleObj->add_cap("create_all_invoice_templates");
            $roleObj->add_cap("delete_others_all_invoice_templates");
            $roleObj->add_cap("delete_all_invoice_templates");
            $roleObj->add_cap("delete_published_all_invoice_templates");
            $roleObj->add_cap("edit_others_all_invoice_templates");
            $roleObj->add_cap("edit_all_invoice_templates");
            $roleObj->add_cap("edit_published_all_invoice_templates");
            $roleObj->add_cap("publish_all_invoice_templates");
            // Custom Types - Resources
            $roleObj->add_cap("create_all_resources");
            $roleObj->add_cap("delete_others_all_resources");
            $roleObj->add_cap("delete_all_resources");
            $roleObj->add_cap("delete_published_all_resources");
            $roleObj->add_cap("edit_others_all_resources");
            $roleObj->add_cap("edit_all_resources");
            $roleObj->add_cap("edit_published_all_resources");
            $roleObj->add_cap("publish_all_resources");
            // Accounting Software Categories
            $roleObj->add_cap("manage_accounting_software_categories");
            $roleObj->add_cap("edit_accounting_software_categories");
            $roleObj->add_cap("delete_accounting_software_categories");
            $roleObj->add_cap("assign_accounting_software_categories");
            // Invoice Templates Categories
            $roleObj->add_cap("manage_invoice_templates_categories");
            $roleObj->add_cap("edit_invoice_templates_categories");
            $roleObj->add_cap("delete_invoice_templates_categories");
            $roleObj->add_cap("assign_invoice_templates_categories");
            // Resource Categories
            $roleObj->add_cap("manage_resource_categories");
            $roleObj->add_cap("edit_resource_categories");
            $roleObj->add_cap("delete_resource_categories");
            $roleObj->add_cap("assign_resource_categories");
            // Custom Types - Support
            $roleObj->add_cap("create_all_support");
            $roleObj->add_cap("delete_others_all_support");
            $roleObj->add_cap("delete_all_support");
            $roleObj->add_cap("delete_published_all_support");
            $roleObj->add_cap("edit_others_all_support");
            $roleObj->add_cap("edit_all_support");
            $roleObj->add_cap("edit_published_all_support");
            $roleObj->add_cap("publish_all_support");
            // Support Categories
            $roleObj->add_cap("manage_support_categories");
            $roleObj->add_cap("edit_support_categories");
            $roleObj->add_cap("delete_support_categories");
            $roleObj->add_cap("assign_support_categories");
        }
    }
}

function render_user_role_as_class( $classes ) {
    global $current_user;
    foreach( $current_user->roles as $role )
        $classes .= ' role-' . $role;
    return trim( $classes );
}

function create_user_tool_bar ($admin_bar) {
    $user = wp_get_current_user();
    $role = ( array ) $user->roles;
    $args = [];
    $wp_admin_bar;


    if (
        in_array("affiliate_editor", $role) ||
        in_array("bd_editor", $role) ||
        in_array("hr_editor", $role) ||
        in_array("pd_editor", $role) ||
        in_array("pr_editor", $role) ||
        in_array("seo_editor", $role) ||
        in_array("support_editor", $role)
    ) {
        $admin_bar->add_menu([
            'id' => 'freshbooks-editor-tools',
            'title' => 'FreshBooks Editor Tools',
            'href' => false,
        ]);
    }

    /* Affiliate Editor */
    if (in_array("affiliate_editor", $role)) {
        create_fbtoolbar_item($admin_bar, "freshbooks-lpat-pages-settings", "LPAT Pages Settings", "/wp-admin/admin.php?page=acf-options-lpat-pages");
    }
    /* BD Editor */
    if (in_array("bd_editor", $role)) {
        create_fbtoolbar_item($admin_bar, "freshbooks-edit-integrations-page", "Edit Integrations Page", "/wp-admin/post.php?post=106&action=edit");
        create_fbtoolbar_item($admin_bar, "freshbooks-edit-addons-classic-page", "Edit Addons (Classic) Page", "/wp-admin/post.php?post=11108&action=edit");
    }
    /* HR Editor */
    if (in_array("hr_editor", $role)) {
        create_fbtoolbar_item($admin_bar, "freshbooks-edit-about-page", "Edit About Page", "/wp-admin/post.php?post=28&action=edit");
        create_fbtoolbar_item($admin_bar, "freshbooks-edit-team-page", "Edit Team Page", "/wp-admin/post.php?post=1277&action=edit");
        create_fbtoolbar_item($admin_bar, "freshbooks-edit-careers-page", "Edit Careers Page", "/wp-admin/post.php?post=32&action=edit");
    }
    /* PD Editor */
    if (in_array("pd_editor", $role)) {
        create_fbtoolbar_item($admin_bar, "freshbooks-edit-api-page", "Edit API Page", "/wp-admin/post.php?post=11734&action=edit");
        create_fbtoolbar_item($admin_bar, "freshbooks-edit-api-classic-page", "Edit API (Classic) Page", "/wp-admin/post.php?post=30204&action=edit");
    }
    /* PR Editor */
    if (in_array("pr_editor", $role)) {
        create_fbtoolbar_item($admin_bar, "freshbooks-edit-press-overview-page", "Edit Press Overview Page", "/wp-admin/post.php?post=35&action=edit");
        create_fbtoolbar_item($admin_bar, "freshbooks-edit-press-releases-page", "Edit Press Releases Page", "/wp-admin/post.php?post=2914&action=edit");
        create_fbtoolbar_item($admin_bar, "freshbooks-edit-press-data-research-page", "Edit Data & Research Page", "/wp-admin/post.php?post=2916&action=edit");
        create_fbtoolbar_item($admin_bar, "freshbooks-edit-press-news-coverage-page", "Edit News Coverage Page", "/wp-admin/post.php?post=2894&action=edit");
        create_fbtoolbar_item($admin_bar, "freshbooks-update-news-coverage-posts", "Update News Coverage Posts", "/wp-admin/admin.php?page=news-coverage");
    }
    /* SEO Editor */
    if (in_array("seo_editor", $role)) {
        create_fbtoolbar_item($admin_bar, "freshbooks-edit-accounting-software-page", "Edit Accounting Software Page", "/wp-admin/post.php?post=3783&action=edit");
        create_fbtoolbar_item($admin_bar, "freshbooks-edit-invoice-templates-page", "Edit Invoice Templates Page", "/wp-admin/post.php?post=6661&action=edit");
        create_fbtoolbar_item($admin_bar, "freshbooks-edit-invoice-templates-gallery-page", "Edit Invoice Templates Gallery Page", "/wp-admin/post.php?post=23618&action=edit");
        create_fbtoolbar_item($admin_bar, "freshbooks-edit-resource-hub-page", "Edit Resource Hub Page", "/wp-admin/post.php?post=32501&action=edit");
        create_fbtoolbar_item($admin_bar, "freshbooks-accounting-software-settings", "Accounting Software Settings", "/wp-admin/admin.php?page=acf-options-accounting-software");
        create_fbtoolbar_item($admin_bar, "freshbooks-invoice-templates-settings", "Invoice Templates Settings", "/wp-admin/admin.php?page=acf-options-invoice-templates");
        create_fbtoolbar_item($admin_bar, "freshbooks-resource-hub-settings", "Resource Hub Settings", "/wp-admin/admin.php?page=acf-options-resources");
    }
    /* Support Editor */
    if (in_array("support_editor", $role)) {
        create_fbtoolbar_item($admin_bar, "freshbooks-edit-support-page", "Edit Support Page", "/wp-admin/post.php?post=23314&action=edit");
        create_fbtoolbar_item($admin_bar, "freshbooks-support-settings", "Support Settings", "/wp-admin/admin.php?page=acf-options-support");
    }
}

function create_fbtoolbar_item ($admin_bar,$id, $title, $href) {
    $admin_bar->add_menu([
        'id' => $id,
        'title'  => $title,
        'parent' => 'freshbooks-editor-tools',
        'href' => $href,
    ]);
}

add_filter( 'admin_body_class', 'render_user_role_as_class' );

add_action( 'admin_init', 'add_user_roles');

add_action( 'admin_init', 'add_user_capabilities');

add_action('admin_bar_menu', 'create_user_tool_bar', 100);

// Remove menu entries
add_action( 'admin_menu', function() {
    $posts = wp_count_posts();

    if ( empty($posts) || ($posts->publish + $posts->future + $posts->draft + $posts->pending + $posts->private + $posts->trash) === 0 ) {
        remove_menu_page( 'edit.php' );
    }

    if ( !current_user_can( 'manage_options' ) ) {
        remove_submenu_page( 'tools.php', 'wp-migrate-db-pro' );
    }
});

add_action('admin_init', function() {
    global $wp_roles;

    if ( !isset($wp_roles) ) {
        $wp_roles = wp_roles();
    }

    if ( isset($wp_roles->roles['wpseo_manager']) && isset($wp_roles->role_names['wpseo_manager']) ) {
        $wp_roles->roles['wpseo_manager']['name'] = 'Yoast SEO Manager';
        $wp_roles->role_names['wpseo_manager'] = 'Yoast SEO Manager';
    }
    if ( isset($wp_roles->roles['wpseo_editor']) && isset($wp_roles->role_names['wpseo_editor']) ) {
        $wp_roles->roles['wpseo_editor']['name'] = 'Yoast SEO Editor';
        $wp_roles->role_names['wpseo_editor'] = 'Yoast SEO Editor';
    }
});

add_action('admin_init', function() {
    if ( !current_user_can('manage_options') ) {
        remove_action('admin_notices', 'update_nag', 3);
        remove_action('admin_notices', 'paused_plugins_notice', 5);
        remove_action('admin_notices', 'paused_themes_notice', 5);
        remove_action('admin_notices', 'maintenance_nag', 10);
    }
});
