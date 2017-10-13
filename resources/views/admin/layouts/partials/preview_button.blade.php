@if(isset($id))
{{ Form::hidden('preview_id', $id) }}
@endif
{{ Form::submit('Preview', ['name' => 'preview','class' => 'btn btn-default fnc-preview']) }}

<script>
$('.fnc-preview').click(function(e){
    e.preventDefault();

    var _form = $(this).parents('form');
    var action = _form.attr('action');
    var method = $('input[name=_method]', _form);

    method.attr('disabled', true);

    _form
        .attr('action', "{{ url('admin/' .  $url . '/preview') }}")
        .attr('target', 'preview-window')
        .submit()
        .attr('action', action)
        .attr('target', '');

    method.attr('disabled', false);
});
</script>