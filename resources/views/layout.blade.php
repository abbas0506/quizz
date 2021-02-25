<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
   <head>
      <meta charset="utf-8">
      <meta name="viewport" content="width=device-width, initial-scale=1">

      <title>SoftQuizz</title>

      <link href="{{ asset('css/app.css')}}" rel="stylesheet">
      <link rel="stylesheet" href="{{asset('fonts/flaticons/font/flaticon.css')}}">
      
      <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
      <script src="{{ asset('js/app.js')}}" type="text/javascript"></script>
      <meta name="csrf-token" content="{{ csrf_token() }}" />

   </head>
   
   <body>
      @yield('header')
      @yield('page')
      @yield('error')
      @yield('modal')
      @yield('script')
   </body>

    
    
</html>

