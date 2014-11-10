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
      <?php get_template_part( 'linkedin-share', get_post_format() ); ?>

      <!-- THIS IS WHERE THE WORDPRESS CODE TO INCLUDE CONTENT GOES...! -->

      <?php
          if ( !is_search() ):
            //get_template_part( 'edit_content', get_post_format() );
          endif;

          get_template_part( 'latest-solicitations', get_post_format() );

          if(have_posts()) :
            while(have_posts()) :
              the_post();
              the_content();

              get_template_part( 'solicitations-dropdown', get_post_format() );
            endwhile;
          endif;
        ?>
      </div>
    </div>
  </div>

<?php get_footer();
