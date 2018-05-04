@extends('admin/layouts/crud/index')

@section('index_header')
    <h1>Profesori</h1>


    <div class="cms-options">
        <div class="cms-options-title-action">
            @include('admin.layouts.crud.flash_message')
            <h3 class="cms-options-title">Korisnici</h3>
            {!! link_to_route('admin.users.add', 'Add', null, ['class' => 'cms-options-action btn btn-lg btn-primary']) !!}
        </div>

    </div> <!-- =cms-options -->
@stop

@section('index_content')
    <span id="tableName" style="display: none; visibility: hidden;">frontGallery</span>
    <div class="table-responsive">
        @if($items->count()>0)

            <table id="sortable-table" class="table">
                <thead>
                <tr>
                    <th>Ime i prezime</th>
                    <th>Status naloga</th>
                    <th>Moja galerija</th>
                    <th>Galerija zvanja</th>
                    <th>Vreme registrovanja</th>
                    <th>Actions</th>
                </tr>
                </thead>
                <tbody>
                @foreach($items as $item)
                    <tr id="{{ $item->id }}" class="{{ $item->deleted_at ? 'danger' : ''}}">
                        <td>{{$item->ime_prezime}}</td>
                        @if($item->status == 0)
                            <td style="color: red">Pasivan </td>
                        @else
                            <td style="color: green">Aktivan</td>
                        @endif

                        <td><a href="{{route('admin.user.gallery', $item->id)}}">Pogledaj moje albume</a></td>
                        <td><a href="{{route('admin.user.gallery.call', $item->id)}}">Pogledaj albume za zvanja</a></td>
                        <td>{{$item->created_at}}</td>
                        <td class="cms-column-actions">
                            <div class="btn-group btn-group-xs cms-table-actions">
                                <a href="{{ route('admin.user', $item->id) }}" type="button" class="btn btn-default"><span class="entypo entypo-pencil"></span></a>
                                {!! Form::open(['method' => 'DELETE', 'route' => ['admin.users.delete', $item->id], 'onsubmit' => "return confirm('Are you sure you want to DELETE this item?')"]) !!}
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

