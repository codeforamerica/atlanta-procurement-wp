<?php
  if ( is_page( 'Home' ) ) { ?>
    <div class="alert alert-info">
      <h3>Latest opportunities from the last 7 days</h3>
      <ul>
        <?php
          $args = array('category_name' => 'Solicitations', 'date_query' => array(array('after' => '1 week ago')));
          $posts_query = new WP_Query( $args );

          while ($posts_query->have_posts()) : $posts_query->the_post(); ?>
            <li>
              <a href="<?php echo the_permalink(); ?>"><?php echo the_title(); ?></a>
            </li>
        <?php endwhile; remove_filter( 'posts_where', 'filter_where' ); wp_reset_query(); ?>
      </ul>
    </div>
<?php } ?>
