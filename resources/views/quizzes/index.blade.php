@extends("layout")
@section('header') 
   <div class="border-bottom text-center p-2 border-success bg-grey" id='header'>
      <div class="text-success txt-40"><i class="flaticon-teacher"></i></div>
      <div>Welcome {{$user->name}}</div>
      <div class="txt-10">Create/View Quizzes here </div>
   </div>
@endsection
@section('page')
    <div class="flex-container-centered h-70">
       <div class="auto-expand">
           <div class="flex flex-row flex-wrap">
                <!-- View Levels and number of quizzes at each -->
                @foreach($levels as $level)
                
                <div class="p-5 border m-2 auto-expand bg-grey">
                    <a href="./quizzes/{{$level->id}}" class='hyper'>
                        <div class="txt-20 text-center">{{$level->name}} </div>
                        <div class="txt-10 text-center">Total Quizzes <span class="badge badge-primary">{{$level->quizzes->count()}}</span></div>
                    </div>

                @endforeach
                
           </div>
         
       </div>
        
    </div>
@endsection