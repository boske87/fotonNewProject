@extends('admin/layouts/crud/index')

@section('index_header')
    <h1>Links</h1>


    <div class="cms-options">
        <div class="cms-options-title-action">
            @include('admin.layouts.crud.flash_message')
            <h3 class="cms-options-title">Links</h3>
            <a href="{{url('admin/links/add')}}" class="cms-options-action btn btn-lg btn-primary">Add</a>
        </div>
    </div> <!-- =cms-options -->
@stop

@section('index_content')
    <span id="tableName" style="display: none; visibility: hidden;">Links</span>
    <div class="table-responsive">
        @if($items->count()>0)

            <table id="sortable-table" class="table">
                <thead>

                <tr>
                    <th></th>
                    <th>Link</th>
                    <th>Action</th>
                </tr>

                </thead>
                <tbody>
                @foreach($items as $item)
                    <tr id="{{ $item->id }}" class="{{ $item->deleted_at ? 'danger' : ''}}">
                        <td>
                            <a class="fancybox" rel="group" href="{{ Image::load('gallery/' . $item->main_image, ['h' => 10]) }}"><img src="{{ Image::load('gallery/' . $item->main_image, ['h' => 10]) }}" width="150px" alt=""></a>
                        </td>
                        <td>
                            {{$item->link}}
                        </td>
                        <td class="cms-column-actions">
                            <div class="btn-group btn-group-xs cms-table-actions">
                                {!! Form::open(['method' => 'DELETE', 'route' => ['admin.links.delete', $item->id], 'onsubmit' => "return confirm('Are you sure you want to DELETE this item?')"]) !!}
                                <button type="submit" class="btn btn-default"><span class="entypo entypo-cross"></span></button>

                                {!! Form::close() !!}
                            </div>
                        </td>
                    </tr>

                @endforeach

                </tbody>
            </table>

        @else

            <p class="alert alert-warning">There are no items.</p>
        @endif

    </div>
@endsection

