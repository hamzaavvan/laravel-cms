<nav class="navbar navbar-default">
    <div class="container-fluid">
        <!-- Brand and toggle get grouped for better mobile display -->
        <div class="navbar-header">
            <button type="button" class="navbar-toggle collapsed" data-toggle="collaps\
            e" data-target="#bs-example-navbar-collapse-1">
                <span class="sr-only">Toggle navigation</span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
            </button>
            <a class="navbar-brand" href="#">Learning Laravel</a>
        </div>
        <!-- Collect the nav links, forms, and other content for toggling -->
        <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
            <ul class="nav navbar-nav navbar-right">
                <li class="active"><a href="{!! url("/") !!}">Home</a></li>
                <li class=""><a href="{!! url("/tickets") !!}">Tickets</a></li>
                {{-- <li><a href="{!! url("contact") !!}">Contact</a></li> --}}

                @role("manager")
                    <li><a href="{!! url("admin") !!}">Admin</a></li>
                @endrole

                <li><a href="{!! url("about") !!}">About</a></li>
                @if (Auth::guest())
                    <li class="dropdown">
                        <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="butto\
                        n" aria-expanded="false">Members <span class="caret"></span></a>
                            <ul class="dropdown-menu" role="menu">
                                <li><a href="{!! url("users/register") !!}">Register</a></li>
                                <li><a href="/users/login">Login</a></li>
                            </ul>
                    </li>
                @else
                    <li class=""><a href="{!! url("users/logout") !!}">Logout</a></li>
                @endif
            </ul>
        </div><!-- /.navbar-collapse -->
    </div><!-- /.container-fluid -->
</nav>