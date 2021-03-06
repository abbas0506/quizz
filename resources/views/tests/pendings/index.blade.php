@extends("layout")
@section('header') 
   <div class="border-bottom text-center p-2 border-success bg-grey" id='header'>
      <div class="text-success txt-40"><i class="flaticon-write-letter"></i></div>
      <div class="txt-b">Pending Quizzes &nbsp <span class="badge badge-success rounded-50">{{$student->pendingQuizzes()->count()}}</span></div>
   </div>
@endsection
@section('page')
    <div class="flex-container-centered h-70">
       <div class="w-70 auto-expand">
        <div class="txt-b ml-2">How to use?</div>
            <div class="txt-10 ml-2">
                <ul>
                    <li>Click on subject to see pending quizzes</li>
                    <li>Click on quiz name to open quiz</li>
                    
                </ul>   

            </div>

            <!-- finish button -->
            <div class="text-right p-2">
                <div id='finish' class='txt-10'> Click me to go back <button class="btn btn-primary btn-sm" onclick="window.location.href='./students'">Home</button></div>
            </div>
            <!-- display most recent subects on top -->
            @foreach($student->subjects() as $subject)
            <div class="flex flex-col border mb-2">
                <div class="flex flex-row bg-grey p-2">   
                    <a href='#' data-toggle='collapse' data-target='#s{{$subject->id}}' role='button' aria-expanded="false" aria-controls="s{{$subject->id}}">
                        {{$subject->name}}
                    </a>
                    &nbsp &nbsp <span class="badge badge-success txt-8 my-auto">{{$student->pendingQuizzesBySubjectId($subject->id)->count()}}</span>
                
                </div>
            
                <div class="flex flex-col collapse p-2" id='s{{$subject->id}}'>   
                    @foreach($student->pendingQuizzesBySubjectId($subject->id) as $quiz)
                        <div class="flex flex-row">
                            <div class="w-10"></div>
                            <div class="w-50 txt-12"> &#8226;  &nbsp <a href="./pendings/{{$quiz->id}}" class="hyper">{{$quiz->description}} </a> </div>
                            <div class="w-20 my-auto txt-12">{{$quiz->created_at->format('d-m-Y')}}</div>
                            <div class="w-20 my-auto txt-12 text-center">Marks: {{$quiz->questions->count()}}</div>
                        </div>
                        
                    @endforeach
                </div>
            </div>                
            @endforeach
        </div>
        
    </div>
@endsection