@extends('admin/layouts/crud/index')

@section('index_header')
    <h1>Gallery</h1>


    <div class="cms-options">
        <div class="cms-options-title-action">
            @include('admin.layouts.crud.flash_message')
            <h3 class="cms-options-title">Gallery</h3>
        </div>
    </div> <!-- =cms-options -->
@stop

@section('index_content')
    <span id="tableName" style="display: none; visibility: hidden;">User gallery</span>
    <div class="table-responsive">
        @if($items->count()>0)
            {!! Form::open(['route' => ['admin.user.gallery.call.add.image.my-gallery',$callGalId,'userId='.$id], 'files' => true, 'class' => 'form-horizontal']) !!}
            <table id="sortable-table" class="table">
                <thead>
                <tr>
                    <th></th>
                    <th>Dodaj u galeriju zvanja</th>
                </tr>
                </thead>
                <tbody>

                @foreach($items as $item_array)

                    @foreach($item_array->userGalleryImage as $item)
                        @if(!isset($allImage[$item->main_image]))
                        <tr id="{{ $item->id }}" class="{{ $item->deleted_at ? 'danger' : ''}}">
                            <td>
                                <a class="fancybox" rel="group" href="{{ Image::load('gallery/mygallery'.$item_array->userId.'/' . $item->main_image, ['h' => 10]) }}"><img src="{{ Image::load('gallery/mygallery'.$item_array->userId.'/' . $item->main_image, ['h' => 10]) }}" width="150px" alt=""></a>
                            </td>
                            <td class="cms-column-actions">
                                <div class="btn-group btn-group-xs cms-table-actions">
                                    <input type="checkbox" name="image[]" value="{{$item->id}}">
                                </div>
                            </td>
                        </tr>
                        @endif
                    @endforeach
                @endforeach
                </tbody>
            </table>
            <div class="row">
                <div class="col-sm-offset-2 col-sm-6">
                    {!! Form::hidden('_token',csrf_token()) !!}
                    {!! Form::submit('Save', ['class' => 'btn btn-primary']) !!}
                    <a href="{{url()->previous()}}" class="btn btn-link pull-right">Cancel</a>
                </div>
            </div>
            {!! Form::close() !!}
        @else
            <p class="alert alert-warning">There are no items.</p>
        @endif

    </div>
@endsection

