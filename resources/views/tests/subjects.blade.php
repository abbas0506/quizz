@extends("layout")
@section('header') 
   <div class="border-bottom text-center p-2 border-success bg-grey" id='header'>
      <div class="text-success txt-40"><i class="flaticon-man"></i></div>
      <div>Welcome {{session('sname')}}</div>
      <div class="txt-10">Select a subject</div>
   </div>
@endsection
@section('page')
    <div class="flex-container-centered h-70">
       <div class="auto-expand">
           <div class="flex flex-row flex-wrap">
                <!-- View Levels and number of quizzes at each -->
                @foreach($subjects as $subject)
                
                <div class="p-5 border m-2 auto-expand bg-grey">
                    <a href="./tests/{{$subject->id}}" class='hyper'>
                        <div class="txt-20 text-center">{{$subject->name}} </div>
                        <div class="txt-10 text-center">Total Quizzes <span class="badge badge-primary">{{$subject->quizzes->count()}}</span></div>
                    </div>

                @endforeach
                
           </div>
         
       </div>
        
    </div>
@endsection