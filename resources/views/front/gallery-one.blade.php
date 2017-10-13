@extends('layouts.main')

@section('content')
<!-- Content section -->
<section class="main silver-bg">

    <!-- Home content -->
    <section class="home">

        <div class="container">
            <div class="row">
                <div class="span12">
                    <div class="slika-galerije">
                        <div class="row">
                            <div class="span12">
                                <img src="{{ asset('assets/img/gallery/slika2.png')}}" alt="Slika"/>
                            </div>
                            <div class="span5">
						<span class="oblacic">
							<img src="{{ asset('assets/img/oblacic.png')}}" alt="oblacic"/>
						</span>
                                <spn class="broj-komentara">
                                    7 komentara
                                </spn>
                            </div>
                            <div class="span7">
						<span class="user-comment-img">
							<img src="{{ asset('assets/img/korisnici/prof1.png')}}" alt="User"/>
						</span>
                                <span class="comment-input">
							<input type="text" placeholder="Napišite komentar...">
						</span>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="span12">
                    <div class="slika-galerije">
                        <div class="row">
                            <div class="span12">
                                <img src="{{ asset('assets/img/gallery/slika2.png')}}" alt="Slika"/>
                            </div>
                            <div class="span5">
						<span class="oblacic">
							<img src="{{ asset('assets/img/oblacic.png" alt="oblacic')}}"/>
						</span>
                                <spn class="broj-komentara">
                                    7 komentara
                                </spn>
                            </div>
                            <div class="span7">
						<span class="user-comment-img">
							<img src="{{ asset('assets/img/korisnici/prof1.png')}}" alt="User"/>
						</span>
                                <span class="comment-input">
							<input type="text" placeholder="Napišite komentar...">
						</span>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

    </section>
    <!-- End class="home" -->

</section>
<!-- End class="main" -->

@stop