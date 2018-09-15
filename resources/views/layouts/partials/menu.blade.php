<body>
<a class="slide_arr_left slide_arr" href="javascript:void(0)">
    {{--<img src="{{ asset('assets/img/arrow-down-gray-md.png')}}" alt="" style="width:130px;margin-left: 10px;" />--}}
</a>
<a class="slide_arr_right slide_arr" href="javascript:void(0)">
    {{--<img src="{{ asset('assets/img/arr_down.png')}}" alt="" />--}}
</a>

<div class="wrapper">
    <!-- Navigation -->
    <nav class="navigation">
        <div class="container">

            <div class="row">
                <div class="span2 inline-block logo-image">
                    <a href="/" class="logo-img">
                        <img src="{{ asset('assets/img/logo-foton.png')}}" class="foton-logo" alt="foton logo">
                    </a>

                        <span class="logo-text">

                                <h1><a style="color: black" href="/">ŠKOLA<br/>FOTOGRAFIJE</a></h1>

                       </span>

                </div>
                <div class="span8" >

                    <a href="#" class="main-menu-button">Navigation</a>
                    <!-- Begin Menu Container -->
                    <div class="megamenu_container">
                        <div class="menu-main-navigation-container">
                            <ul id="menu-main-navigation" class="main-menu">
                                <li data-width="">
                                    <a href="/pocetni-nivo" class="">Početni modul</a>
                                </li>
                                <li>
                                    <a href="/napredni-nivo"  class="">Napredni modul</a>
                                </li>
                                <li>
                                    <a href="/prijava"  class="">Prijava</a>
                                </li>
                                <li class="menu-item-has-children">
                                    <a href="/profesori"  class="">Profesori</a>

                                    <ul class="sub-menu">

                                        <li class="hidden-prof">
                                            <a href="/profesori">Svi profesori</a>
                                        </li>
                                        @foreach($prof as $one)
                                            <li>
                                                <a href="{{route('profesor',$one->slug)}}">{{$one->name}}</a>
                                            </li>
                                        @endforeach

                                    </ul>
                                </li>
                                <li>
                                    <a href="/galerija-fotografija"  class="">Galerija</a>
                                </li>
                                <li>
                                    <a href="/vesti"  class="">Vesti</a>
                                </li>
                                <li>
                                    <a href="/kontakt"  class="">Kontakt</a>
                                </li>
                                <li data-width="300">
                                    <a href="/linkovi" class="">Linkovi</a>
                                </li>
                                @if(Auth::user())
								<li >
                                    <a id="logOffCoo" href="{{route('logout-club')}}" class="">Log off</a>
                                </li>
                                    @endif
                            </ul>
                        </div>
                    </div>


                </div>

                <div class="span2 user-menu " >
                    <ul class="nav navbar-nav">
                        @if(Auth::user())
                        <li>
                            <a class="toggle-menu-js" href="#"><img src="{{ asset('assets/img/fig.png')}}" alt="fig" class="fig"></a>
							<ul class="toggle-menu">
							<li><a href="{{route('foton-klub.my-profile')}}">MOJ NALOG</a></li>
							<li><a href="{{route('foton-klub.clanovi')}}">Članovi</a></li>
							<li><a href="#">Grupe</a></li>
							<li><a href="{{route('foton-klub.nove-fotografije')}}">Nove fotogarfije</a></li>
							<li><a href="{{route('foton-klub.komentarisane-fotografije')}}">Komentarisane fotogarfije</a></li>
							<li><a href="{{route('foton-klub.komentari-profesora')}}">Komentari profesora</a></li>
							<li><a href="{{route('foton-klub.dokumenta')}}">Dokumenti</a></li>
							<li><a href="{{route('foton-klub.izlozbe-konkursi')}}">Konkursi i izložbe</a></li>
							<li><a href="{{route('foton-klub.vesti')}}">Vesti</a></li>
							</ul>
                        </li>
                        @endif
                        <a href="{{route('foton-klub')}}">
                            <span style="font-family: RobotoRegular" class="klub-foton">FOTON KLUB</span>
                        </a>

                    </ul>
			

                </div>
            </div>

        </div>

    </nav>
</div>
<script>
$( document ).ready(function() {
    $('#logOffCoo').click(function () {
        $.cookie("popup_1_2", null);
    })
   $('.toggle-menu-js').click(function(){
	   $(this).siblings('.toggle-menu').toggle();
	   
   });
});
</script>