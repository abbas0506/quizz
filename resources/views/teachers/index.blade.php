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
            <div class="p-5 border m-2 auto-expand bg-grey">
               <a href="./quizzes" class='hyper'>
                  <div class="txt-20 text-center">Quizzes</div>
                  <div class="txt-10 text-center">Create / View / Edit <span class="badge badge-primary">{{$teacher->quizzes->count()}}</span></div>
               </a>
            </div>
            <div class="p-5 border m-2 auto-expand bg-grey">
               <a href="./tests/subjects" class='hyper'>
                  <div class="txt-20 text-center">Analysis</div>
                  <div class="txt-10 text-center">Under development <span class="badge badge-primary"></span></div>
               </a>
            </div>
                    
         </div>
                
      </div>
   </div>
@endsection