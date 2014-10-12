<?php
/**
 * The Template for displaying all single posts
 *
 * @package WordPress
 * @subpackage procure-pretty
 * @since 1.0.0
 */

get_header(); ?>

  <div class="page-content">
    <div class="wrapper">
      <div style="float: left; width: 200px;">
        <?php get_sidebar(); ?>
      </div>
      <div style="float: right; width: 600px; text-align: left;">
        <script src="//platform.linkedin.com/in.js" type="text/javascript">
          /* <![CDATA[ */
            lang: en_US
          /* ]]> */
        </script>

        <?php if(have_posts()) : the_post(); ?>
          <!-- THIS IS WHERE THE WORDPRESS CODE TO INCLUDE CONTENT GOES...! -->
          <?php get_template_part( 'solicitation-content', get_post_format() ); ?>
        <?php endif; ?>
      </div>
    </div>
  </div>

<?php get_footer();
