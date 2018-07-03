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
                <div class="span2 inline-block">
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
                                    <a href="/pocetni-nivo" class="">Početni nivo</a>
                                </li>
                                <li>
                                    <a href="/napredni-nivo"  class="">Napredni nivo</a>
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
								<li >
                                    <a href="" class="">Izloguj se</a>
                                </li>

                            </ul>
                        </div>
                    </div>


                </div>

                <div class="span2 " >
                    <ul class="nav navbar-nav">
                        <li>
                            <a class="open-menu-js" href="#"><img src="{{ asset('assets/img/fig.png')}}" alt="fig" class="fig"></a>
                        </li>
                        <a href="{{route('foton-klub')}}">
                            <span class="klub-foton">FOTON KLUB</span>
                        </a>

                    </ul>


                </div>
            </div>

        </div>

    </nav>
</div>