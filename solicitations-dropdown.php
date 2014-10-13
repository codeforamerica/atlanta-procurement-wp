<!-- Build a dropdown box with all of the solicitations ... -->
<script type="text/javascript">
  /* <![CDATA[ */
  $(function() {
    $('#project-solicitations').change(function() {
      if($(this).val() != 'blank') {
        var post_url = "<?php _e(site_url()); ?>/?json=get_post&post_id=" + $(this).val();
        $.getJSON(post_url, function(data) {
          var solicitation = data.post;

          $('#project-more-info-link')
            .empty()
            .append($('<a></a>')
            .attr("href", solicitation.url)
            .attr("class", "btn btn-success")
            .text("Get more information")
          );

          if(solicitation.custom_fields.bids_due != null) {
            $('#project-bids-due').html(DateFormat.format.date( new Date(parseInt(solicitation.custom_fields.bids_due[0]) * 1000), 'h:mm p, ddd, MMMM D, yyyy'));
          }
          
          $('#project-summary').html(solicitation.excerpt);
          $('#project-info-title').html(solicitation.title);
          $('#project-info-well').fadeIn();
        });
      } else if($(this).val() == 'blank') { $('#project-info-well').fadeOut(); }
    });

    $('#project-departments').change(function() {
      if($(this).val() != 'blank') {
        var department = $('#project-departments').val();
        var dept_url = "<?php _e(site_url()); ?>/?json=get_tag_posts&tag_slug=" + department;
        $.getJSON(dept_url, function(data) {
          var solicitations = data.posts;
          if(solicitations.length > 0) {
            $('#project-solicitations').empty().append($('<option></option>').attr("value", "blank"));
            $.each(solicitations, function(key, value) {
              $('#project-solicitations')
                .append($('<option></option>')
                .attr("value", value.id)
                .text(value.title)
              );
            });

            $('#project-solicitations,#solicitation-label').fadeIn();
          } else { }
        })
        .fail(function(data) {
          console.log(data);
          console.log("Ooops.");
        });
      } else if($(this).val() == 'blank') { $('#project-info-well,#project-solicitations,#solicitation-label').fadeOut(); }
    });
  });
  /* ]]> */
</script>
<p>
<strong><label for="plan_holder[department]">1. Choose a department to get started</label></strong><br /><br />
<select class="form-control input-lg" id="project-departments" name="plan_holder[department]">
  <option value="blank"></option>
  <option value="aviation">Aviation</option>
  <option value="corrections">Corrections</option>
  <option value="finance">Finance</option>
  <option value="fire">Fire</option>
  <option value="human-resources">Human Resources</option>
  <option value="info-tech">Information Technology</option>
  <option value="law">Law</option>
  <option value="parks-rec">Parks &amp; Recreation</option>
  <option value="planning-comm-dev">Planning &amp; Community Development</option>
  <option value="procurement">Procurement</option>
  <option value="police">Police</option>
  <option value="public-works">Public Works</option>
  <option value="watershed-mgmt">Watershed Management</option>
</select>
</p><br />

<p>
  <strong><label for="plan_holder[solicitation]" style="display: none;" id="solicitation-label">2. Choose a solicitation.</label></strong><br /><br />
  <select class="form-control input-lg" id="project-solicitations" name="plan_holder[solicitation]" style="display: none;">
    <option value="blank"></option>
  </select>
</p>

<div class="row" id="project-info-well" style="display: none;">
  <div class="col-md-8">
    <div class="well" id="project-info-well-content">
      <strong style="font-size: 12pt;" id="project-info-title"></strong>
      <hr style="border-color: #ccc;" />
      <p>
        <strong>Project summary</strong><br />
        <span id="project-summary"></span>
      </p>
      <p>
        <strong>Bids due</strong><br />
        <span id="project-bids-due"></span>
      </p>
      <div id="project-more-info-link"></div>
    </div>
  </div>
</div>
