<!DOCTYPE html>
<html lang="{{ app()->getLocale() }}">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>CAT Technologies</title>

    <!-- Styles -->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
</head>
<body>
    <div id="app">
        <nav class="navbar navbar-default navbar-static-top" style="background-image: url(&quot;data:image/gif;base64,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&quot;); background-color: rgb(64, 93, 155);">
            <div class="container">
                <div class="navbar-header">

                    <!-- Collapsed Hamburger -->
                    <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#app-navbar-collapse">
                        <span class="sr-only">Toggle Navigation</span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                    </button>

                    <!-- Branding Image -->
                    <a class="navbar-brand" href="{{ url('/') }}">
                       <img  src="data:image/png;base64,iVBORw0KGgoAAAANSUhEUgAAAMgAAAAeCAYAAABpP1GsAAAACXBIWXMAAAsSAAALEgHS3X78AAAE4ElEQVR42u1cv4/cVBD+HqJODAUSUMREKAVCrGn5ofNJUASKc1pAipFQREGxIEqkbPgLlooSnxSoTZGWcyQkGoR8fwDCEaICgTeKhEQzFP7Mzr08rzdwG067M9KTve+N3/qe5/PMN/P2nIjAZLPinIsBzAA0ACoAJYBKRDJbnbMtj9gSbAQQiXOucs6Jc24G4GUAKYAYQM3z3FbKALILYIiccyXBIM65GsBTHF7weEtEYhHJRaQVkVpEWlu9sy+P2hL8Z4kBHKjPEwCXRCS1pdmCF6BxkAfzFuQPe6r7M/KKDEBEbjG31TKA7CJAcgBf+P0i4mx1LMTaVVDEDKNA75ECuKo4xnxD3+uHaI2INPZEDCBnOZxaAJiKSL7h704BHHndV9CliU0eolgWa1imHjgA4Dy6esbDIP6+1PZIzIOcJSnQ1SoueP2zVWGYiFRreKZE8ZeQfhLgOeY9/g8REWteo4GmPE9Vi5ROTBC1AMRrVX+9mm9IVxg6ZbxOVrRKzdlSX99TxNb0n/0jW2zPeU1bsEU4YVxFwCgLbYTUzVcYu24pdeWU2lyBsyWwPud3VAzDPlVAqwG8Qd2PqX+N/Zk99/FmIdZScpWd0nJVjcM5l4VSvQMyH+ATC/IZX+7QmCde/7HyGDoEawE8Sb70A4CLBPovAL7m+dvUe43XPIHllhcT4yCnIq3iD0XAeDMFiGiEXJciMnfOFQFA5jReH4C5iNTenJmIVLynFMBvAJ4liM4BuEvPVzvnpgC+IYBaAN8ap1kzo2iFwhMEOqeR7injL0VkpsZ9491fg5gnPYdRx0lA9UWC7brHE503X8k5PgFwj6FTJCINEwYA0IpIqz7/02dP2kj6pnhK6XGCdkQ/o/GuxTF4TTVEzNW8Db3Ilzz/ip9f5T2+R09xjeNTjhs5Nw7yrzxHRM+RKc7QAChERIdUK8Mnr/odD3CVBa9LPB5yeyDF2wTutaUnKgG8A+Am9V7hPb5E9Ys8Pj7AhUzMg6zlGeoVb/ZC6flv90aNTdfJaqksVChbFo9l0QiApE8fqzRypLxWxOMLBFLS61p7sGYcpHsry8hLxKnY/yBA0ptAf0j6nb+zAAf5kEA9Grh2n6Q8UYmCAwCPKc8Tq7HW83qR1/8+if33iuzHDBuNwBtJPwGQYiDFCwDv9mHWwB4pDKRrgfur8Ktkn8ejEZAWKoT7EcDPqi7zHYDLAD5g3aMPxwoArwN4C8BHBNZfAH4F8CbHE7ZcREqDRie2F6szvpwZpBvo6geHPH9GcxBmq65g+UvBkNymoc0GxheKb2jJ6EFCcx+r84rz76Grd2RYFg0XfQjGY83jFMCf9GAXqHsJwNMcO0e987D6iHmQU/I6mUeoG2acGqUT4+Rvz2saeBQgzS1rFlGAqLe6DsIwq2EaN1UAeR7APc6TePP9DuAuU8GpCrVaAM8x49VueqeyAWQ7jD/nm3XihU0Fuu0e7Rb+zelYPccAYgL+F5LrK1SORSSxldoNsTrI/ZKOjE88QPkhkf3yz0j6VksxMn7Y8wDnXAXgD3SZp7795JxryFFMLMTayjArJblO6DHukGCXIlLQazQI78jVsm9xvYVYWyc06lWGnawBjj5cM4CYB9lJL1MjvCO3lwW67R3GR4yD7CyZv4Fl1VwD49DAsR3yN0CDSESEfSmyAAAAAElFTkSuQmCC" title="CAT TECHNOLOGIES ARGENTINA SOCIEDAD ANONIMA" alt="CAT TECHNOLOGIES ARGENTINA SOCIEDAD ANONIMA">
                    </a>
                </div>

                <div class="collapse navbar-collapse" id="app-navbar-collapse">
                    <!-- Left Side Of Navbar -->
                    <ul class="nav navbar-nav">
                        &nbsp;
                    </ul>

                    <!-- Right Side Of Navbar -->
                    <ul class="nav navbar-nav navbar-right">
                        <!-- Authentication Links -->
                        @if (Auth::guest())
                          <li><a href="{{ route('login') }}" style="color:#FFF">Ingreso</a></li>                           
                        @else
                            <li class="dropdown">
                                <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false">
                                    {{ Auth::user()->name }} <span class="caret"></span>
                                </a>

                                <ul class="dropdown-menu" role="menu">
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
                        @endif
                    </ul>
                </div>
            </div>
        </nav>

        @yield('content')
    </div>

    <!-- Scripts -->
    <script src="{{ asset('js/app.js') }}"></script>
</body>
</html>
