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

      <?php
        $args = array ( 'category_name' => 'Solicitations', 'posts_per_page' => 5, 'post_type' => 'post', 'orderby' => 'post_date' );
        $posts = get_posts( $args );
        foreach( $posts as $post ):
          get_template_part( 'solicitations-content', get_post_format() );
        endforeach; ?>
    </div>
  </div>
</div>

<?php
  get_footer();
