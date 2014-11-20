<?php if( is_user_logged_in() ) { ?>
  <div class="alert alert-info">
    <a id="export-button" href="<?php echo esc_url( home_url( '/' ) ); ?>wp-admin/edit.php?post_type=nf_sub">Export interested proponents</a>
  </div>
<?php } ?>
