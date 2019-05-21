<?php

function register_menus() {
  register_nav_menus(
    array(
      'footer-col-1'  =>  __( 'Footer Menu Column 1' ),
      'footer-col-2'  =>  __( 'Footer Menu Column 2' ),
      'footer-col-3'  =>  __( 'Footer Menu Column 3' ),
      'footer-col-4'  =>  __( 'Footer Menu Column 4' ),
      'footer-col-5'  =>  __( 'Footer Menu Column 5' ),
      'footer-col-6'  =>  __( 'Footer Menu Column 6' ),
      'secondary-navigation'  =>  __( 'Secondary Navigation' ),
      'secondary-navigation_uk'  =>  __( 'Secondary Navigation UK' ),
      'product-tour'  =>  __( 'Product Tour Menu' ),
      'about-navigation'  =>  __( 'About Section Navigation' ),
      'policies-navigation'  =>  __( 'Policies Sidebar' ),
      'alt_header_default'  =>  __( 'Custom Header Default' ),
      'education-navigation'  =>  __( 'Education Header Menu' ),
      'accountants'  =>  __( 'Accountants Header Menu' ),
      'classic-footer'  =>  __( 'Classic Footer Menu' ),
      'classic-header'  =>  __( 'Classic Header Menu' ),
      'lpat-pages'  =>  __( 'LPAT Pages Header Menu' ),
      'invoice-software'  =>  __( 'CA Invoice Software' ),
      'contact-us'  =>  __( 'Contact Us' ),
      'easy-bookkeeping'  =>  __( 'Easy Bookkeeping' ),
      'custom-classic-menu'  =>  __( 'Custom Classic Menu' ),
      'segment-subheader-menu'  =>  __( 'Segment Sub-Header Menu' ),
      'annual-report-menu'  =>  __( 'Annual Report Menu' ),
    )
  );
}
add_action( 'init', 'register_menus' );
