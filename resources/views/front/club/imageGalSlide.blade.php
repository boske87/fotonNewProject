@extends('layouts.main')
<style>
    .loader {
        border: 16px solid #f3f3f3;
        border-radius: 50%;
        border-top: 16px solid #3498db;
        width: 120px;
        height: 120px;
        -webkit-animation: spin 2s linear infinite;
        animation: spin 2s linear infinite;
    }

    @-webkit-keyframes spin {
        0% { -webkit-transform: rotate(0deg); }
        100% { -webkit-transform: rotate(360deg); }
    }

    @keyframes spin {
        0% { transform: rotate(0deg); }
        100% { transform: rotate(360deg); }
    }
</style>
@section('content')
    <meta name="csrf-token" content="{!! csrf_token() !!}" />
    <section class="gallery">
        <div class="container">
            <div class="row">
                <div class="span12">
                    <div id="galleria">
                        <img id="{{$item->id}}" src="{{ Image::load('gallery/mygallery'.$gallery->userId.'/' . $item->main_image, ['h' => 10]) }}" alt="" />
                        @foreach($excludeImage as $one)
                            <img id="{{$one->id}}" src="{{ Image::load('gallery/mygallery'.$gallery->userId.'/' . $one->main_image, ['h' => 10]) }}" alt="" />
                        @endforeach
                    </div>
                </div>
            </div>
        </div>
    </section>
    <section class="background-new">
        <div class="comment-container container">
            <div class="comments-top">
                <div class="profile-img-wrap">
                    @if($user->fotografija_lica !== NULL)
                        <img src="{{ Image::load('/gallery/users/'.$user->fotografija_lica, ['h' => 10]) }}">

                    @endif
                </div>
                <ul class="img-info">
                    <li>
                        <input type="hidden" id="galleryId" value="{{$item->galleryId}}">
                        <input type="hidden" id="imageId" value="{{$item->id}}">
                        <h4>{{$gallery->ime_prezime}}</h4>
                    </li>

                    <li class="color-circles">
                        <ul>
                            <li style="background-color:{{$gallery->color}}"></li>
                            <li class="txt"><span>{{$gallery->titula}}</span></li>
                        </ul>
                    </li>
                </ul>
                <div class="profile-comment-info">
                    <ul>
                        <li><span id="pregledi">{{$item->view}}</span><span>pregleda</span></li>
                        <li><span id="komentara">{{isset ($new_com[$item->id]) ? $new_com[$item->id] : 0}}</span><span>komentara</span></li>
                    </ul>
                </div>
            </div>
            <div class="comments-bottom">
                <ul id="ul_comments">
                    <li style="text-align: -webkit-center;"><div class="loader"></div></li>

                </ul>
            </div>
            <div class="comments-bottom">
                <ul id="ul_comments2">

                    <li>
                        <div class="comments-bottom-info">
                            <div class="profile-img-wrap">
                                <img src="{{ Image::load('/gallery/users/'.Auth::user()->fotografija_lica, ['h' => 10]) }}">
                            </div>
                            <ul class="img-info">
                                <li>
                                    <h4>{{Auth::user()->ime_prezime}}</h4>
                                </li>
                                <li class="color-circles">
                                    <ul>
                                        <li style="background-color:{{Auth::user()->color}}"></li>
                                        <li class="txt" style="width: 50%; text-align: left"><span>{{Auth::user()->titula}}</span></li>
                                    </ul>
                                </li>
                            </ul>
                        </div>
                        <div class="comments-bottom-comment">
                            <textarea id="unos_komentara" name="komentar" placeholder="Napišite komentar..."></textarea>
                            {{--<input type="text" placeholder="Napišite komentar..." onfocus="this.placeholder = ''" onblur="this.placeholder = 'Napišite komentar...'">--}}
                        </div>
                    </li>
                </ul>
            </div>
        </div>
    </section>
    <script>Galleria.loadTheme("{{ asset('assets/js/galleria.classic.min.js')}}");
        Galleria.ready(function(options) {
            // this = the gallery instance
            // options = the gallery options

            this.bind('image', function(e) {
                $('#ul_comments').html('<li style="text-align: -webkit-center;"><div class="loader"></div></li>');
                $('#imageId').val(e.galleriaData.original.id);
                Galleria.log(e.galleriaData.original.id) // the image index
                $.getJSON('/foton-klub/getComents/'+e.galleriaData.original.id+'/'+$('#galleryId').val(), function(data) {
                    $('#ul_comments').html('');

                    $('#komentara').html(0);
                    $('#pregledi').html(0);
                    $('#komentara').html(data.result.length);
                    $('#pregledi').html(data.image.view);
                    if(jQuery.isEmptyObject(data.result)) {
                        $('#ul_comments').html('');
                    } else {
                        var x;
                        for (x in data.result) {
                            $('#ul_comments').append('<li>\n' +
                                '<div class="comments-bottom-info">\n' +
                                '<div class="profile-img-wrap">\n' +
                                '<img src="/img/gallery/users/'+data.result[x].fotografija_lica+'">\n' +
                                '</div>\n' +
                                '<ul class="img-info">\n' +
                                '<li>\n' +
                                '<h4>'+data.result[x].ime_prezime+'</h4>\n' +
                                '</li>\n' +
                                '<li class="color-circles">\n' +
                                '<ul>\n' +
                                '<li style="background-color:'+data.result[x].color+';"></li>\n' +
                                ' <li class="txt" style="width: 50%; text-align: left"><span>'+data.result[x].titula+'</span></li>\n' +
                                '</ul>\n' +
                                '</li>\n' +
                                '</ul>\n' +
                                '</div>\n' +
                                '<div class="comments-bottom-comment">\n' +
                                '<p>'+data.result[x].comment+'</p>\n' +
                                '</div>\n' +
                                '</li>')
                        }

                    }
                });
                $.ajax({
                    type: 'POST',
                    url: '/foton-klub/updateImageAjax/view/'+e.galleriaData.original.id,
                    data:{
                    '_token': $('meta[name="csrf-token"]').attr('content')
                }
                });
            });
        });
        Galleria.run("#galleria");

    </script>

    <script>
        $(document).on("keypress", "#unos_komentara", function (e) {
            if (e.keyCode == 13) {
                if ($("textarea[name='komentar']").val() != '') {
                    var comm = $("textarea[name='komentar']").val();
                    $("textarea[name='komentar']").val('');

                    console.log(comm);
                    e.preventDefault();
                    $('#ul_comments').append('<li>\n' +
                        '<div class="comments-bottom-info">\n' +
                        '<div class="profile-img-wrap">\n' +
                        '<img src="{{ Image::load('/gallery/users/'.Auth::user()->fotografija_lica, ['h' => 10]) }}">\n' +
                        '</div>\n' +
                        '<ul class="img-info">\n' +
                        '<li>\n' +
                        '<h4>{{Auth::user()->ime_prezime}}</h4>\n' +
                        '</li>\n' +
                        '<li class="color-circles">\n' +
                        '<ul>\n' +
                        '<li style="background-color:{{Auth::user()->color}};"></li>\n' +
                        ' <li class="txt" style="width: 50%; text-align: left"><span>{{Auth::user()->titula}}</span></li>\n' +
                        '</ul>\n' +
                        '</li>\n' +
                        '</ul>\n' +
                        '</div>\n' +
                        '<div class="comments-bottom-comment">\n' +
                        '<p>'+comm+'</p>\n' +
                        '</div>\n' +
                        '</li>')
                    $.ajax({
                        type: 'POST',
                        url: '/foton-klub/updateImageAjax/com/' + $('#imageId').val(),
                        data: {
                            '_token': $('meta[name="csrf-token"]').attr('content'),
                            'comment': comm,
                            'galleryId': $('#galleryId').val()
                        }

                    });
                }
            }
        });
    </script>
@stop
