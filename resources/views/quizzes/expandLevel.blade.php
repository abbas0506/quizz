@extends("layout")
@section('header') 
   <div class="border-bottom text-center p-2 border-success bg-grey" id='header'>
      <div class="text-success txt-40"><i class="flaticon-mortarboard"></i></div>
      <div>{{$level->name}}</div>
    </div>
@endsection
@section('page')
    <div class="flex-container-centered h-70">
       <div class="auto-expand">
           <div class="flex flex-row flex-wrap">
                    <!-- show all subjects and number of quizzess for each -->
                    @foreach($subjects as $subject)
                        
                        <div class="p-5 border m-2 auto-expand bg-grey">
                            <a href="../quizzes/{{$level->id}}/{{$subject->id}}" class='hyper'>
                                <div class="txt-20 text-center">{{$subject->name}}</div>
                                <div class="txt-10 text-center">Quizzes <span class="badge badge-primary">{{$subject->quizzesAtLevel($level->id)->count()}}</span></div>
                            </a>
                        </div>
                    @endforeach
                    </div>
                
            </div>
        
    </div>
@endsection