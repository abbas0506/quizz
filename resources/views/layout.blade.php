<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
   <head>
      <meta charset="utf-8">
      <meta name="viewport" content="width=device-width, initial-scale=1">

      <title>Laravel</title>

      <!-- Fonts -->
      <link href="https://fonts.googleapis.com/css2?family=Nunito:wght@400;600;700&display=swap" rel="stylesheet">
      <link href="{{ asset('css/app.css')}}" rel="stylesheet">
      <link rel="stylesheet" href="{{asset('fonts/flaticons/font/flaticon.css')}}">
      
      <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
      <script src="{{ asset('js/app.js')}}" type="text/javascript"></script>
      <meta name="csrf-token" content="{{ csrf_token() }}" />

      <style>
         body {
            font-family: 'Nunito';
            background-color: white;
            
         }
         .bg-green-gradient{
            background: linear-gradient(to right, #076445 0%, #f5f8f8 100%);
         } 
         .bg-grey{
            background-color: #f6f6f7;
         }
         /* breadcrumb */

         .breadcrumb{
            background: transparent;
            font-size:0.8rem !important;
            }
         .breadcrumb li a{
            color:green;
         }
         
         /* text related css */
         
         .txt-8{
            font-size:8px;
         }
         .txt-10{
            font-size: 10px;
         } 
         .txt-xs{
            font-size: 10px;
         }
         .txt-s{
            font-size: 12px;
         }

         .txt-grey{
            color:grey;
         }
         
         .txt-20{
            font-size: 20px;
         } 
         .txt-30{
            font-size: 30px;
         } 
         .txt-40{
            font-size: 40px;
         }
         .txt-b{
            font-weight: bold;
         }
         .txt-i{
            font-style: italic;
         }
         
         /* flex related css */
         
         .flex{
            display: flex;
         }
         .flex-wrap{
            flex-wrap: wrap;
         }
         
         .flex-row{
            flex-flow: row;
         }
         .flex-col{
            flex-flow: column;
         }
         .justify-center{
            justify-content: center;
         }
         .justify-end{
            justify-content: flex-end;
         }

         .justify-space-around{
            justify-content: space-around;
         }
         .flex-container-centered{
            display: flex;
            align-items: center;
            justify-content:center;
         }
        
         /* width size related css */
         
         .w-5{
            width:5%;   
         }
         
         .w-10{
            width:10%;   
         }
         .w-20{
            width:20%;
         }
         .w-30{
            width:30%;
         }
         .w-40{
            width:40%;
         }
         .w-50{
            width:50% !important;
         }
         .w-60{
            width:60% !important;
         }
         .w-70{
            width:70% !important; 
         }
         .w-80{
            width:80% !important; 
         }
         .w-90{
            width:90% !important; 
         }
         .w-100{
            width:100% !important; 
         }
         
         /* height related css */

         .h-10{
            min-height: 10vh !important;
         }
         .h-20{
            height: 20vh !important;
         }
         .h-30{
            height: 30vh !important;
         }
         .h-40{
            height: 40vh !important;
         }
         .h-50{
            height: 50vh !important;
         } 
         .h-60{
            height: 60vh !important;
         }  
         .h-70{
            min-height: 70vh !important;
         }
         .h-80{
            min-height: 80vh !important;
         }
         .h-90{
            min-height: 90vh !important;
         }
         .h-100{
            min-height: 100vh !important;
         }

         .lh-10{
            line-height: 10vh !important;
         }
         
         /* general css */
         
         .rounded-5{
            border-radius: 5px;
         }
         .rounded-50{
            border-radius: 50px;
         }
         .flex-grow{
            flex-grow: 1;
         }
         .hidden{
            display: none;
         }
         .icon-top-center{
            position: relative;
            font-size: 40px;
            text-align: center;
            margin-bottom: 20px;
         }
         
         .hyper{
            text-decoration: none;
            cursor:pointer;
         }
         .hyper:hover{
            color:#076445 !important;
            text-decoration: none;
         }

         /** on small screen */
         @media only screen and (max-width: 600px) {
         .auto-expand{
            width: 100% !important;
            padding: 5% !important;
            
            }
         }
   
      </style>
         
   </head>
   
   <body>
      @yield('header')
      @yield('page')
      @yield('error')
      @yield('modal')
      @yield('script')
   </body>

    
    
</html>

