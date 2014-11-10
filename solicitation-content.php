<?php
/**
 * The Template for displaying all single posts
 *
 * @package WordPress
 * @subpackage procure-pretty
 * @since 1.0.0
 */

?>

<?php get_template_part( 'linkedin-share', get_post_format() ); ?>

<?php get_template_part( 'edit_content', get_post_format() ); ?>
<?php get_template_part( 'csv_export', get_post_format() ); ?>

<h1><?php the_title(); ?></h1>
<p>
  Posted on <?php the_date( 'l, F j, Y' ); ?> at <?php the_time( 'g:i a T' ); ?>.<br />
  Last modified <?php the_modified_time('l, F j, Y \a\t g:i a T' ); ?>.
</p>
<p>
  <label class="label <?php echo return_solicitation_label(get_field('solicitation_status')); ?>"><?php the_field('solicitation_status') ?></label>
</p><br />

<p>
  <h2>Bids/Proposals Due</h2>
  <?php echo DateTime::createFromFormat('m/d/y g:i a', get_field('bids_due'))->format('l, F j, Y \a\t g:i a'); ?> ET
</p><br />

<?php the_content(); ?>

<br /><br /><br />
<h2>Sign up for further updates on this opportunity</h2>
<div class="form-group">
  <div class="row">
    <div class="col-sm-4">
      <label for="plan_holder_What's your first name">What's your first name?</label><span style="color: #c7254e; font-weight: bold;"> *</span>
      <input class="form-control input-lg col-sm-4" id="plan_holder_first_name" name="plan_holder[user_attributes][first_name]" placeholder="Jane" type="text">
    </div><br />
    <div class="col-sm-4">
      <label for="plan_holder_What's your last name">What's your last name?</label><span style="color: #c7254e; font-weight: bold;"> *</span>
      <input class="form-control input-lg" id="plan_holder_last_name" name="plan_holder[user_attributes][last_name]" placeholder="Doe" type="text">
    </div>
  </div><br>

  <div class="row">
    <div class="col-md-8">
      <label for="plan_holder_user_attributes_What's your email address">What's your email address?</label><span style="color: #c7254e; font-weight: bold;"> *</span>
      <input class="form-control input-lg" id="plan_holder_email" name="plan_holder[user_attributes][email]" placeholder="janedoe@excellent-vendor.com" type="text" value="">
      <span class="help-block">Be sure to use an email address that you check often to ensure you receive all updates.</span>
    </div>
  </div><br>
  <div class="row">
    <div class="col-md-6">
      <label for="plan_holder_company_attributes_Finally, what's the name of your company">Finally, what's the name of your company?</label><span style="color: #c7254e; font-weight: bold;"> *</span><br>
      <input class="form-control input-lg" id="plan_holder_company_name" name="plan_holder[company_attributes][name]" placeholder="ACME Widgets, Inc." type="text">
    </div><br><br>
    <div class="form-group">
      <div class="row">
        <div class="col-md-6">
          <input class="btn-success btn" data-disable-with="Adding you to the update list..." id="update-submit-btn" name="commit" type="submit" value="Submit to receive updates!" />
          <input class="btn-primary btn" data-disable-with="Adding you to the planholder's list..." id="planholder-submit-btn" name="commit" type="submit" value="Join the planholder's list...">
          <br /><br />
        </div>
      </div>
    </div>
  </div>
</div>

<br /><br />
<h3>Disclaimer</h3>
<p>
  The City of Atlanta (the “City”) does not warrant, represent or guarantee the accuracy or completeness of information provided at this website. Information provided here is simply for your convenience. There may be recent addenda or changes in the Request for Proposals (“RFP”) or bid documents including, among other things, the bidding instructions, general conditions, technical specifications, and exhibits that may not be currently reflected at this site. The City shall not be responsible or liable in any way for errors, inaccuracies or omissions in any documents or information retrieved or downloaded from this site.
</p>

<p>
  For a complete set of specifications and the applicable RFP or bid documents, all interested bidders are directed to the City’s Plan Room (“Plan Room”) located at the <a href="https://maps.google.com/?daddr=55+Trinity+Avenue+SW+Atlanta+GA+30303" target="_blank">Department of Procurement, Atlanta City Hall, 55 Trinity Avenue, S. W., Suite 1790, Atlanta, Georgia 30303</a>.
</p>

<p>
  In the event of a conflict or discrepancy between the information or documents posted at this website and the RFP or bid documents published and contained in the Plan Room, the RFP or bid documents in the City’s Plan Room shall control.
</p>

<?php get_template_part( 'csv_export', get_post_format() ); ?>
<?php get_template_part( 'disclaimer-modal', get_post_format() ); ?>
