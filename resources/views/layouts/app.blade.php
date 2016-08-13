<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>ServiceForce</title>

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.5.0/css/font-awesome.min.css" integrity="sha384-XdYbMnZ/QjLh6iI4ogqCTaIjrFk87ip+ekIjefZch0Y+PvJ8CDYtEs1ipDmPorQ+" crossorigin="anonymous">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Lato:100,300,400,700">

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/3.3.6/css/bootstrap.min.css" integrity="sha384-1q8mTJOASx8j1Au+a5WDVnPi2lkFfwwEAa8hDDdjZlpLegxhjVME1fgjWPGmkzs7" crossorigin="anonymous">
    <link rel="stylesheet" href="{{asset('css/dataTables.bootstrap.css')}}">
    <link rel="stylesheet" href="{{ asset('css/bootstrap-datetimepicker.css') }}">

    <link rel="stylesheet" href="{{ asset('css/app.css') }}">

    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/2.2.3/jquery.min.js" integrity="sha384-I6F5OKECLVtK/BL+8iSLDEHowSAfUo76ZL9+kGAgTRdiByINKJaqTPH/QVNS1VDb" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/3.3.6/js/bootstrap.min.js" integrity="sha384-0mSbJDEHialfmuBBQP6A4Qrprq5OVfW37PRR3j5ELqxss1yVqOtnepnHVP9aJ7xS" crossorigin="anonymous"></script>
    <script src="{{asset('js/datatables/jquery.dataTables.js')}}"></script>
    <script src="https://cdn.datatables.net/1.10.12/js/dataTables.bootstrap.min.js"></script>

    <script src="{{asset('js/moment.js')}}"></script>
    <script src="{{asset('js/datetimepicker/bootstrap-datetimepicker.min.js')}}"></script>

    <script src="{{asset('js/jquery.formtowizard.js')}}"></script>

    <script src="{{asset('js/highcharts/highcharts.js')}}"></script>
    <script src="{{asset('js/highcharts/modules/data.js')}}"></script>
    <script src="{{asset('js/highcharts/modules/exporting.js')}}"></script>
</head>
 <body>
    <nav class="navbar navbar-default navbar-fixed-top">
      <div class="container-fluid">
        <div class="navbar-header">
          <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar" aria-expanded="false" aria-controls="navbar">
            <span class="sr-only">Toggle navigation</span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
          </button>
          <a class="navbar-brand" href="{{ url('/') }}"><i class="fa fa-server fa-lg"></i> ServiceForce</a>
        </div>
        <div id="navbar" class="navbar-collapse collapse">
          <ul class="nav navbar-nav navbar-right">
             @if (Auth::guest())
                <li><a href="{{ url('/login') }}">Login</a></li>
                <li><a href="{{ url('/register') }}">Register</a></li>
             @else
                <li class="dropdown">
                 <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false">
                  <i class="fa fa-plus"></i></a>
                <ul class="dropdown-menu" role="menu">
                  <li><a href="/servers/create">Server</a></li>
                  <li><a href="/rack/create">Rack</a></li>
                  <li><a href="/datacenters/create">Data Center</a></li>
                  </ul>
                </li>

                        <li class="dropdown">
                            <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false">
                                <i class="fa fa-language"></i>
                            </a>

                            <ul class="dropdown-menu">
                                <li><a href="?lang=nl">Dutch</a></li>
                                <li><a href="?lang=en">English</a></li>
                            </ul>
                        </li>

                        <li class="dropdown">
                         <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false">
                                {{ Auth::user()->name }} <span class="caret"></span>
                            </a>
                            <ul class="dropdown-menu" role="menu">
                                <li><a href="{{ url('/profile') }}">Profile management</a></li>
                                <li class="divider"></li>
                                <li><a href="{{ url('/logout') }}"><i class="fa fa-btn fa-sign-out"></i>Logout</a></li>
                            </ul>
                        </li>
                    @endif
          </ul>
          <form class="navbar-form navbar-right">
            <input type="text" class="form-control" placeholder="Search...">
          </form>
        </div>
      </div>
    </nav>

    <div class="container-fluid">
      <div class="row">
        <div class="col-sm-3 col-md-2 sidebar">
          <ul class="nav nav-sidebar">
                 @if (Auth::guest())
                    <li><a href="{{ url('/home') }}">Home</a></li>
                 @else
                    <li><a href="{{ url('/home') }}">Home</a></li>
                    <li><a href="{{ url('/customers') }}">Customers</a></li>
                    <li><a href="{{ url('/domains') }}">Domainname assets</a></li>
                    <li><a href="{{ url('/ips') }}">IP assets</a></li>
                    <li><a href="{{ url('/servers') }}">Server assets</a></li>
                    <li><a href="{{ url('/webhosting') }}">Webhosting assets</a></li>
                @endif
          </ul>
        </div>
        <div class="col-sm-9 col-sm-offset-3 col-md-10 col-md-offset-2 main">
         @yield('content')
        </div>
      </div>
    </div>

    {{-- <script src="{{ elixir('js/app.js') }}"></script> --}}

    <script type="text/javascript">
        $( document ).ready(function() {
         $('[data-toggle="tooltip"]').tooltip()
        });
    </script>
</body>
</html>
