<?php get_header(); ?>
<div class="page-content">
  <div class="wrapper">
    <div style="float: left; width: 200px;">
      <?php get_sidebar(); ?>
    </div>
    <div style="float: right; width: 600px; text-align: left;">
      <?php get_template_part( 'linkedin-share', get_post_format() ); ?>

      <!-- THIS IS WHERE THE WORDPRESS CODE TO INCLUDE CONTENT GOES...! -->
      <p>
        <h1>Solicitations</h1>
        We oversee commodity and service procurements for Aviation, Parks, Watershed, Public Works, and General Fund
        departments. Use the listing below to find all solicitations.
      </p><br / >
      <?php
          if(have_posts()) :
            while(have_posts() ) : the_post();
              get_template_part('solicitations-content', get_post_format());
            endwhile;
          endif;
      ?>
    </div>
  </div>
</div>

<?php get_footer();
