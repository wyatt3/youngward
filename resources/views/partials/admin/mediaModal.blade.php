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
        <form method="POST" enctype="multipart/form-data" id="media-upload">
            <input type="hidden" name="id" value="{{ $id }}">
            <input type="hidden" name="type" value="{{ 'App\\'.$type }}">
            <input type="file" id="files" name="attachments" multiple>
            <input type="submit" value="Upload">
        </form>
      </div>
    </div>
  </div>
</div>

<script>
  $(document).ready(function() {
    $.ajaxSetup({
      headers: {
          'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
      }
    });
    $
    $('#media-upload').submit(function(e) {
      e.preventDefault();
      var formData = new FormData(this);
      let TotalFiles = $('#files')[0].files.length; //Total files
      let files = $('#files')[0];
      for (let i = 0; i < TotalFiles; i++) {
      formData.append('files' + i, files.files[i]);
      }
      formData.append('TotalFiles', TotalFiles);
      $.ajax({
        type:'POST',
        url: "{{ route('media.add')}}",
        data: formData,
        cache:false,
        contentType: false,
        processData: false,
        dataType: 'json',
        success: (data) => {
          $('#files').val([]);
          $("#mediaModal").modal('hide');
          data.forEach((image) => {
            let html = '<div class="media-box position-relative"><div class="position-absolute text-white border border-dark rounded-circle remove-media" onclick="deleteMedia(event, ' + image.id + ')">&times;</div><img class="w-100" src="/storage/img/' + image.path +'"></div>'  
            console.log(html);
            $(".media-container .media-box:last").before(html);
          });
        },
      });
      });
  });
</script>