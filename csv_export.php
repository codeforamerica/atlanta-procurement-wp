<script type="text/javascript">
  $(function() {
    $('#export-button').on('click', function() {
      download_csv();
      return false;
    });

    $('#update-submit-btn').on('click', function() {
      var new_planholder = [$('#plan_holder_first_name').val(), $('#plan_holder_last_name').val(), $('#plan_holder_email').val(), $('#plan_holder_company_name').val()];
      var planholders = $.jStorage.get("planholders");

      if(planholders == null) {
        planholders = [];
      }

      planholders.push(new_planholder);

      $.jStorage.set("planholders", planholders);
    });

    $('#planholder-submit-btn').on('click', function() {
      var new_planholder = [$('#plan_holder_first_name').val(), $('#plan_holder_last_name').val(), $('#plan_holder_email').val(), $('#plan_holder_company_name').val(), "planholder"];
      var planholders = $.jStorage.get("planholders");
      if(planholders == null) {
        planholders = [];
      }

      planholders.push(new_planholder);

      $.jStorage.set("planholders", planholders);
    });
  });

  function download_csv() {
    window.csvContent = "data:text/csv;charset=utf-8,";
    var encodedUri = encodeURI(csvContent);
    var link = document.createElement("a");
    link.setAttribute("href", encodedUri);
    link.setAttribute("download", "planholder-data.csv");

    window.data = $.jStorage.get("planholders");

    window.data.forEach(function(infoArray, index){
      console.log(infoArray);
      dataString = infoArray.join(",");
      csvContent += index < infoArray.length ? dataString+ "\n" : dataString;
      console.log(csvContent);
    });

    var encodedUri = encodeURI(csvContent);
    window.open(encodedUri);
  }
</script>

<?php if( is_user_logged_in() ) { ?>
  <div class="alert alert-info">
    <a id="export-button">Export interested proponents</a>
  </div>
<?php } ?>
