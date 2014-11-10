<p>
  <h3><strong><a href="<?php the_permalink(); ?>" title="<?php the_title_attribute(); ?>"><?php the_title(); ?></a></strong>
    &nbsp;&nbsp;
    <label class="label <?php echo return_solicitation_label(get_field('solicitation_status')); ?>">
      <?php echo get_field('solicitation_status'); ?>
    </label>
  </h3>
  Posted on <?php the_time( get_option( 'date_format' ) ); ?> at <?php the_time( 'g:i a T' ); ?><br />
  Last modified <?php the_modified_date( 'F j, Y' ); ?> at <?php the_modified_time( 'g:i a T' ); ?><br />
  Bids/Proposals Due <?php echo DateTime::createFromFormat('m/d/y g:i a', get_field('bids_due'))->format('l, F j, Y \a\t g:i a'); ?>
</p>
<?php the_excerpt(); ?>
<div style="border-bottom: 1px solid #ccc; margin-top: 25px;">&nbsp;</div>
