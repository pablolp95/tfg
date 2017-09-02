<div class="question-field">
    <?php
    $open = false;
    if(isset($question) && (isset($question->typable->video) || isset($question->typable->image))){
        $open = true;
    }
    ?>
    {!! Form::label("image-video", "Imagen/video:") !!}
    <label class="radio-inline">
        {!! Form::radio('image-video', '1', $open); !!}
        Si
    </label>
    <label class="radio-inline">
        {!! Form::radio('image-video', '0', !$open); !!}
        No
    </label>

    <div id="question-file" @if(!$open)class="hidden"@endif>
        @if($open)
        <!-- Nav tabs -->
        <ul class="file-nav" role="tablist">
            <li role="presentation" class="file-item{!! isset($question->typable->image) ? ' active': '' !!}"><a href="#image" aria-controls="image" role="tab" data-toggle="tab">Imagen</a></li>
            <li role="presentation" class="file-item{!! isset($question->typable->video) ? ' active': '' !!}"><a href="#video" aria-controls="video" role="tab" data-toggle="tab">Video</a></li>
        </ul>

        <!-- Tab panes -->
        <div class="tab-content">
            <div id="image" role="tabpanel" class="tab-pane {!! isset($question->typable->image) ? 'active': '' !!}">
                <input id="image_file" name="image_file" type="file" value="{{isset($question) && isset($question->typable->image) ? $question->typable->image->filename: ''}}">
            </div>
            <div id="video" role="tabpanel" class="tab-pane {!! isset($question->typable->video) ? 'active': '' !!}">
                {!! Form::label("url", "URL:") !!}
                <input id="video_url" type="text" name="url" value="{{isset($question) && isset($question->typable->video) ? $question->typable->video->url : ''}}">
            </div>
        </div>
        @else
        <!-- Nav tabs -->
        <ul class="file-nav" role="tablist">
            <li role="presentation" class="file-item active"><a href="#image" aria-controls="image" role="tab" data-toggle="tab">Imagen</a></li>
            <li role="presentation" class="file-item"><a href="#video" aria-controls="video" role="tab" data-toggle="tab">Video</a></li>
        </ul>

        <!-- Tab panes -->
        <div class="tab-content">
            <div id="image" role="tabpanel" class="tab-pane active">
                <input id="image_file" name="image" type="file">
            </div>
            <div id="video" role="tabpanel" class="tab-pane">
                {!! Form::label("url", "URL:") !!}
                <input id="video_url" type="text" name="url">
            </div>
        </div>

        @endif
    </div>
    <script>
        $('input[type=radio][name=image-video]').change(function() {
            if (this.value === '1') {
                $('#question-file').removeClass("hidden");
                $('#image_file').prop('disabled', false);
                $('#video_url').prop('disabled', false);
            }
            else if (this.value === '0') {
                $('#question-file').addClass('hidden');
                $('#image_file').prop('disabled', true);
                $('#video_url').prop('disabled', true);
            }
        });

        $('a[data-toggle="tab"][href="#image"]').on('shown.bs.tab', function (e) {
            $('#image_file').prop('disabled', false);
            $('#video_url').prop('disabled', true);
        });

        $('a[data-toggle="tab"][href="#video"]').on('shown.bs.tab', function (e) {
            $('#video_url').prop('disabled', false);
            $('#image_file').prop('disabled', true);
        });
    </script>
</div>