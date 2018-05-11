@extends('admin/layouts/crud/index')

@section('index_header')
    <h1>Korisnici</h1>


    <div class="cms-options">
        <div class="cms-options-title-action">
            @include('admin.layouts.crud.flash_message')
            <h3 class="cms-options-title">Moja galerija {{$user->ime_prezime}}</h3>
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
                    <th>Ime albuma</th>
                    <th>Actions</th>
                </tr>
                </thead>
                <tbody>
                @foreach($items as $item)
                    <tr id="{{ $item->id }}" class="{{ $item->deleted_at ? 'danger' : ''}}">
                        <td>{{$item->galleryName}}</td>
                        <td class="cms-column-actions">
                            <div class="btn-group btn-group-xs cms-table-actions">
                                <a href="{{ route('admin.user.one-gallery', $item->id) }}" type="button" class="btn btn-default"><span class="entypo entypo-pencil"></span></a>
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

