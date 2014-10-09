<?php

  /**
   * The Template for displaying all single posts
   *
   * @package WordPress
   * @subpackage procure-pretty
   * @since 1.0.0
   */

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

  add_filter( 'default_content', 'default_editor_content' );
  add_filter( 'default_title', 'solicitation_default_title' );

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
  function solicitation_default_title( $content ) {
    return 'FC-0000 Change this solicitation title (!!!)';
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
  function default_editor_content( $content ) {
    global $_REQUEST;

    $content = <<<EOT
      <h2>Project summary</h2>
      <p>Add a project summary to describe the new solicitation.</p>
      &nbsp;

      <h2>Bids due</h2>
      <p>When is the bid due? For example: 1:59pm EST, Monday, August 19, 2014</p>
      &nbsp;

      <h2>Site visit information</h2>
      <p>
        When and where is the site visit? If there is no site visit associated with this solicitation, you can delete this entire block.
        Example site visit text:<br />
        1:30pm EST, Thursday, September 18, 2014<br />
        55 Trinity Ave SW, Atlanta, GA 30303
      </p>
      &nbsp;

      <h2>Contracting officer</h2>
      <p>
        Who is the contracting officer? Add their information here. For example:<br />
        Jane C. Officer (janeofficer@atlantaga.gov)<br />
        404.330.6517
      </p>
      &nbsp;

      <h2>Bid documents</h2>
      <p>
        <ul>
          <li><a href="http://atlantaga.gov/modules/showdocument.aspx?documentid=14820" title="Web ad" target="_blank">Web ad</a></li>
          <li><a href="http://atlantaga.gov/modules/showdocument.aspx?documentid=14816" title="Solicitation document" target="_blank">Solicitation document</a></li>
          <li><a href="http://atlantaga.gov/modules/showdocument.aspx?documentid=15086" title="Addendum No. 1" target="_blank">Addendum No. 1</a></li>
          <li><a href="http://atlantaga.gov/modules/showdocument.aspx?documentid=15182" title="Addendum No. 2" target="_blank">Addendum No. 2</a></li>
          <li><a href="http://atlantaga.gov/modules/showdocument.aspx?documentid=15252" title="Addendum No. 3" target="_blank">Addendum No. 3</a></li>
          <li><a href="http://atlantaga.gov/modules/showdocument.aspx?documentid=14999" title="Pre-proposal conference sign-in sheet" target="_blank">Pre-proposal conference sign-in sheet</a></li>
        </ul>
      </p>
      &nbsp;
EOT;

    return $content;
  }