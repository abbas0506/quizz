@extends("layout")
@section('header') 
   <div class="border-bottom text-center p-2 border-success bg-grey" id='header'>
      <div class="text-success txt-40"><i class="flaticon-mortarboard"></i></div>
      <div>Level</div>
    </div>
@endsection
@section('page')
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
                  <div class="txt-20 text-center">Attempts</div>
                  <div class="txt-10 text-center">Click here to see <span class="badge badge-primary">{{$quizzes->count()}}</span></div>
               </a>
            </div>
                    
         </div>
                
      </div>
   </div>
@endsection