<p>
  <h3><a href="<?php the_permalink(); ?>" title="<?php the_title_attribute(); ?>"><?php the_title(); ?></a></h3>
  Posted on <?php the_time( get_option( 'date_format' ) ); ?> at <?php the_time( 'g:i a T' ); ?><br />
  Last modified <?php the_modified_date( 'F j, Y' ); ?> at <?php the_modified_time( 'g:i a T' ); ?><br />
  <?php the_excerpt(); ?><br />
</p>
