@extends(isReorderMode() ? 'admin/layouts/crud/reorder_mode' : 'admin/layouts/admin')

@section('content')
    @if(isReorderMode())
        <div class="cms-edit-mode">
            <div class="cms-edit-mode-options">
                <div class="col-sm-12">
                    <h3 class="pull-left">Reorder Items</h3>
                    <a class="pull-right btn-link btn-lg close fnc-reordering-close" href="#" aria-hidden="true">&times;</a>
                    <a class="pull-right btn btn-default btn-lg fnc-reordering-save" href="#">Done</a>
                </div>
            </div>
            <div class="cms-edit-mode-element">
        @else
            @yield('index_header')
        @endif
            @yield('index_content')
        @if(isReorderMode())
        </div>
        <!-- =cms-edit-mode-element -->
    </div> <!-- =cms-edit-mode -->
    @endif
@stop

