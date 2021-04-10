@extends("layout")
@section('page')
   <x-app__header/>
   <x-teachers__sidebar/>
   <div class='page-content'>
           
   <div class="flex mb-2 txt-l">{{$subject->name}}</div>
      <div class='flex bg-light border rounded auto-col'>
         <div class='flex w-60 my-auto auto-expand'>
            <select class="form-control border-0" onchange="listQuestions()">
               <option value="-1">Select a chapter</option>
               @foreach($subject->chapters as $chapter)
               <option value="{{$chapter->id}}">{{$chapter->name}}</option>
               @endforeach
            </select>
         </div>
         <div class="flex ml-2 txt-xl mr-auto mx-auto">
            <div class="text-center"><i class='flaticon-plus text-success'></i></div>
            <div class="text-center txt-s text-success my-auto"> &nbsp Add new Question</div>
         </div>
               
         <div class="flex mx-auto">
            <div class="menu-hz my-auto" >Short </div>
            <div class="menu-hz my-auto">Long</div>
            <div class="menu-hz my-auto">MCQs</div>
         </div>
            
      </div>
   <form method='post' action="listQuestions">
      @csrf
      <input type="text" name='chapter_id' id='chapter_id' hidden>
   </form>

@endsection

@section('script')
   <script>
      
      function listQuestions(){
         $('#chapter_id').val(event.target.value);
         $('form').submit()
         
      }
      
   </script>
@endsection