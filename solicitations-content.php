<p>
  <h3><a href="<?php the_permalink(); ?>" title="<?php the_title_attribute(); ?>"><?php the_title(); ?></a></h3>
  Posted on <?php the_modified_date( 'l, F j, Y' ); ?> at <?php the_modified_time( 'g:i a T' ); ?>
  by <?php echo the_author_posts_link(); ?><br />
  <?php the_excerpt(); ?><br />
</p>
