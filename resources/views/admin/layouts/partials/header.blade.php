<div class="container container-header">

    <nav class="navbar navbar-inverse" role="navigation">

        <!-- Brand and toggle get grouped for better mobile display -->
        <div class="navbar-header">
            <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-ex1-collapse">
                <span class="sr-only">Toggle navigation</span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
            </button>
            <a class="navbar-brand" href="">
                <img src="{{ asset('assets/img/logo-foton.png') }}" xwidth="158" height="38" alt="logo">
            </a>
        </div>

        <!-- Collect the nav links, forms, and other content for toggling -->
        <div class="collapse navbar-collapse navbar-ex1-collapse">

           @include('admin.layouts.navigation.main_nav')

            <div class="btn-group-acc pull-right">
                <div class="btn-group">
                    <button type="button" class="btn btn-acc btn-acc-title dropdown-toggle" data-toggle="dropdown">
                        Goran<span class="caret"></span>
                    </button>
                    <ul class="dropdown-menu">
{{--                        <li><a href="{{ route('admin.my_account', Crypt::encrypt(Request::fullUrl()) ) }}">My Account</a></li>--}}
                        <li><a href="">Log out</a></li>
                    </ul>
                </div>
            </div>

        </div> <!-- =navbar-collapse -->

    </nav>

</div> <!-- =container -->