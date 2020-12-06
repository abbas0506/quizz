@extends("layout")
@section('header') 
    <div class="border-bottom text-center p-2 border-success bg-grey" id='header'>
      <div class="text-success txt-40"><i class="flaticon-write-letter"></i></div>
      <div>Available Quizzes for Week No. {{session('weekNo')}} </div>
   </div>
@endsection
@section('page')
<div class="flex-container-centered h-80">
       <div class="auto-expand">
           <div class="flex flex-row flex-wrap">
                 
                <!-- display available quizzes -->
                @foreach($quizzes as $quiz)
                    <div class="p-5 border m-2 auto-expand bg-grey">
                        <a href="{{url('/')}}/tests/{{$quiz->id}}">
                            <div class="txt-20 txt-b text-center">{{$quiz->subject->name}}</div>
                            <div class="txt-10 text-center">{{$quiz->teacher->name}}</div>
                        </a>
                    </div>
                    
                @endforeach
            </div>
        </div>
    </div>
@endsection
