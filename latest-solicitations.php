<?php
  if ( is_page( 'Home' ) ) { ?>
    <div class="alert alert-info">
      <h3>Latest opportunities</h3>
      <ul>
        <?php
          query_posts('category_name=Solicitations&showposts=3');
          while (have_posts()) : the_post(); ?>
            <li>
              <a href="<?php echo the_permalink(); ?>"><?php echo the_title(); ?></a>
            </li>
        <?php endwhile; wp_reset_query(); ?>
      </ul>
    </div>
<?php } ?>
