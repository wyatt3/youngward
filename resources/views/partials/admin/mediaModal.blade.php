<div class="modal fade" id="mediaModal" tabindex="-1">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title">Add New Attachments</h5>
        <button type="button" class="close" data-dismiss="modal" >
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <form method="POST" enctype="multipart/form-data" action="{{ route('media.add') }}">
            <input type="file" name="attachments" multiple>
            <input type="submit" value="Upload">

        </form>
      </div>
    </div>
  </div>
</div>