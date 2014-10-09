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
          if(have_posts()) :
            while(have_posts()) :
      ?>
      <p>
        <?php
            the_post();
              the_content();
                edit_post_link( 'Edit this post ', '', '' );
            endwhile;
        ?>
        <br />
        <?php
          endif;
        ?>
      </div>
    </div>
  </div>

<?php get_footer();
