<?php
/**
 * The Template for displaying all single posts
 *
 * @package WordPress
 * @subpackage procure-pretty
 * @since 1.0.0
 */

?>

<script src="//platform.linkedin.com/in.js" type="text/javascript">
/* <![CDATA[ */
  lang: en_US
/* ]]> */
</script>
<script type="IN/Share" data-url="<?php the_permalink(); ?>" data-counter="right"></script>

<?php get_template_part( 'edit_content', get_post_format() ); ?>

<h1><?php the_title(); ?></h1>
Posted by <?php the_author_posts_link(); ?> on <?php the_date( 'l, F j, Y' ); ?> at <?php the_time( 'g:i a T' ); ?>.<br /><br />

<?php the_content(); ?>

<h2>Sign up for further updates</h2>
<div class="form-group">
  <div class="row">
    <div class="col-sm-4">
      <label for="plan_holder_What's your first name">What's your first name?</label><span style="color: #c7254e; font-weight: bold;"> *</span>
      <input class="form-control input-lg col-sm-4" id="plan_holder_user_attributes_first_name" name="plan_holder[user_attributes][first_name]" placeholder="Jane" type="text">
    </div>
    <div class="col-sm-4">
      <label for="plan_holder_What's your last name">What's your last name?</label><span style="color: #c7254e; font-weight: bold;"> *</span>
      <input class="form-control input-lg" id="plan_holder_user_attributes_last_name" name="plan_holder[user_attributes][last_name]" placeholder="Doe" type="text">
    </div>
  </div><br>

  <div class="row">
    <div class="col-md-8">
      <label for="plan_holder_user_attributes_What's your email address">What's your email address?</label><span style="color: #c7254e; font-weight: bold;"> *</span>
      <input class="form-control input-lg" id="plan_holder_user_attributes_email" name="plan_holder[user_attributes][email]" placeholder="janedoe@excellent-vendor.com" type="text" value="">
      <span class="help-block">Be sure to use an email address that you check often to ensure you receive all updates.</span>
    </div>
  </div><br>
  <div class="row">
    <div class="col-md-6">
      <label for="plan_holder_company_attributes_Finally, what's the name of your company">Finally, what's the name of your company?</label><span style="color: #c7254e; font-weight: bold;"> *</span><br>
      <input class="form-control input-lg" id="plan_holder_company_attributes_name" name="plan_holder[company_attributes][name]" placeholder="ACME Widgets, Inc." type="text">
    </div><br><br>
    <div class="form-group">
      <div class="row">
        <div class="col-md-6">
          <input class="btn-success btn" data-disable-with="Downloading bidder's package &amp; adding you to the planholder's list..." id="planholder-submit-btn" name="commit" type="submit" value="Submit to receive updates!" />
          <input class="btn-primary btn" data-disable-with="Downloading bidder's package &amp; adding you to the planholder's list..." id="planholder-submit-btn" name="commit" type="submit" value="Join the planholder's list...">
          <br /><br />
          <span class="help-block">
            Bid document downloads are packaged as a compressed ZIP file to save space and for faster download.
            <a href="#" onclick="$('#zip-archive-directions').toggle(); return false;">Learn</a> how
            to open a ZIP file on your system.
          </span>
        </div>
      </div>

      <div class="row" style="display: none;" id="zip-archive-directions">
        <div class="col-md-6">
          <div class="well">
            <p>
              To learn how to open a ZIP file on <strong>Microsoft Windows</strong>,
              visit <a href="http://windows.microsoft.com/en-us/windows/compress-uncompress-files-zip-files#1TC=windows-7" target="_blank">Compress and uncompress (zip files)</a>.
            </p>
            <p>
              To learn how to open a ZIP file on <strong>Mac OS X</strong>,
              visit <a href="http://macs.about.com/od/faq1/f/How-To-Zip-And-Unzip-Files-And-Folders-On-A-Mac.htm" target="_blank">How to Zip and Unzip Files and Folders On a Mac</a>.
            </p>
          </div>
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
