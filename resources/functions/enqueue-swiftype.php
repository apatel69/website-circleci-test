<?php

add_action( 'wp_enqueue_scripts', 'add_inline_scripts' );

/**
 * Add swifttype script to pages based on the template
 */
function add_inline_scripts () {
    global $template;
    $cpt_template = basename($template);
    $page_template = basename(get_page_template());

    $swifttype_script = "(function(w,d,t,u,n,s,e){w['SwiftypeObject']=n;w[n]=w[n]||function(){(w[n].q=w[n].q||[]).push(arguments);};s=d.createElement(t);e=d.getElementsByTagName(t)[0];s.async=1;s.src=u;e.parentNode.insertBefore(s,e);})(window,document,'script','//s.swiftypecdn.com/install/v2/st.js','_st');";

    if ($page_template == "integrations-page.blade.php" || $cpt_template == "taxonomy-integration_categories.blade.php") {
        wp_add_inline_script(
            'integrations',
            $swifttype_script . "_st('install','ffTR_C-WwDmpzEJBZTXP','2.0.0');"
        );
    } elseif ($page_template == "addons.blade.php" || $cpt_template == "taxonomy-addons_categories.blade.php") {
        wp_add_inline_script(
            'addons',
            $swifttype_script . "_st('install','Js2R9af2zFhCqVFw1M2S','2.0.0');"
        );
    } elseif ($page_template == "support-page.blade.php" || $cpt_template == "single-support.blade.php" || $cpt_template == "taxonomy-support_categories.blade.php") {
        wp_add_inline_script(
            'support',
            $swifttype_script . "_st('install','1NN8ikpbV6Y7Qvw5riZx','2.0.0');"
        );
    } elseif ($page_template == "resources-page.blade.php" || $cpt_template == "taxonomy-resource_categories.blade.php") {
        wp_add_inline_script(
            'resources',
            $swifttype_script . "_st('install','m8yTCbpZ-soEYGzdaFVj','2.0.0');"
        );
    }
}
