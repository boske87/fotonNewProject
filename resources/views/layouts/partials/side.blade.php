<aside class="side-bar">
    {{--<script>--}}
        {{--$(document).ready(function(){--}}
            {{--$(".mobile-side-nav").click(function(){--}}
                {{--$(".side-bar-nav ul").slideToggle();--}}
            {{--});--}}
        {{--});--}}
    {{--</script>--}}
    <div class="border"></div>
    <div class="user-info">
        <div class="profile-img-wrap">
            @if(Auth::user()->fotografija_lica !== NULL)
                <img src="{{ Image::load('/gallery/users/'.Auth::user()->fotografija_lica, ['h' => 10]) }}">

            @endif
        </div>
        <ul class="img-info">
            <li class="color-circles">
                <ul>
                    @if(Auth::user()->status==1)
                        <li class="green"></li>
                        @else
                        <li class="yellow"></li>
                        @endif
                </ul>
            </li>
            <li>
                <ul class="course-type">
                    @if(Auth::user()->paketKategorija !== NULL)
                        <li>{{Auth::user()->category->name}}</li>
                    @endif
                </ul>
            </li>
        </ul>
        <h6 style="margin-top: 10px">{{ Auth::user()->ime_prezime }}</h6>
        <ul class="color-circles">
            @if(Auth::user()->paketKategorija !== NULL)
                <li class="{{Auth::user()->category->color}}" style="background-color: {{Auth::user()->color}};line-height: 45px; width: 45px; height: 45px !important;">{{Auth::user()->titula}}</li>
            @endif
        </ul>
        <nav class="side-bar-nav">

            <div id="profileNav" class="mobile-side-nav main-menu-button">Profile Navigation</div>
            <ul id="profileNavUl">
                <li><a href="{{route('foton-klub.my-profile')}}">Moj nalog</a></li>
                <li><a href="{{route('foton-klub.clanovi')}}">Članovi</a></li>
                <li><a href="#">Grupe</a></li>
                <li><a href="#">Sekcije</a></li>
                <li><a href="{{route('foton-klub.nove-fotografije')}}">Nove fotografije
                        @if($newImage > 0)
                            <div style=" background-image: url({{ asset('assets/img/message.png')}});background-size: contain;background-position: bottom;background-repeat: repeat-x;" class="message-img">
                                <label style=" color: white;
    text-align: -webkit-center;">{{$newImage}}</label>
                            </div>
                        @endif
                    </a></li>
                <li><a href="{{route('foton-klub.komentarisane-fotografije')}}">Komentarisane fotografije
                        @if($newImageComments > 0)
                            <div style=" background-image: url({{ asset('assets/img/message.png')}});background-size: contain;background-position: bottom;background-repeat: repeat-x;" class="message-img">
                                <label style=" color: white;
    text-align: -webkit-center;">{{$newImageComments}}</label>
                            </div>
                        @endif
                    </a></li>
                <li><a href="{{route('foton-klub.komentari-profesora')}}">Komentari profesora
                        @if($newImageCommentsProf > 0)
                            <div style=" background-image: url({{ asset('assets/img/message.png')}});background-size: contain;background-position: bottom;background-repeat: repeat-x;" class="message-img">
                                <label style=" color: white;
    text-align: -webkit-center;">{{$newImageCommentsProf}}</label>
                            </div>
                        @endif
                    </a></li>
                <li><a href="{{route('foton-klub.izlozbe-konkursi')}}">Izložbe i konkursi </a></li>
                <li><a href="#">Dokumenti</a></li>
                <li><a href="#">Forum</a></li>
                <li><a href="{{route('foton-klub.vesti')}}">Vesti</a></li>
                <li><a href="#">Linkovi</a></li>
                <li class="message-nav"><a href="#">Poruke <img src="{{ asset('assets/img/message.png')}}" class="message-img"></a></li>
            </ul>
        </nav>
    </div>
    <div id="myModalNews" class="modal hide fade" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
        {!! Form::open(['route' => 'foton-klub.vesti.add', 'files' => true]) !!}
        <div class="modal-header">
            <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
            <h3 id="myModalLabel">Dodavanje nove vesti</h3>
        </div>
        <div class="modal-body">
            <p>Naslov:</p><input type="text" name="head" class="input-block-level" placeholder="Naslov...." required>
            <p>Opis:</p><textarea name="desc" class="input-block-level"></textarea>
            @include('admin.layouts.modules.file_input', [
                 'label' => 'Slika',
                 'inputName' => 'main_image',
                 'directory' => 'img/gallery',
                 'hint'=>'Slika vesti'
               ])
        </div>
        <div class="modal-footer">
            <button class="btn" data-dismiss="modal" aria-hidden="true">Close</button>
            <button class="btn btn-primary">Submit</button>
        </div>
        {!! Form::close() !!}
    </div>
</aside>

<script>
    $('#profileNav').click(function() {
        $('#profileNavUl').addClass(function( index, currentClass ) {
        var addedClass;
        if(currentClass == ''){
            $('#profileNavUl').addClass('main-menu selected');
        } else {
            $('#profileNavUl').removeClass('main-menu selected');
        }
        console.log(currentClass);

        // return addedClass;
    });

    });
</script>
