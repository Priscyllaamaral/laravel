<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>Laravel</title>

    <!-- Fonts -->
    <link href="https://fonts.googleapis.com/css?family=Nunito:200,600" rel="stylesheet">
    <!--  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@3.4.1/dist/css/bootstrap.min.css" integrity="sha384-HSMxcRTRxnN+Bdg0JdbxYKrThecOKuH5zCYotlSAcp1+c8xmyTe9GYg1l9a69psu" crossorigin="anonymous"> -->
    {{-- <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous"> --}}
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.3.0/font/bootstrap-icons.css">
    {{-- <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous"> --}}

  

    <!-- Styles -->
    <style>

  
      /* ::-webkit-scrollbar {
        width:10px;
        height: 10px;
      }
      
      ::-webkit-scrollbar-track {
        background:rgb(221, 200, 221);
      }
      
      ::-webkit-scrollbar-thumb {
        background: rgb(213, 153, 213);
      } */

      .centralizar{

        width: 100vw;
        height: 100vh;
        display: flex;
        background: darkslateblue;
        flex-direction: row;
        justify-content: center;
        align-items: center;
  

      }

      html {
        background: darkslateblue;
 
        min-height: 100vh;

  
      }

      body { 

        min-height: 100vh;
      }

      .ajustar{
        height: 90vh;
        align-items: initial;
     
      }

      .tamanhoBotao{
        width: 150px;
        height: 50px;
      }
       
      .inputSize {
        min-width: 100%;
        max-width: 100%;
      }

      .bordaInput{
        background: black;
      }

      .corContainer{
        background-color: darkslateblue; 
      }

      .corH5{
        text-align: center;
        color:aliceblue;
      }

    </style>

    <link rel="stylesheet" href="{{ asset('css/app.css') }}">
    <script>
      window.Config = {
        baseURL: "{{ url('/') }}",
      }
    </script>
</head>
<body>
    <div class="flex-center position-ref full-height">
          <div class="top-right links">
                @auth
                <nav class="navbar navbar-expand-lg navbar-light bg-light ">
                    <a class="navbar-brand" href="#">Anron</a>
                    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Alterna navegação">
                      <span class="navbar-toggler-icon"></span>
                    </button>
                    <div class="collapse navbar-collapse " id="navbarNav">
                      <ul class="navbar-nav ml-auto">
                        <li class="nav-item active">
                          <a class="nav-link" href="{{ route('home') }}">Home <span class="sr-only">(Página atual)</span></a>
                        </li>
                        <li class="nav-item">
                          <a class="nav-link" href="{{ route('logout') }}">LogOut</a>
                        </li>
                      </ul>
                    </div>
                  </nav>
                @endauth 
          </div>

      <div class="content" id="app">

            <div class="row">
                <div class="col-xl-12 d-flex centralizar">
                    @yield('content')
                </div>
            </div>
                            
        </div>

      </div>
      {{-- <script src="https://cdn.jsdelivr.net/npm/bootstrap@3.4.1/dist/js/bootstrap.min.js" integrity="sha384-aJ21OjlMXNL5UyIl/XNwTMqvzeRMZH2w8c5cRVpzpU8Y5bApTppSuUkhZXN0VxHd" crossorigin="anonymous"></script> --}}

      {{-- <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-kenU1KFdBIe4zVF0s0G1M5b4hcpxyD9F7jL+jjXkk+Q2h455rYXK/7HAuoJl+0I4" crossorigin="anonymous"></script>  --}}
      <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-kenU1KFdBIe4zVF0s0G1M5b4hcpxyD9F7jL+jjXkk+Q2h455rYXK/7HAuoJl+0I4" crossorigin="anonymous"></script>

        <script src="{{ asset('js/app.js') }}"></script>
    </body>
</html>