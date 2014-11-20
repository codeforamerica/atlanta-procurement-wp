<!-- Build a dropdown box with all of the solicitations ... -->
<script type="text/javascript">
  /* <![CDATA[ */
  function no_data() {
    $('#no-active-solicitations').fadeIn();
    $('#project-solicitations,#solicitation-label,#choose-solicitations,#project-info-well').fadeOut();
  }

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
              .attr("style", "color: #fff; text-decoration: none")
              .text("Get more information")
            );

          $('#project-bids-due').html(DateFormat.format.date( new Date(parseInt(solicitation.custom_fields.bids_due[0]) * 1000 ), 'h:mm p, ddd, MMMM D, yyyy'));
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
          window.solicitations = data.posts;
          if(solicitations != undefined && solicitations.length > 0) {
            $('#product-category-cs,#product-category-label').fadeIn();

            if( $('#project-solicitations option').length > 1 ) {
              $('#project-solicitations,#solicitation-label,#choose-solicitations').fadeIn();
              $('#no-active-solicitations').fadeOut();
            } else { no_data(); }
          } else { no_data(); }
        })
        .fail(function(data) {
          console.log(data);
          console.log("Ooops.");
        });
      } else if($(this).val() == 'blank') { no_data(); }
    });

    $('#product-category-cs').change(function() {
      var commodity_sols = [], service_sols = [];

      if(solicitations.length > 0) {
        for(var i = 0; i < solicitations.length; i++) {
          for(var j = 0; j < solicitations[i].categories.length; j++) {
            console.log(solicitations[i]);
            if(solicitations[i].categories[j].slug == "commodities") {
              commodity_sols.push(solicitations[i]);
            } else if(solicitations[i].categories[j].slug == "services") {
              service_sols.push(solicitations[i]);
            }
          }
        }

        $('#project-solicitations').empty().append($('<option></option>').attr("value", "blank"));

        var _solicitations;

        if($(this).val() == 'services') {
          _solicitations = service_sols;
        } else if($(this).val() == 'commodities') {
          _solicitations = commodity_sols;
        }

        $.each(_solicitations, function(key, solicitation) {
          var due_date = null;

          if(solicitation.custom_fields.bids_due != undefined) {
            due_date = parseInt(solicitation.custom_fields.bids_due[0]);
            var right_now = Math.ceil(new Date().getTime() / 1000);

            if(due_date > right_now) {
              /* Include in the solicitations dropdown if the bid due date hasn't passed. */
              $('#project-solicitations')
                .append($('<option></option>')
                  .attr("value", solicitation.id)
                  .text(solicitation.title)
                );
            }
          }
        });

        if( $('#project-solicitations option').length > 1 ) {
          $('#project-solicitations,#solicitation-label,#choose-solicitations').fadeIn();
          $('#no-active-solicitations').fadeOut();
        } else { no_data(); }
      }
    });
  });
  /* ]]> */
</script>
<p>
<strong><label for="plan_holder[department]">1. Choose a department to get started</label></strong><br /><br />
<select class="form-control input-lg" id="project-departments" name="plan_holder[department]">
  <option value="blank"></option>
  <option value="all">All solicitations</option>
  <option value="citywide">Citywide</option>
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

<p id="choose-commodity-service">
  <strong><label for="plan_holder[product_category]" id="product-category-label" style="display: none;">2. Choose commodities or services.</label></strong><br /><br />
  <select class="form-control input-lg" id="product-category-cs" style="display: none;">
    <option value="blank"></option>
    <option value="services">Services</option>
    <option value="commodities">Commodities</option>
  </select>
</p><br />

<p id="choose-solicitations" style="display: none;">
  <strong><label for="plan_holder[solicitation]" style="display: none;" id="solicitation-label">3. Choose a solicitation.</label></strong><br /><br />
  <select class="form-control input-lg" id="project-solicitations" name="plan_holder[solicitation]" style="display: none;">
    <option value="blank"></option>
  </select>
</p>

<p id="no-active-solicitations" style="display: none;">
  This category doesn't include any active solicitations at the moment. Please choose another category.
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
      <div id="project-more-info-link"></div>
    </div>
  </div>
</div>
