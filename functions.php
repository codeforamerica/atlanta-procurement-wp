<?php

  /**
   * The Template for displaying all single posts
   *
   * @package WordPress
   * @subpackage procure-pretty
   * @since 1.0.0
   */

  @ini_set( 'upload_max_size' , '64M' );
  @ini_set( 'post_max_size', '64M');
  @ini_set( 'max_execution_time', '300' );

  function return_solicitation_label( $solicitation_status ) {
    if ( $solicitation_status == 'Under Evaluation' ) {
      return 'label-warning';
    } else if ( $solicitation_status == 'Canceled' ) {
      return 'label-danger';
    } else if ( $solicitation_status == 'Active' ) {
      return 'label-primary';
    } else if ( $solicitation_status == 'Awarded' ) {
      return 'label-default';
    } else if ( $solicitation_status == 'Open' ) {
      return 'label-success';
    }

    return 'label-default';
  }

  add_filter( 'media_send_to_editor', 'include_upload_date', 10, 3 );

  function include_upload_date( $html, $id, $attachment ) {
    $post_description = "  (Added: " . date("m/d/Y @ g:i a T") . ")";
    return $html . $post_description;
  }

  /** Tell WordPress to run procure_pretty_setup() when 'after_setup_theme' hook is run. */
  add_action( 'after_setup_theme', 'procure_pretty_setup' );

  /**
   * Sets up theme defaults and registers support for other languages.
   *
   * @uses add_theme_support() To add support for automatic feed links.
   *
   * @since 1.0.0
   */
  function procure_pretty_setup() {
    /** Add default posts and comments RSS feed links to head */
	  add_theme_support( 'automatic-feed-links' );

    /** Make theme available for translation. Translations are held in the /languages/ directory. */
    load_theme_textdomain( 'atl-procurement', get_template_directory(), '/languages' );

    $locale = get_locale();
    $locale_file = get_template_directory() . "/languages/$locale.php";
    if( is_readable( $locale_file ) )
      require_once( $locale_file );
  }

  add_filter( 'default_content', 'default_editor_content', 10, 2 );
  add_filter( 'default_title', 'solicitation_default_title', 10, 2 );

  /**
   * Sets default post title.
   *
   * Sets default post title, especially for solicitations.
   *
   * @since 1.0.0
   *
   * @param type $content Initial post content.
   * @todo Only have this work for posts in the 'Solicitations' category.
   */
  function solicitation_default_title( $content, $post ) {
    if( $post->post_type == 'post' )
      return 'FC-0000 Change This Solicitation Title (!!!)';
  }

  add_action( 'trashed_post', 'redirect_on_trash', 10, 1 );

  /**
   * Redirects logged-in Wordpress user back to dashboard after deleting a post.
   *
   * @since 1.0.0
   *
   * @param type $post_id The ID of the post they've trashed.
   */
  function redirect_on_trash($post_id) {
    wp_redirect(admin_url());
    exit;
  }

  /**
   * Sets default post content.
   *
   * Sets default post content, especially for solicitations.
   *
   * @since 1.0.0
   *
   * @param type $content Initial post content.
   * @todo Only have this work for posts in the 'Solicitations' category.
   */
  function default_editor_content( $content, $post ) {
    global $_REQUEST;

    if( $post->post_type == 'post' ) {
      $content = <<<EOT
        <h2>Buyer/Compliance Officer</h2>
        <p>
          <span style="color: red;">Who is the buyer/compliance officer? Add their information here. For example:</span><br />
          Jane C. Officer (janeofficer@atlantaga.gov)<br />
          404.330.6517
        </p>
        &nbsp;

        <h2>Project Summary</h2>
        <p><span style="color: red;">Add a project summary to describe the new solicitation.</span</p>
        &nbsp;

        <h2>Pre-Bid Conference Date &amp; Location</h2>
        <p>
          <span style="color: red;">When and where are the pre-bid conference?
          Example pre-bid conference text:</span><br />
          1:30pm EST, Thursday, September 18, 2014<br />
          55 Trinity Ave SW, Suite 1900, Atlanta, GA 30303
        </p>
        &nbsp;

        <h2>Site Visit Information</h2>
        <p>
          <span style="color: red;">When and where is the site visit? If there is no site visit associated with this solicitation, you can delete this entire block.
          Example site visit text:</span><br />
          1:30pm EST, Thursday, September 18, 2014<br />
          55 Trinity Ave SW, Atlanta, GA 30303
        </p>
        &nbsp;

        <h2>Pre-Bid/Proposal Documents</h2>
        <p>
          <ul>
            <li><a href="http://www.atlantaga.gov/modules/showdocument.aspx?documentid=14820" title="Web ad" target="_blank">Web ad</a></li>
            <li><a href="http://www.atlantaga.gov/modules/showdocument.aspx?documentid=14816" title="Solicitation document" target="_blank">Solicitation document</a></li>
            <li>Cost of solicitation documents: e.g., $150.00</li>
          </ul>
        </p>
        &nbsp;
EOT;

      return $content;
    }
  }
