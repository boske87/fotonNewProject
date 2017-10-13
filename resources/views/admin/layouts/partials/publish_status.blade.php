<!-- Publish Status Form Input -->
<div class="form-group{!! $errors ->has('publish_status') ? ' has-error' : '' !!}">
    {{ Form::label('publish_status', 'Publish Status', ['class' => 'col-sm-2 control-label']) }}
    <div class="col-sm-10">
        {{ Form::select('publish_status', Config::get('project.publish_status'), null, ['class' => 'form-control']) }}
        {!! $errors ->first('publish_status', '<span class="help-block">:message</span>') !!}
    </div>
</div>

<!-- Schedule for Form Input -->
<div class="form-group fnc-datetime{!! $errors ->has('publish_date') ? ' has-error' : '' !!}" style="display: none">
    {{ Form::label('publish_date', 'Publish on', ['class' => 'col-sm-2 control-label']) }}

    <div class="col-sm-10">
        <div class="datetime-picker input-group">
        {{ Form::text('publish_date', null, ['class' => 'form-control', 'data-field' => 'datetime']) }}
         <span class="input-group-addon"><span class="entypo entypo-calendar"></span></span>
        {!! $errors ->first('publish_date', '<span class="help-block">:message</span>') !!}
        </div>
    </div>
    <div id="dtBox"></div>
</div>


<link rel="stylesheet" href="{{ admin_asset('css/vendor/jquery/DateTimePicker.css')}}" />
<script src="{{ admin_asset('js/vendor/jquery/DateTimePicker.js')}}"></script>

<script>

    if ($('#publish_status option:selected').val() == 'future') {
        $('.fnc-datetime').show();
    }
    $('#publish_status').change(function() {
        $(this).val() == 'future' ? $('.fnc-datetime').slideDown() : $('.fnc-datetime').slideUp();
    });

    // don't display null date
//    if ($('#publish_date').val() == '0000-00-00 00:00:00') {
//        $('#publish_date').val('');
//    }

    $(function(){
        $("#dtBox").DateTimePicker({
//            dateTimeFormat: "MM-dd-yyyy HH:mm:ss"
            dateTimeFormat: "yyyy-MM-dd HH:mm:ss"
        });
    });

    // reset publish date if schedule is not selected
//    _form = $('#publish_date').closest('form');
//    _form.submit(function(){
//        if($('#publish_status').val() != 'future')
//        {
//            $('#publish_date').val('');
//        }
//    });

</script>


