<!-- Disclaimer modal. -->
<script type="text/javascript">
  $(function() {
    /* Don't show documents people click on unless they agree to the disclaimer popup. */
    $("a[href*='documentid=']").bind("contextmenu", function(e) {
      return false;
    });

    $("a[href*='documentid=']").on('click', function() {
      $('#disclaimer-dialog').modal('toggle');
      window.document_loading = $(this).attr('href');
      return false;
    });

    $('#disclaimer-agree').on('click', function() {
      window.location.href = window.document_loading;
    });
  });
</script>

<div class="modal fade" id="disclaimer-dialog">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal">
          <span aria-hidden="true">&times;</span>
          <span class="sr-only">Close</span>
        </button>
        <strong>Disclaimer</strong>
      </div>
      <div class="modal-body">
        <p>
          The City of Atlanta (the “City”) does not warrant, represent or guarantee the accuracy or completeness of information provided at this website. Information provided here is simply for your convenience. There may be recent addenda or changes in the Request for Proposals (“RFP”) or bid documents including, among other things, the bidding instructions, general conditions, technical specifications, and exhibits that may not be currently reflected at this site. The City shall not be responsible or liable in any way for errors, inaccuracies or omissions in any documents or information retrieved or downloaded from this site.
        </p>
        <p>
          For a complete set of specifications and the applicable RFP or bid documents, all interested bidders are directed to the City’s Plan Room (“Plan Room”) located at the Department of Procurement, Atlanta City Hall, 55 Trinity Avenue, S. W., Suite 1790, Atlanta, Georgia 30303.
        </p>
        <p>
          In the event of a conflict or discrepancy between the information or documents posted at this website and the RFP or bid documents published and contained in the Plan Room, the RFP or bid documents in the City’s Plan Room shall control.
        </p>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-default" data-dismiss="modal" id="disclaimer-disagree">I disagree. Nevermind.</button>
        <button type="button" class="btn btn-success" id="disclaimer-agree">I agree. Take me to the document &#10145;</button>
      </div>
    </div>
  </div>
</div>
