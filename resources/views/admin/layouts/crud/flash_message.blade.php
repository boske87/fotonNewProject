@if (Session::has('flash_message'))
<div class="alert alert-{{ Session::has('flash_type') ? Session::get('flash_type') : 'warning' }} alert-dismissable fade in">
    <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
    <p>{!! Session::get('flash_message') !!}</p>
</div>
@endif


