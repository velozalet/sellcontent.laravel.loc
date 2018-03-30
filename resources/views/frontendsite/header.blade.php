@section('header')
    <nav class="navbar navbar-default menu navbar-fixed-top affix-top">
        <div class="container-fluid">
            <!-- Brand and toggle get grouped for better mobile display -->
            <div class="navbar-header">
                <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1" aria-expanded="false">
                    <span class="sr-only">Toggle navigation</span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>
                <a class="navbar-brand" href="{{ route('home') }}"> <img src="<?=asset('img/box1_logo.png');?>"> </a>
            </div>

            <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
                <ul class="nav navbar-nav">
                    <li> <a href="{{ route('home') }}"> Home </a> </li>
                    <li> <a href="{{ route('articles') }}"> Articles </a> </li>
                </ul>

                <!-- LOGIN / LOGOUT PANEL -->
                <ul class="nav navbar-nav navbar-right">
                    <!-- Authentication Links -->
                    @guest
                        <li><a href="{{ route('login') }}">Login</a></li>
                        <li><a href="{{ route('register') }}">Register</a></li>
                    @else
                        <li class="dropdown">
                            <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false" aria-haspopup="true">
                                {{ Auth::user()->name }} <span class="caret"></span>
                            </a>

                            <ul class="dropdown-menu">
                                <li>
                                    <a href="{{ route('logout') }}"
                                       onclick="event.preventDefault();
                                                 document.getElementById('logout-form').submit();">
                                        Logout
                                    </a>

                                    <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                        {{ csrf_field() }}
                                    </form>
                                </li>
                            </ul>
                        </li>
                    @endguest
                </ul>
                <!-- LOGIN / LOGOUT PANEL -->

                <ul class="nav navbar-nav navbar-right icons">
                    <li><a href="#"> <img src="http://placehold.it/26x27/FF0000/FFFFFF?text= 1"> </a></li>
                    <li><a href="#"> <img src="http://placehold.it/26x27/33cc33/FFFFFF?text= 2"> </a></li>
                    <li><a href="#"> <img src="http://placehold.it/26x27/0000ff/FFFFFF?text= 3"> </a></li>
                    <li><a href="#"> <img src="http://placehold.it/26x27/663300/FFFFFF?text= 4"> </a></li>
                </ul>
            </div><!-- /.navbar-collapse -->
            <i class="glyphicon glyphicon-globe globe"></i>
        </div><!-- /.container -->
    </nav>
@endsection