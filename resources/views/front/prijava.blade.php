@extends('layouts.main')

@section('content')
<!-- Content section -->
<section class="main green-bg">

    <!-- Home content -->
    <section class="home">

        <section>
            <div class="container">
                <div class="row">
                    <div class="span12">
                        <img src="{{asset('assets/img/prijava-big.png')}}" alt="Prijava"/>

                    </div>
                </div>
            </div>
        </section>
        <section class="featured prijava">
            <div class="container">
                <div class="row">
                    <div class="span5">
                        <br/><br/><br/>
                        @include('admin.layouts.crud.flash_message')
                        {!! Form::open(['route' => 'sendMailPrijava']) !!}
                            <div class="form-group">
                                <label for="exampleInputIme1">Unesite svoje ime</label>
                                <input type="text" class="form-control" name="ime" id="exampleInputIme1" required>
                            </div>
                            <div class="form-group">
                                <label for="exampleInputGrad1">Grad</label>
                                <input type="text" class="form-control" name="grad" id="exampleInputGrad1" required>
                            </div>
                            <div class="form-group">
                                <label for="exampleInputEmail1">E-mail</label>
                                <input type="email" class="form-control" name="email" id="exampleInputEmail1" required>
                            </div>
                            <div class="form-group">
                                <label for="exampleInputTelefon1">Telefon</label>
                                <input type="text" class="form-control" name="tel" id="exampleInputTelefon1" required>
                            </div>
                            <div class="form-group">
                                <label for="exampleInputPoruka1">Molimo Vas upišite za koji se kurs prijavljujete</label>
                                <textarea class="form-control" name="kurs" id="exampleInputPoruka1" required></textarea>
                            </div>
                            <button type="submit" class="prijavai-se-btn">PRIJAVI SE</button>
                        </form>
                    </div>
                    <div class="span7">
                        <img src="{{asset('assets/img/prijava-people.png')}}" alt="Kontakt People"/>
                        <p style="color: white">Pošto svaka elektronska forma prijave može da spamuje, u slučaju <br> da ne dobijete   odmah naš odgovor,  slobodno nas pozovite ili nam <br> pošaljite vašu   e-mail adresu običnom sms-porukom na 064 11 598 00.</p>

                    </div>
                </div>
            </div>
        </section>

    </section>
    <!-- End class="home" -->

</section>
<!-- End class="main" -->

@stop