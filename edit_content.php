<?php if( is_user_logged_in() ) { ?>
  <div class="alert alert-info">
    <?php edit_post_link( 'Edit this page ', '', '' ); ?> &middot; <a href="<?php _e(get_delete_post_link()); ?>">Delete this page</a>
  </div>
<?php } ?>
