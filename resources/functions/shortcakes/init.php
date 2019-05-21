<?php

add_action( 'init', 'shortcode_ui_detection' );

function shortcode_ui_detection() {
	if ( ! function_exists( 'shortcode_ui_register_for_shortcode' ) ) {
		add_action( 'admin_notices', 'shortcode_ui_notice' );
	}
}

function shortcode_ui_notice() {
	if ( current_user_can( 'activate_plugins' ) ) {
		?>
		<div class="error message">
			<p><?php esc_html_e( 'Shortcode UI plugin must be active for Shortcode UI Example plugin to function.', 'blockquote-shortcode', 'shortcode-ui' ); ?></p>
		</div>
		<?php
	}
}

add_action( 'init', 'shortcode_ui_register_shortcodes' );

function shortcode_ui_register_shortcodes() {
	add_shortcode( 'blockquote', 'blockquote_shortcode' );
	add_shortcode( 'image', 'image_shortcode' );
	add_shortcode( 'invoice_template_name', 'invoice_template_name_shortcode' );
	add_shortcode( 'title', 'title_shortcode' );
	add_shortcode( 'integration_url', 'integration_url_shortcode' );
}

