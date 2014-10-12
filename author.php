<?php get_header(); ?>
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
      <?php $curauth = (isset($_GET['author_name'])) ? get_user_by('slug', $author_name) : get_userdata(intval($author)); ?>
      <p>
        <h1>Posts by <?php echo $curauth->first_name . " " . $curauth->last_name ?></h1>
        <?php echo $curauth->description; ?>
      </p><br / >

      <?php
          if(have_posts()) :
            while(have_posts() ) : the_post();
              get_template_part('solicitations-content', get_post_format());
            endwhile;
          else: ?>
            <p><?php _e('No posts by this author.'); ?></p>
      <?php endif; ?>
    </div>
  </div>
</div>

<?php get_footer();
