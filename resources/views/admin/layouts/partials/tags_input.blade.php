   <!-- Tags Form Input -->
    <div class="form-group{!! $errors ->has('tags') ? ' has-error' : '' !!}">
        {{ Form::label('tags', 'Tags', ['class' => 'col-sm-2 control-label']) }}
        <div class="col-sm-10">
            {{ Form::text('tags', isset($item) ? implode(',', $item->tagNames()) : null , ['class' => 'form-control']) }}
            {!! $errors ->first('tags', '<span class="help-block">:message</span>') !!}
        </div>
    </div>


    <link rel="stylesheet" href="{{ admin_asset('css/vendor/bootstrap/tagsinput.css')}}" />
    <script src="{{ admin_asset('js/vendor/bootstrap/tagsinput.js')}}"></script>
    <script>
    $(function() {
        $('#tags').tagsinput();
    });
    </script>