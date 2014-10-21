<?php
  /**
   *  The main template file.
   *
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
      <script src="//platform.linkedin.com/in.js" type="text/javascript">
      /* <![CDATA[ */
          lang: en_US
      /* ]]> */
      </script>

      <!-- THIS IS WHERE THE WORDPRESS CODE TO INCLUDE CONTENT GOES...! -->
      <label style="margin-bottom: 7px;">Can we help you find something?</label><br />
      <?php
          get_search_form();

          if(have_posts()) :
            while(have_posts()) :
              the_title();
              the_post();
              the_content();
            endwhile;
          endif;
        ?>
      </div>
    </div>
  </div>

<?php get_footer();
