<?php
  /**
   *  The main template file.
   Template Name: Search Page
   */
  get_header();

  global $query_string;

  $query_args = explode("&", $query_string);
  $search_query = array();

  foreach($query_args as $key => $string) {
	   $query_split = explode("=", $string);
	   $search_query[$query_split[0]] = urldecode($query_split[1]);
   } // foreach

  $search = new WP_Query($search_query);
?>

<div class="page-content">
  <div class="wrapper">
    <div style="float: left; width: 200px;">
      <?php get_sidebar(); ?>
    </div>
    <div style="float: right; width: 600px; text-align: left;">
      <?php get_template_part( 'linkedin-share', get_post_format() ); ?>

      <!-- THIS IS WHERE THE WORDPRESS CODE TO INCLUDE CONTENT GOES...! -->
      <label style="margin-bottom: 7px;">Can we help you find something?</label><br />
      <?php
          get_search_form();

          if(have_posts()) :
            while(have_posts()) :
              if(!is_search()):
                the_post();
                the_content();
                //get_template_part( 'edit_content', get_post_format() );
              elseif(is_search()):
                the_post();
                get_template_part( 'solicitations-content', get_post_format() );
              endif;
            endwhile;
          else:
            get_template_part ( 'no-search-results', get_post_format() );
          endif;
        ?>
      </div>
    </div>
  </div>

<?php get_footer();
