<!DOCTYPE html>
<html>
    <head>
        <title>
            @section('title')
            Smernice
            @show
        </title>
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">

        <!-- CSS are placed here -->
        {{ HTML::style('css/bootstrap.css') }}
        {{ HTML::style('css/bootstrap-theme.css') }}
        {{ HTML::style('css/style.css'); }}
        {{ HTML::style('css/custom.css') }}
        @yield('custom_styles')

        <style>
        @section('styles')
            body {
              padding-top: 20px;
              padding-bottom: 20px;
            }

            .navbar {
              margin-bottom: 50px;
              /*width:1000px;*/
              /*margin-left: 500px;*/
            }

        @show

        </style>
    </head>

    <body>

        <div id="fb-root"></div>
        <script>(function(d, s, id) {
          var js, fjs = d.getElementsByTagName(s)[0];
          if (d.getElementById(id)) return;
          js = d.createElement(s); js.id = id;
          js.src = "//connect.facebook.net/en_US/sdk.js#xfbml=1&version=v2.0";
          fjs.parentNode.insertBefore(js, fjs);
        }(document, 'script', 'facebook-jssdk'));</script>

        <!-- Navbar -->
        <nav class="navbar navbar-default" role="navigation">
                <div class="container-fluid">
                  <div class="navbar-header">
                    <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar" aria-expanded="false" aria-controls="navbar">
                      <span class="sr-only">Toggle navigation</span>
                      <span class="icon-bar"></span>
                      <span class="icon-bar"></span>
                      <span class="icon-bar"></span>
                    </button>
                    <a class="navbar-brand" href="/">Smernice</a>
                  </div>
                  <div id="navbar" class="navbar-collapse collapse">
                    <ul class="nav navbar-nav">
                      <li class="active"><a href="/">Početna</a></li>
                      <li><a href="/add_path">Dodaj smernicu</a></li>
                      <li><a href="#">O nama</a></li>
                      <li><a href="#">Kontakt</a></li>
                      <li><a href="https://www.facebook.com/sharer/sharer.php?u=http://smernice.rs/{{ Request::path() }}">Share</a></li>
                    </ul>
                    <ul class="nav navbar-nav navbar-right">

                      <?php if (!Auth::check()) { ?>
                      <li><a href="../login">Prijava</a></li>
                      <?php } else { ?>
                      <li>
                          <a href="../profile">
                          <img class="img-circle" style="width:20px; height:20px" src="https://lh5.googleusercontent.com/-b0-k99FZlyE/AAAAAAAAAAI/AAAAAAAAAAA/eu7opA4byxI/photo.jpg?sz=100"/>
                          {{ Auth::user()->username }}
                          </a>
                      </li>
                      <li><a href="../logout">Odjava</a></li>
                      <?php } ?>
                    </ul>
                  </div><!--/.nav-collapse -->
                </div><!--/.container-fluid -->
              </nav>

        <!-- Container -->
        <div class="container">

            <!-- Content -->
            @yield('content')

        </div>

        <!-- Scripts are placed here -->
        {{ HTML::script('js/jquery-2.1.1.js') }}
        {{ HTML::script('js/bootstrap.min.js') }}

        @yield('scripts')

    </body>
</html>