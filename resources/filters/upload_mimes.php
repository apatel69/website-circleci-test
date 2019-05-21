<?php

//allow SVG and EPS Uploading
function custom_upload_mimes( $upload_mimes ) {

	$upload_mimes['svg'] = 'image/svg+xml';
	$upload_mimes['svgz'] = 'image/svg+xml';
	$upload_mimes['eps'] = 'application/postscript';

	return $upload_mimes;
}
add_filter( 'upload_mimes', 'custom_upload_mimes', 10, 1 );

/**
 * Fixes the issue in WordPress 4.7.1 being unable to correctly identify SVGs
 *
 * @thanks @lewiscowles
 *
 * @param null $data
 * @param null $file
 * @param null $filename
 * @param null $mimes
 *
 * @return null
 */
function fix_mime_type_svg( $data = null, $file = null, $filename = null, $mimes = null ) {
    $ext = isset( $data['ext'] ) ? $data['ext'] : '';
    if ( strlen( $ext ) < 1 ) {
        $exploded = explode( '.', $filename );
        $ext      = strtolower( end( $exploded ) );
    }
    if ( $ext === 'svg' ) {
        $data['type'] = 'image/svg+xml';
        $data['ext']  = 'svg';
    } elseif ( $ext === 'svgz' ) {
        $data['type'] = 'image/svg+xml';
        $data['ext']  = 'svgz';
    }

    return $data;
}
add_filter( 'wp_check_filetype_and_ext', 'fix_mime_type_svg', 75, 4 );
