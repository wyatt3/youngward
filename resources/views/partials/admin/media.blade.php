<label class="d-block">Attachments</label>
<div class="d-flex flex-row flex-wrap my-2">
    @foreach($activity->media ?? [] as $media)
        <div class="media-box position-relative">
            <div class="position-absolute text-white border border-dark rounded-circle remove-media" onclick="deleteMedia(event, {{ $media->id }})">&times;</div>
            <img class="w-100" src="{{ config('app.url') . '/storage/' . $media->path }}">
        </div>
    @endforeach
    <div class="media-box">
        <div class="w-100 h-100 d-flex justify-content-center align-items-center">
            <button type="button" class="border border-dark text-white rounded d-flex justify-content-center align-items-center add-media" data-toggle="modal" data-target="#mediaModal">
                <i class="fa-solid fa-plus"></i>
            </button>    
        </div>
    </div>
</div>
