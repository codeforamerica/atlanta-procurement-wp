<?php
/*
  Template Name: Archives
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
      <p>
        <h1>Archived solicitations</h1>
        We oversee commodity and service procurements for Aviation, Parks, Watershed, Public Works, and General Fund
        departments. Use the listing below to find all solicitations.
      </p><br />

      <!-- TODO: Have this display a list of truly archived posts. -->
      <?php get_template_part( 'solicitations-dropdown', get_post_format() ); ?>
    </div>
  </div>
</div>

<?php
  get_footer();
