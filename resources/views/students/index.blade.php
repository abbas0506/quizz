@extends("layout")
@section('header') 
   <div class="border-bottom text-center p-2 border-success bg-grey" id='header'>
      <div class="text-success txt-40"><i class="flaticon-user-1"></i></div>
      <div>Welcome, {{$student->profile->name}} !</div>
    </div>
@endsection
@section('page')
   <div class="p-2 text-center"><a href='./signout' class="hyper text-danger">Signout <i class="flaticon-power text-danger txt-b"></i></a></div>
   <div class="flex-container-centered h-70">
      <div class="auto-expand">
         <div class="flex flex-row flex-wrap">
            <div class="p-5 border m-2 auto-expand bg-grey">
               <a href="#" class='hyper'>
                  <div class="txt-20 text-center">Results</div>
                  <div class="txt-10 text-center">Under development <span class="badge badge-primary"></span></div>
               </a>
            </div>
            <div class="p-5 border m-2 auto-expand bg-grey">
               <a href="./attempts" class='hyper'>
                  <div class="txt-20 text-center">Attempted</div>
                  <div class="txt-10 text-center">Click here to see <span class="badge badge-primary">{{$student->attempts()->count()}}/{{$student->quizzes()->count()}}</span></div>
               </a>
            </div>
            <div class="p-5 border m-2 auto-expand bg-grey">
               <a href="./pendings" class='hyper'>
                  <div class="txt-20 text-center">Pending</div>
                  <div class="txt-10 text-center">Click here to see <span class="badge badge-primary">{{$student->pendingQuizzes()->count()}}/{{$student->quizzes()->count()}}</span></div>
               </a>
            </div>
                    
         </div>
                
      </div>
   </div>
@endsection