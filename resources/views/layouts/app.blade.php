<!DOCTYPE html>
<html lang="{{ app()->getLocale() }}">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <!-- CSRF Token -->
        <meta name="csrf-token" content="{{ csrf_token() }}">

        <title>{{ config('app.name', 'Laravel') }} {{ app()->version() }}</title>

        <!-- Styles -->
        <link href="{{ asset('css/app.css') }}" rel="stylesheet">
       <!-- <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bulma/0.6.2/css/bulma.min.css">
        <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.0.8/css/all.css" integrity="sha384-3AB7yXWz4OeoZcPbieVW64vVXEwADiYyAEhwilzWsLw+9FgqpyjjStpPnpBO8o8S" crossorigin="anonymous">-->
       
            <link type="text/css" rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/jsgrid/1.5.3/jsgrid.min.css" />
<link type="text/css" rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/jsgrid/1.5.3/jsgrid-theme.min.css" />
       <style>
       
       </style>
    </head>
    <body>
        <div id="app">
            <nav class="navbar has-shadow">
                <div class="container">
                    <div class="navbar-brand">
                        <a href="{{ url('/') }}" class="navbar-item">{{ config('app.name', 'Laravel') }}</a>

                        <div class="navbar-burger burger" data-target="navMenu">
                            <span></span>
                            <span></span>
                            <span></span>
                        </div>
                    </div>

                    <div class="navbar-menu" id="navMenu">
                        <div class="navbar-start"></div>

                        <div class="navbar-end">
                            @if (Auth::guest())
                                <a class="navbar-item " href="{{ route('login') }}">Login</a>
                                <a class="navbar-item " href="{{ route('register') }}">Register</a>
                            @else
                                <div class="navbar-item has-dropdown is-hoverable">
                                    <a class="navbar-link" href="#">{{ Auth::user()->name }}</a>

                                    <div class="navbar-dropdown">
                                        <a class="navbar-item" href="{{ route('logout') }}"
                                           onclick="event.preventDefault();document.getElementById('logout-form').submit();">
                                            Logout
                                        </a>

                                        <form id="logout-form" action="{{ route('logout') }}" method="POST"
                                              style="display: none;">
                                            {{ csrf_field() }}
                                        </form>
                                    </div>
                                </div>
                            @endif
                        </div>
                    </div>
                </div>
            </nav>
            @yield('content')
        </div>

        <!-- Scripts -->
        <script src="{{ asset('js/app.js') }}"></script>

<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
        <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/jsgrid/1.5.3/jsgrid.min.js"></script>
            <script>
  
 
   


    // CARGAR DATOS DESDE VIA AJAX USANDO JSGRID
           
           /*$.ajax({
                type:'GET',
                url: '/user'

            }).done(function(res){
              
                 $("#jsGrid").jsGrid({
                    width: "100%",
                    height: "400px",
             
                    inserting: true,
                    editing: true,
                    sorting: true,
                    paging: true,
             
                    data: res,
             
                    fields: [
                        { name: "name", type: "text", width: 150, validate: "required" },
                        { name: "email", type: "text", width: 200 },
                        { type: "control" }
                    ]
                });



            });*/


// INTENTANDO OTRO METODO
$(document).ready(function() {

                    $("#jsGrid").jsGrid({
                    width: "100%",
                    height: "400px",
             
                    inserting: true,
                    editing: true,
                    sorting: true,
                    paging: true,
                    autoload: true,
             
                     controller: {
                         loadData: function(filter) { 
                               
                               return $.ajax({
                                    type: "GET",
                                    url: "/user",
                                    data: filter
                                });

                               console.log(filter);

                         },
                         insertItem: function(item) {
                             console.log(item);
                         },
                         updateItem: function(item) {
                             console.log(item)
                         }
                        },
                         deleteItem: function(item) {
                             $.ajax("/api/members/", {
                                 data: { item: item},
                                 dataType: "json",
                                 error: function(err) { console.log(err);},
                                 method: "DELETE",
                                 success: function(result, status, jqXHR) {},
                             })
                         },
             
                    fields: [
                        { name: "name", type: "text", width: 150, validate: "required" },
                        { name: "email", type: "text", width: 200 },
                        { type: "control" }
                    ]
                });


          

});
               



</script>
    </body>
</html>
