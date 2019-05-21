<?php
/* 
 * This action removes default dns-prefetch
*/
remove_action('wp_head', 'wp_resource_hints', 2);
