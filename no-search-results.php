<?php if ( is_search() ) : ?>
  <br /><br />
  <p><?php _e( '<strong>Sorry, but nothing matched your search terms.</strong> Please try again with different keywords. (Or check out the latest solicitations below!)' ); ?></p>
  <?php get_template_part( 'latest-solicitations', get_post_format() ); ?>
<?php endif; ?>
