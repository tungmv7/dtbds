<?php
/**
 * PageLines Website Rendering Class
 *
 * @class     PL_UI_Site
 * @version   5.0.0
 * @package   PageLines/Classes
 * @category  Class
 * @author    PageLines
 */
if ( ! defined( 'ABSPATH' ) ) { exit; // Exit if accessed directly
}
class PL_UI_Site {

  function __construct() {

    global $plfactory;
    $this->factory = $plfactory;

    add_action( 'template_include',     array( $this->factory, 'preprocess' ), 100 );

    /** Sections Factory: Enqueue scripts & styles */
    add_action( 'wp_enqueue_scripts',   array( $this->factory, 'process_styles' ) );

    /** Sections Factory: Process section head and foot */
    add_action( 'wp_head',              array( $this->factory, 'process_head' ) );
    add_action( 'wp_footer',            array( $this->factory, 'process_foot' ) );

    /** Sections Factory: Render sections for each region of the page */
    add_action( 'pl_region_header',     array( $this, 'process_header' ) );
    add_action( 'pl_region_template',   array( $this, 'process_template' ) );
    add_action( 'pl_region_footer',     array( $this, 'process_footer' ) );

    add_filter( 'body_class',           array( $this, 'pl_body_classes' ) );

  }



  function process_header() {
    $this->factory->process_region( 'header' );
  }

  function process_template() {

    $this->factory->process_region( 'template' );
  }

  function process_footer() {
    $this->factory->process_region( 'footer' );
  }

  /**
   * PageLines Body Classes
   *
   * Sets up classes for controlling design and layout and is used on the body tag
   *
   */
  function pl_body_classes( $wp_classes ) {

    // child theme name
    $wp_classes[] = sanitize_html_class( strtolower( get_option( 'stylesheet' ) ) );

    if ( ! is_user_logged_in() ) {
      $wp_classes[] = 'logged-out';
    }

    // ensure no duplicates or empties
    $wp_classes = array_unique( array_filter( $wp_classes ) );

    return $wp_classes;
  }
} /* fin */
