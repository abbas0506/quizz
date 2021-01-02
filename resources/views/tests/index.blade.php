@extends("layout")
@section('header') 
    <div class="border-bottom text-center p-2 border-success bg-grey" id='header'>
      <div class="text-success txt-40"><i class="flaticon-write-letter"></i></div>
      <div>Available Quizzes </div>
   </div>
@endsection
@section('page')
<div class="flex-container-centered h-80">
       <div class="auto-expand">
           <div class="flex flex-row flex-wrap">
                 
                <!-- display available quizzes -->
                @foreach($quizzes as $quiz)
                    <div class="p-5 border m-2 auto-expand bg-grey">
                        <a href="{{url('/')}}/tests/{{$quiz->id}}" class="hyper">
                            <div class="txt-20 text-center">{{$quiz->description}}</div>
                            <div class="txt-10 text-center"> Questions <span class="badge badge-primary">{{$quiz->questions->count()}}</span></div>
                            <div class="txt-10 text-center">@if($quiz->created_at)Dated {{$quiz->created_at->format('d/m/y')}} @endif </div>
                        </a>
                    </div>
                    
                @endforeach
            </div>
        </div>
    </div>
@endsection
