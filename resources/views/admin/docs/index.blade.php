@extends('admin/layouts/crud/index')

@section('index_header')
    <h1>Dokumenti Foton Klub</h1>


    <div class="cms-options">
        <div class="cms-options-title-action">
            @include('admin.layouts.crud.flash_message')
            <h3 class="cms-options-title">
            @if(isset($title))
                {{$title}}
                @else

                Dokumenti Foton Klub</h3>
                @endif
                </h3>
            @if(isset($title))
            <a href="{{url('admin/docs-add-front')}}" class="cms-options-action btn btn-lg btn-primary">Add</a>
            @else
                <a href="{{url('admin/docs-add')}}" class="cms-options-action btn btn-lg btn-primary">Add</a>
            @endif
        </div>
        <div class="cms-options-filter">

        </div>
    </div> <!-- =cms-options -->
@stop

@section('index_content')
    <span id="tableName" style="display: none; visibility: hidden;">Dokumenti Foton Klub</span>
    <div class="table-responsive">
        @if($items->count()>0)

            <table id="sortable-table" class="table">
                <thead>
                <tr>
                    <th></th>
                    <th>Naziv</th>
                    <th>Actions</th>
                </tr>
                </thead>
                <tbody>
                 @foreach($items as $item)
                    <tr id="{{ $item->id }}" class="{{ $item->deleted_at ? 'danger' : ''}}">
                        <td>
                            <a href="/img/docs/{{$item->file}}"><img width="50px" src="{{asset('assets/img/docs.png')}}"> </a>
                              </td>
                        <td>
                            {{$item->name}}
                        </td>
                        <td class="cms-column-actions">
                            <div class="btn-group btn-group-xs cms-table-actions">
                                @if(isset($title))
                                    {!! Form::open(['method' => 'DELETE', 'route' => ['admin.docs-delete-front', $item->id], 'onsubmit' => "return confirm('Are you sure you want to DELETE this item?')"]) !!}

                                @else
                                {!! Form::open(['method' => 'DELETE', 'route' => ['admin.docs-delete', $item->id], 'onsubmit' => "return confirm('Are you sure you want to DELETE this item?')"]) !!}
                                @endif
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

