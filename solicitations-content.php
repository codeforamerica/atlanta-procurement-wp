<p>
  <h3><a href="<?php the_permalink(); ?>" title="<?php the_title_attribute(); ?>"><?php the_title(); ?></a></h3>
  Posted on <?php the_modified_date( 'l, F j, Y' ); ?> at <?php the_modified_time( 'g:i a T' ); ?>
  by <a href="<?php echo get_the_author_link(); ?>" target="_blank"><?php echo get_the_author_meta('first_name') . " " . get_the_author_meta('last_name'); ?></a><br />
  <?php the_excerpt(); ?><br />
</p>
