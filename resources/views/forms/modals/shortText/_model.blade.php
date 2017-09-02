<div class="question-field">
    {!! Form::label("text", "Pregunta") !!}
    {!! Form::textarea("text", null, ["id" => "text", "class" => "form-control","rows" => "4"]) !!}
</div>

<div class="question-field">
    {!! Form::label("description", "Descripción") !!}
    {!! Form::textarea("description", null, ["id" => "description", "class" => "form-control","rows" => "4"]) !!}
</div>

<div class="question-field">
    {!! Form::label("max_num_characters", "Número máximo de carácteres") !!}
    {!! Form::text("max_num_characters", isset($question) ? $question->typable->max_num_characters : null, ["id" => "max_num_characters"]) !!}
</div>

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
        <!-- Nav tabs -->
        <ul class="file-nav" role="tablist">
            <li role="presentation" @if(isset($question->typable->image))class="active"@endif><a href="#image" aria-controls="image" role="tab" data-toggle="tab">Imagen</a></li>
            <li role="presentation" @if(isset($question->typable->video))class="active"@endif><a href="#video" aria-controls="video" role="tab" data-toggle="tab">Video</a></li>
        </ul>

        <!-- Tab panes -->
        <div class="tab-content">
            <div role="tabpanel" class="tab-pane {!! isset($question->typable->image) ? 'active': '' !!}" id="image">
                <input id="image-file" name="image-file" type="file">
            </div>
            <div role="tabpanel" class="tab-pane {!! isset($question->typable->video) ? 'active': '' !!}" id="video">
                {!! Form::label("url", "URL:") !!}
                <input type="text" name="url" value="{{isset($question) && isset($question->typable->video) ? $question->typable->video->url : ''}}">
            </div>
        </div>
    </div>
</div>

<div class="question-field">
    {!! Form::label("required", "Obligatoria:") !!}
    <label class="radio-inline">
        {!! Form::radio('required', '1', isset($question) ? $question->typable->required : 0); !!}
        Si
    </label>
    <label class="radio-inline">
        {!! Form::radio('required', '0', isset($question) ? !$question->typable->required : 1); !!}
        No
    </label>
</div>

<script>
    $('input[type=radio][name=image-video]').change(function() {
        if (this.value === '1') {
            $('#question-file').removeClass("hidden");
            $('image-file').prop('disabled', false);
            $('url').prop('disabled', false);
        }
        else if (this.value === '0') {
            $('#question-file').addClass('hidden');
            $('image-file').prop('disabled', true);
            $('url').prop('disabled', true);
        }
    });

    $('#image').on('shown.bs.tab', function () {
        $(this).prop('disabled', false);
        $('url').prop('disabled', true);
    });

    $('#video').on('shown.bs.tab', function () {
        $(this).prop('disabled', false);
        $('image-file').prop('disabled', true);
    });

</script>
