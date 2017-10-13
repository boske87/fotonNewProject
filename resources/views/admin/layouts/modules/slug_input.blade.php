
<?php $fieldName = isset($fieldName) ? $fieldName : 'uri'; ?>
<?php $label = isset($label) ? $label : 'Slug'; ?>

 <!-- Slug Form Input -->
<div class="form-group{!! $errors ->has($fieldName) ? ' has-error' : '' !!}">
    {!! Form::label($fieldName, $label, ['class' => 'col-sm-2 control-label']) !!}
    <div class="col-sm-10">
        {!! Form::text($fieldName, null, ['class' => 'form-control', 'disabled' => true]) !!}
        {!! $errors ->first($fieldName, '<span class="help-block">:message</span>') !!}
        <span class="help-block">
            <a title="Edit {{ $label }}" href="#" id="fnc-edit-slug" class="btn btn-success btn-sm">Edit</a>
            <a title="Save new {{ $label }}" href="#" id="fnc-save-slug" class="btn btn-primary btn-sm hide">Save</a>
            <a title="Cancel" href="#" id="fnc-edit-cancel-slug" class="btn btn-default btn-sm hide">Cancel</a>
        </span>
    </div>
</div>

<script>
    var field_name = '{{ $fieldName }}';

    $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
    });
      $('#' + field_name).prop('disabled', true);


      function saveSlug() {
          $.post('/admin/save_slug',
                         { id : '{{ $item->id }}',
                           model : '{!! addslashes(get_class($item->getModel())) !!}',
                           field_name: field_name,
                           slug : $('#' + field_name).val()
                          },
                         function(data) {
                            $('#' + field_name).val(data);
                            disableSlugEdit();
                   });
      }

     function enableSlugEdit() {
         $("#" + field_name).prop('disabled', false);
         $('#fnc-save-slug').removeClass('hide');
         $('#fnc-edit-cancel-slug').removeClass('hide');
         $('#fnc-edit-slug').addClass('hide');
     }

     function disableSlugEdit() {
         $("#" + field_name).prop('disabled', true);
         $('#fnc-save-slug').addClass('hide');
         $('#fnc-edit-cancel-slug').addClass('hide');
         $('#fnc-edit-slug').removeClass('hide');
     }

    // edit link
    $('#fnc-edit-slug').click(function(e){
        e.preventDefault();
        enableSlugEdit();
    });

    // cancel link
    $('#fnc-edit-cancel-slug').click(function(e){
         e.preventDefault();
         disableSlugEdit();
    });

     // save link
     $('#fnc-save-slug').click(function(e){
          e.preventDefault();
          saveSlug();
     });

    // if enter key is pressed
     $('#' + field_name).keypress(function (e) {
      var key = e.which;
      if(key == 13)  // the enter key code
       {
        saveSlug();
        return false;
       }
     });

    // disable on form submit
     $('#' + field_name).closest('form').submit(function(){
        disableSlugEdit();
     });
</script>