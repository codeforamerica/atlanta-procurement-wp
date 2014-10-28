<?php
/**
 * Header.
 *
 * @package WordPress
 * @subpackage procure-pretty
 * @since 1.0.0
 */

?><!DOCTYPE html>
<!--[if IE 7]>
<html class="ie ie7" <?php language_attributes(); ?>>
<![endif]-->
<!--[if IE 8]>
<html class="ie ie8" <?php language_attributes(); ?>>
<![endif]-->
<!--[if !(IE 7) & !(IE 8)]><!-->
<html <?php language_attributes(); ?>>
<!--<![endif]-->
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width initial-scale=1" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge">

    <title><?php
      /*
        * Print the <title> tag based on what is being viewed.
      */
      global $page, $paged;

      wp_title( '|', true, 'right' );

      // Add the blog name.
      bloginfo( 'name' );

      // Add the blog description for the home/front page.
      $site_description = get_bloginfo( 'description', 'display' );
      if ( $site_description && ( is_home() || is_front_page() ) )
      echo " | $site_description";

      // Add a page number if necessary:
      if ( $paged >= 2 || $page >= 2 )
      echo ' | ' . sprintf( __( 'Page %s', 'shape' ), max( $paged, $page ) );

    ?></title>

    <link rel="stylesheet" href="<?php echo get_stylesheet_uri(); ?>" type="text/css" media="screen" />
    <link rel="pingback" href="<?php bloginfo( 'pingback_url' ); ?>" />
    <script src="//ajax.googleapis.com/ajax/libs/jquery/1.11.1/jquery.min.js"></script>
    <script type="text/javascript" src="//cdnjs.cloudflare.com/ajax/libs/jquery-backstretch/2.0.4/jquery.backstretch.min.js"></script>
    <script src="//raw.githack.com/phstc/jquery-dateFormat/master/dist/dateFormat.min.js"></script>
    <script src="//maxcdn.bootstrapcdn.com/bootstrap/3.2.0/js/bootstrap.min.js"></script>
    <script src="//cdnjs.cloudflare.com/ajax/libs/json2/20110223/json2.js"></script>
    <script src="//raw.githack.com/andris9/jStorage/master/jstorage.js"></script>
    <!--[if lt IE 9]>
    <script src="<?php echo get_template_directory_uri(); ?>/js/html5.js"></script>
    <![endif]-->
    <?php wp_head(); ?>
    <meta name="google-translate-customization" content="6e893a189cdd2fbd-996818ac49bf8871-g987d7e6bfd01cc32-d"></meta>
  </head>
  <body <?php body_class(); ?>>
    <header class="site-header">
      <div class="wrapper">
        <a class="site-title" href="/">Department of Procurement</a>

        <nav class="site-nav">
          <a href="#" class="menu-icon">
            <svg viewBox="0 0 18 15">
              <path fill="#424242" d="M18,1.484c0,0.82-0.665,1.484-1.484,1.484H1.484C0.665,2.969,0,2.304,0,1.484l0,0C0,0.665,0.665,0,1.484,0 h15.031C17.335,0,18,0.665,18,1.484L18,1.484z"/>
              <path fill="#424242" d="M18,7.516C18,8.335,17.335,9,16.516,9H1.484C0.665,9,0,8.335,0,7.516l0,0c0-0.82,0.665-1.484,1.484-1.484 h15.031C17.335,6.031,18,6.696,18,7.516L18,7.516z"/>
              <path fill="#424242" d="M18,13.516C18,14.335,17.335,15,16.516,15H1.484C0.665,15,0,14.335,0,13.516l0,0 c0-0.82,0.665-1.484,1.484-1.484h15.031C17.335,12.031,18,12.696,18,13.516L18,13.516z"/>
            </svg>
          </a>

          <div class="trigger">
            <a class="page-link" href="<?php echo site_url( '/supplier-registration/' ); ?>" style="color: white; font-weight: 500;">Become a Supplier</a>
            <a class="page-link" href="<?php echo site_url( '/solicitations/' ); ?>">Solicitations</a>
            <a class="page-link" href="<?php echo site_url( '/surplus-auctions/' ); ?>">Surplus Auctions</a>
            <a class="page-link" href="<?php echo site_url( '/faqs/' ); ?>">FAQs</a>
            <a class="page-link" href="<?php echo site_url( '/contact-us/' ); ?>">Contact Us</a>
          </div>
        </nav>
      </div>
    </header>
