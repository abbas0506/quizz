@extends("layout")
@section('header') 
   <div class="border-bottom text-center p-2 border-success bg-grey" id='header'>
      <div class="text-success txt-40"><i class="flaticon-exam"></i></div>
      <div class="txt-b">{{$quiz->subject->name}}</div>
      <div class="txt-12">( {{$quiz->teacher->profile->name}} )</div>
   </div>
@endsection

@php $sr=0; @endphp
@section('page')
   <div class="flex-container-centered h-70" id='quizDetail'>
      <div class="w-70 auto-expand">
      
         @if ($errors->any())
            <div class="alert alert-danger m-2">
               <ul>
                  @foreach ($errors->all() as $error)
                  <li>{{ $error }}</li>
                  @endforeach
               </ul>
            </div>
            <br />
         @endif

         <div class="txt-b m-4">Instructions:</div>
         <div class="txt-10 ml-2">
            <ul>
               <li><b>Total marks: {{$quiz->questions->count()}}, no time limit</b></li>
               <li>All questions carry equal marks</li>
               <li>You may change answer before submission</li>
               <li>Once submitted, will not be undone</li>
               <li>Avoid page refresh, it will reset your answeres</li>
            </ul>   

         </div>
         <!-- finish button -->
         <div class="text-right p-2">
            <div id='finish' class='txt-10'> Press me to cancel this quiz &nbsp <button class="btn btn-primary btn-sm" onclick="window.location.href='../students'">Cancel</button></div>
         </div>
         
         @foreach($quiz->questions as $question)
         <div class="m-2 mb-3 p-2 bg-grey border">
            <!-- question statment -->
            <div style='position:relative' >
               <span class='badge badge-primary rounded-50 top-left'>Q. {{++$sr}}</span>
               <div class="p-3 txt-b">{{$question->statement}}</div>
            </div>

            <!-- option A -->
            <div class="flex flex-row mb-2">
               <div class="w-10 text-center"></div>
               <div class="w-5"><input type="radio" class="mr-2" id="{{$sr}}-A" name='{{$sr}}-{{$question->ans}}'></div>
               <div class="w-80">{{$question->optionA}}</div>
            </div>
            
            <!-- option B -->
            <div class="flex flex-row mb-2">
               <div class="w-10 text-center"></div>
               <div class="w-5"><input type="radio" class="mr-2" id="{{$sr}}-B" name='{{$sr}}-{{$question->ans}}'></div>
               <div class="w-80">{{$question->optionB}}</div>
            </div>

            <!-- option C -->
            <div class="flex flex-row mb-2">
               <div class="w-10 text-center"></div>
               <div class="w-5"><input type="radio" class="mr-2" id="{{$sr}}-C" name='{{$sr}}-{{$question->ans}}'></div>
               <div class="w-80">{{$question->optionC}}</div>
            </div>

            <!-- option D -->
            <div class="flex flex-row mb-2">
               <div class="w-10 text-center"></div>
               <div class="w-5"><input type="radio" class="mr-2" id="{{$sr}}-D" name='{{$sr}}-{{$question->ans}}'></div>
               <div class="w-80">{{$question->optionD}}</div>
            </div>

         </div>
         
         @endforeach
         
         @if($quiz->questions->count()==0)
            
            <div class="text-center p-2">
               <div class="alert alert-info"> Quiz contains no question </div>   
            </div>
         
         @else
         <form method='post' action="../attempts" id='frm'>
            @csrf
            <input type="text" name='quizId' value="{{$quiz->id}}" required hidden>
            <input type="text" name='marks' id='marks' required hidden>
            <div class="text-right p-2 text-danger txt-12">
               Once submiited, will not be undone. Be careful! &nbsp<button class="btn btn-sm btn-danger" onclick="finish()">Submit</button>
            </div>

         </form>
         
            <!-- footer -->
            
         @endif
         
         
      </div>
      
   </div>

   

@endsection

@section('script')
   <script>
      function finish(){
         //confirm submission
         Swal.fire({
            title: 'Are you sure?',
            text: "Once submitted, will not be undone!",
            icon: 'warning',
            showCancelButton: true,
            confirmButtonColor: '#3085d6',
            cancelButtonColor: '#d33',
            confirmButtonText: 'Yes, submit!',
            closeOnConfirm: true,
            closeOnCancel: true
         }).then((result) => {   //if confirmed    
            if (result.value) {
               //calculate total number of questions
               var radios=document.querySelectorAll('input[type=radio]')
               
               var total=radios.length/4;
               var numOfChecked=0;
               var numOfCorrect=0;
               
               //calculate number of correct ans
               for(i=0; i<radios.length;i++){
                  if(radios[i].checked){
                     numOfChecked++;
                     if(radios[i].id==radios[i].getAttribute("name")){
                        numOfCorrect++;
                     }
                     
                  }
               }

               //bind marks and submit form
               $('#marks').val(numOfCorrect);
               $("#frm").submit(); 
            }
         })
      }
         
     function submitMarks(){
        //calculate total number of questions
        var radios=document.querySelectorAll('input[type=radio]')
         
         var total=radios.length/4;
         var numOfChecked=0;
         var numOfCorrect=0;
         
         //calculate number of correct ans
         for(i=0; i<radios.length;i++){
            if(radios[i].checked){
               numOfChecked++;
               if(radios[i].id==radios[i].getAttribute("name")){
                  numOfCorrect++;
               }
               
            }
         }

         //bind marks and submit form
         $('#marks').val(numOfCorrect);
         $("#frm").submit();
     }    
         
     
   </script>
@endsection 