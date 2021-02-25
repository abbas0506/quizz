<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
   <head>
      <meta charset="utf-8">
      <meta name="viewport" content="width=device-width, initial-scale=1">

      <title>SoftQuizz</title>

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
            opacity:0.75; 
            background-color:black;
         }

         .fancy-input{
            border: 0; 
            padding: 2px; 
            border-bottom: 2px solid orange; 
            background-color: sandybrown;
            box-sizing: border-box; 
            
         }
         .fancy-input input{
            border: 0;
            outline: none;
            padding: 5px 5px 8px 0px;
            width: 100%;
            font-size: 18px;
            box-sizing: border-box; 
            letter-spacing: 1px;
            background-color: transparent;
         }
         .fancy-input input:focus{
           border-bottom: 2px orange;
            
         }
         input:placeholder-shown {
    border: 1px solid red; /* Red border only if the input is empty */
}
input:placeholder-shown label{
   font-size: 1rem;
  cursor: text;
  top: 20px;
}  
   
      </style>
         
   </head>
   
   <body>
         <div class='fancy-input w-25'>
            <label for="txtName">Abbas</label>
            <input id="txtName" type='text' placeholder="Enter your name" required>
         </div>
   </body>

    
    
</html>







<!-- .fancy-input{
            border: 0; padding: 2px; border-bottom: 2px solid orange; background-color: transparent;
            /* border: none;
            outline: none;
            position: relative;
            margin: 0 0 20px 0;
            padding: 0;
            box-sizing: border-box; */
            
         }

.fancy-input~input {
  border: 0;
  outline: none;
  padding: 5px 5px 8px 0px;
  width: 100%;
  font-size: 18px;
  width: 100%; 
            box-sizing: border-box; 
            letter-spacing: 1px;
            outline: none;
  
}

.fancy-input~label {
   position: absolute; left: 0; width: 100%; top: 9px; color: #aaa; transition: 0.3s; z-index: -1; letter-spacing: 0.5px;
   /* opacity: 0.5;
  position: absolute;
  top: 10px;
  left: 0px;
  
  transition: all 0.2s ease;
  font-size: 18px; */
}

.float-label-field.focus label {
  color: orange;
}
.float-label-field.focus input {
  border-bottom: solid 1px orange;
}
.float-label-field.float label {
  opacity: 1;
  top: -8px;
  font-size: 60%;
  transition: all 0.2s ease;
  font-weight: bold;
}

         
         /* necessary to give position: relative to parent.
         input[type="text"]{
            font: 15px/24px 'Muli', sans-serif; 
            color: #333; 
            width: 100%; 
            box-sizing: border-box; 
            letter-spacing: 1px;
            outline: none;
         }

         /* :focus{} */
         /* .effect-17{border: 0; padding: 4px 0; border-bottom: 2px solid #ccc; background-color: transparent;}
         .effect-17:focus{color:white}

         .effect-17 ~ .focus-border{position: absolute; bottom: 0; left: 50%; width: 0; height: 2px; background-color: #4caf50; transition: 0.4s;}
         .effect-17:focus ~ .focus-border{width: 100%; transition: 0.4s; left: 0;}
         .effect-17 ~ label{position: absolute; left: 0; width: 100%; top: 9px; color: #aaa; transition: 0.3s; z-index: -1; letter-spacing: 0.5px;}
         .effect-17:focus ~ label{top: -16px; font-size: 16px; color: #4caf50; transition: 0.3s;}
                   */ */
         
          -->