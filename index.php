<?php
  /**
   *  The main template file.
   *
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

      <!-- THIS IS WHERE THE WORDPRESS CODE TO INCLUDE CONTENT GOES...! -->
      <?php
        if ( is_page( 'Home' ) ) {
          get_template_part( 'latest-solicitations', get_post_format() );
        }
      ?>


      <?php
          if(have_posts()) :
            while(have_posts()) :
      ?>
      <p>
        <?php
            the_post(); ?>

          <div class="alert alert-info">
            <?php edit_post_link( 'Edit this page ', '', '' ); ?> &middot; <a href="<?php _e(get_delete_post_link()); ?>">Delete this page</a>
          </div>

        <?php
            the_content();
            endwhile;
          endif;
        ?>
      </div>
    </div>
  </div>

<?php _e(do_shortcode('[google-translator]')); get_footer();
