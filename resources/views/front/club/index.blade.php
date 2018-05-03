@extends('layouts.main')

@section('content')
    <meta name="csrf-token" content="{!! csrf_token() !!}" />
    <!-- Content section -->
    <section class="main silver-bg" style="background-color: white !important;">

        <!-- Home content -->
        <section class="home">

            <!-- Promos -->
            <section class="promos galerija-top">
                <img src="{{URL::asset('assets/img/klub_foton.jpg')}}" alt="Profesori">
            </section>
            <!-- End class="promos" -->

            <section class="featured profesori">
                <div class="container">
                    <div class="row">
                        <div class="span12">
                            <div class="prof-title" style="color: white" >
                                <h3>{{strip_tags($text->Text1)}}</h3>
                                <p class="white-text" style="color: white" >
                                    {{strip_tags($text->Text2)}}
                                </p>
                            </div>
                        </div>
                    </div>
                </div>
            </section>

            <!-- Promos -->
            <section class="gallery">
                <div class="container">
                    <div class="row">
                        <div class="span12">
                            <div id="galleria">
                                @foreach($items as $one)
                                    <img src="{{ Image::load('galleryClub/' . $one->main_image, ['h' => 10]) }}" alt="" />
                                @endforeach
                            </div>
                        </div>
                    </div>
                </div>
            </section>
            <!-- End class="promos" -->
            <section class="featured ">
                <div class="container">
                    <div class="row-fluid">
                        <div class="span4" style="margin-top: 80px">
                            <div class="nivo-img">
                                <img src="{{asset('assets/img/niste_clan.png')}}" alt="Niste clan">
                            </div>
                            <div class="nivo-title">
                                <h2>NISTE ČLAN?</h2>
                            </div>
                            <div class="nivo-opis">
                                <p>
                                    Pravo je vreme da to postanete.
                                </p>
                                <br>
                            </div>
                            <div class="nivo-info">
                                <a href="">
                                    <span data-toggle="modal" data-target="#myModal">REGISTRUJ SE</span>
                                </a>
                            </div>

                        </div>
                        <div class="span4" style="margin-top: 30px">
                            <img src="{{asset('assets/img/klub-yt.jpg')}}" alt="Niste clan">
                        </div>
                        <div class="span4" style="margin-top: 80px">
                            <div class="nivo-img">
                                <img src="{{asset('assets/img/vec-ste-clan.png')}}" alt="Niste clan">
                            </div>
                            <div class="nivo-title">
                                <h2>VEĆ STE ČLAN?</h2>
                            </div>
                            <div class="nivo-opis">
                                <p>
                                    Onda znate šta sledeće da uradite.
                                </p>
                                <br>
                            </div>
                            <div class="nivo-info">
                                <a href="">
                                    <span data-toggle="modal" data-target="#myModalLogin">ULOGUJTE SE</span>
                                </a>
                            </div>

                        </div>
                    </div>
                </div>
            </section>
            <section class="featured" style="background-color: #E4E4E4; ">
                <div class="container" >
                    <div class="row" style="margin-bottom: 50px">
                        <div class="row" style="margin-top: 70px;margin-bottom: 40px">
                            <div class="span3 offset2">
                                <img src="{{asset('assets/img/pdf2.png')}}" width="50px">

                                <a>Pravilnik kluba foton</a>
                            </div>
                            <div class="span2">
                                <img src="{{asset('assets/img/pdf2.png')}}" width="50px">
                                <a>Pristupnica</a>
                            </div>
                            <div class="span2">
                                <img src="{{asset('assets/img/pdf2.png')}}" width="50px">
                                <a>Lorem ipsum</a>
                            </div>
                            <div class="span2">
                                <img src="{{asset('assets/img/pdf2.png')}}" width="50px">
                                <a>Lorem ipsum</a>
                            </div>
                        </div>
                        <div class="span12 text-center">
                            <div class="nivo-img">
                                <img src="{{asset('assets/img/line-klub.jpg')}}" alt="Niste clan">
                            </div>
                        </div>
                        <div class="row" style="margin-top: 10%">
                            <div class="span2 offset2">
                                <img src="">
                            </div>
                            <div class="span2">
                                <img src="">
                            </div>
                            <div class="span2">
                                <img src="">
                            </div>
                            <div class="span2">
                                <img src="">
                            </div>
                        </div>
                    </div>
                </div>
            </section>

        </section>
        <!-- End class="home" -->

    </section>
    <!-- End class="main" -->
    <div id="myModal2" class="modal hide fade" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
        <div class="modal-header">
            <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
            <h3 id="myModalLabel">Registruj se</h3>
            <div class="modal-body">
                <h5>Uspesno ste se registrovali.</h5>
            </div>
        </div>

    </div>
    <div id="myModal" class="modal hide fade" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
        {!! Form::open(['route' => 'register', 'files' => true, 'id'=>'refForm']) !!}
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
                <h3 id="myModalLabel">Registruj se</h3>
            </div>
            <div class="modal-body">

                <p>Email adresa:</p><input type="text" name="email" id="emailNameReg" class="input-block-level" placeholder="Email address" required>
                <p>Password:</p><input type="password" name="password" class="input-block-level" placeholder="Password" required>
                <p>Ime i prezime:</p><input type="text" name="ime_prezime" class="input-block-level" placeholder="Ime i prezime">
                <p>
                @include('admin.layouts.modules.file_input', [
                 'label' => 'Slika',
                 'inputName' => 'main_image',
                 'directory' => 'img/gallery',
                 'hint'=>'Fotografija lica'
               ])
                </p>
                <p>Mesto rodjenja:</p><input type="text" name="mesto_rodjenja" class="input-block-level" placeholder="Mesto rodjenja">
                <p>Datum rodjenja:</p><input type="date" name="datum_rodjenja" class="input-block-level" placeholder="datum-rodjenja" >
                <p>Kontakt telefon:</p><input type="text" name="tel" class="input-block-level" placeholder="Kontakt telefon">
                <p>Završeno obrazovanje:</p><input type="text" name="zavrseno_obrazovanje" class="input-block-level" placeholder="Završeno obrazovanje">
                <p>Trenutno zaposlenje:</p><input type="text" name="trenutno_zaposlenje" class="input-block-level" placeholder="Trenutno zaposlenje">
                <p>Završena škola fotografije i koji nivo:</p><textarea name="zavrsena_skola_fotografije" class="input-block-level"></textarea>
                <p>Fotografske titule, zvanja i diplome:</p><textarea name="fotografske_titule_zvanja_diplome" class="input-block-level"></textarea>
                <p>Ostale umetničke aktivnosti:</p><textarea name="umetnicke_aktivnosti" class="input-block-level"></textarea>
                <p>Kraći tekst o sebi:</p><textarea name="desc" class="input-block-level"></textarea>

            </div>
            <div class="modal-footer">
                <button class="btn" data-dismiss="modal" aria-hidden="true">Close</button>
                <button class="btn btn-primary" id="register">Submit</button>
            </div>

        {!! Form::close() !!}
    </div>

    <div id="myModalLogin" class="modal hide fade" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
        {{--{!! Form::open(['route' => '/main-login']) !!}--}}
        <div class="modal-header">
            <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
            <h3 id="myModalLabel">Uloguj se</h3>
        </div>
        <div class="modal-body">
            <p>Email adresa:</p><input type="text" name="email" id="userEmail" class="input-block-level" placeholder="Email adresa" required>
            <p>Password:</p><input type="password" name="password" id="userPass" class="input-block-level" placeholder="Password" required>
        </div>
        <div class="modal-footer">
            <button class="btn" data-dismiss="modal" aria-hidden="true">Close</button>
            <button id="loginBtn" class="btn btn-primary">Submit</button>
        </div>

        {{--{!! Form::close() !!}--}}
    </div>

    <script>
        Galleria.loadTheme("{{ asset('assets/js/galleria.classic.min.js')}}");
        Galleria.run("#galleria");
        $(document).ready(function() {
            $(function(){
                if(window.location.hash) {
                    var hash = window.location.hash;
                    $(hash).modal('toggle');
                }
            });


            $('#loginBtn').click(function() {
                var username = $('#userEmail').val();
                var pass = $('#userPass').val();
                $.ajax({
                    type: 'POST',
                    url: '/main-login',
                    data:{
                        '_token': $('meta[name="csrf-token"]').attr('content'),
                        'email': username,
                        'password': pass
                    },
                    success: function(data) {
                        if(data.result === true){
                            window.location.href = "foton-klub/galerije";
                            console.log(data);
                        } else{
                            alert('Pogresni login parametri, pokusajte opet')
                        }

                    }
                });
            });


            $('#refForm').submit(function() {
                alert('asdasdasd');
                event.preventDefault();
                var form = this;
                var username = $('#userNameReg').val();
                var email = $('#emailNameReg').val();
//                $("#refForm").submit(function(e){
//                    e.preventDefault();
//                });
                $.ajax({
                    type: 'POST',
                    url: '/checkEmail',
                    data:{
                        '_token': $('meta[name="csrf-token"]').attr('content'),
                        'username': username,
                        'email': email
                    },
                    success: function(data) {
                        if(data.result === true){
                            form.submit();
                            console.log(data);
                        } else{
                            alert('Korisnicko ime ili email je vec koriscen')
                        }

                    }
                });
            })
        });

    </script>

@stop
