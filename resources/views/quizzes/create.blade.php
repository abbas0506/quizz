@extends("layout")
@section('header') 
   <div class="border-bottom text-center p-2 border-success bg-grey" id='header'>
      <div class="text-success txt-40"><i class="flaticon-open-magazine"></i></div>
      <div>Choose one of the following subjects</div>
   </div>
@endsection

@section('page')
   <div class="flex-container-centered h-70">
      <div class="auto-expand">
         <div class="flex flex-row flex-wrap">
            <!-- display subjects -->
            @foreach($subjects as $subject)
               <div class="p-5 auto-expand bg-grey text-primary m-2 text-center hyper" onclick="submit('{{$subject->id}}')">{{$subject->name}}</div>
               <form method='post' action="../quizzes" id='form{{$subject->id}}'>
                  @csrf
                  <input type="text" name='subjectId' hidden value="{{$subject->id}}">
               </form>
               
            @endforeach
         </div>
      </div>
   </div>
@endsection
@section('script')
   <script>
      function submit(subjectId){
         var formId='form'+subjectId;
         document.getElementById(formId).submit();
         
      }
   </script>
@endsection