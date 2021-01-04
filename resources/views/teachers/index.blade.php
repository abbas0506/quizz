@extends("layout")
@section('header') 
   <div class="border-bottom text-center p-2 border-success bg-grey" id='header'>
      <div class="text-success txt-40"><i class="flaticon-teacher"></i></div>
      <div>Welcome,  {{$teacher->name}}</div>
    </div>
@endsection
@section('page')
   <div class="flex-container-centered h-70">
      <div class="auto-expand">
         <div class="flex flex-row flex-wrap">
            <div class="p-5 border m-2 auto-expand bg-success">
               <a href="./quizzes/create" class='hyper  text-light'>
                  <div class="txt-20 text-center txt-b">+</div>
                  <div class="txt-10 text-center">Create Quiz </div>
               </a>
            </div>
            <div class="p-5 border m-2 auto-expand bg-grey">
               <a href="./quizzes" class='hyper'>
                  <div class="txt-20 text-center"><i class='flaticon-magnifying-glass'></i></div>
                  <div class="txt-10 text-center">Previous Quizzes &nbsp<span class="badge badge-primary">{{$teacher->quizzes->count()}}</span></div>
               </a>
            </div>
            
         </div>
                
      </div>
   </div>
@endsection