@extends("layout")
@section('header') 
   <div class="border-bottom text-center p-2 border-success bg-grey" id='header'>
      <div class="text-success txt-40"><i class="flaticon-exam"></i></div>
      <div class="txt-b">{{$quiz->level->name}} - {{$quiz->subject->name}},  Week No. {{session('weekNo')}}</div>
      <div>by sir {{$quiz->teacher->name}}</div>
   </div>
@endsection
@php $sr=0; @endphp
@section('page')
   <div class="flex-container-centered h-70" id='quizDetail'>
      <div class="w-70 auto-expand">
         
         <div class="txt-b ml-2">Instructions:</div>
         <div class="txt-10 ml-2">
            <ul>
               <li>All questions carry equal marks: ( Total Marks - {{$quiz->questions->count()}} )</li>
               <li>You may change your ans at any time, before you finish</li>
               <li>After you <span class='text-danger txt-b'> finish </span>, correct option will be shown to you</li>
               <li>To see your marks, click on view results at bottom of page</li>
            </ul>   

         </div>
        
         <div class="text-center p-2">
            <div class="hidden" id='showResultLink'><a href="{{url('/')}}/results/{{$quiz->id}}" class="btn btn-primary">Click here to view your marks</a></div>
               
         </div>
      
         @foreach($quiz->questions as $question)
         <div class="m-2 bg-grey p-2">
            <!-- question statment -->
            <div class="flex flex-row mb-3">
               <div class="w-20 text-center txt-b">Q-{{++$sr}}.</div>
               <div class="w-80 txt-b">{{$question->statement}}</div>
            </div> 
            <!-- option A -->
            <div class="flex flex-row mb-2">
               <div class="w-20 text-center">
               @if($question->ans=='A')
                  <i class="flaticon-tick text-success txt-b correct hidden"></i>
               @endif
               </div>
               <div class="pr-2"><input type="radio" class="mr-2" id="{{$sr}}-A" name='{{$sr}}-{{$question->ans}}'></div>
               <div class="w-75">{{$question->optionA}}</div>
            </div>
            
            <!-- option B -->
            <div class="flex flex-row mb-2">
               <div class="w-20 text-center">
               @if($question->ans=='B')
                  <i class="flaticon-tick text-success txt-b correct hidden"></i>
               @endif
               </div>
               <div class="pr-2"><input type="radio" class="mr-2" id="{{$sr}}-B" name='{{$sr}}-{{$question->ans}}'></div>
               <div class="w-75">{{$question->optionB}}</div>
            </div>

            <!-- option C -->
            <div class="flex flex-row mb-2">
               <div class="w-20 text-center">
               @if($question->ans=='C')
                  <i class="flaticon-tick text-success txt-b correct hidden"></i>
               @endif
               </div>
               <div class="pr-2"><input type="radio" class="mr-2" id="{{$sr}}-C" name='{{$sr}}-{{$question->ans}}'></div>
               <div class="w-75">{{$question->optionC}}</div>
            </div>

            <!-- option D -->
            <div class="flex flex-row mb-2">
               <div class="w-20 text-center">
               @if($question->ans=='D')
                  <i class="flaticon-tick text-success txt-b correct hidden"></i>
               @endif
               </div>
               <div class="pr-2"><input type="radio" class="mr-2" id="{{$sr}}-D" name='{{$sr}}-{{$question->ans}}'></div>
               <div class="w-75">{{$question->optionD}}</div>
            </div>

         </div>
         
         @endforeach
         
         @if($quiz->questions->count()==0)
            
            <div class="text-center p-2">
               <div class="text-danger"> Found no question </div>   
            </div>
         
         @else
            <!-- footer -->
            <div class="text-center p-2">
               <div id='finish'><button class="btn btn-danger" onclick="finish()">Submit</button></div>
               
            </div>

         @endif
         
         
      </div>
      
   </div>

@endsection

@section('script')
   <script>
      $(document).ready(function(){
         $.ajaxSetup({
            headers: {
                  'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
         });

      }); 

      function finish(){
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

         //store quiz result
         $.ajax({
            type:'post',
            url:"../results",   //two folder back
            data:{
               marks:numOfCorrect,
            },
            success:function(response){
               //
               Toast.fire({
                  icon: 'success',
                  title: response.msg,
               });
            },
            error: function(XMLHttpRequest, textStatus, errorThrown) {
               Toast.fire({
                  icon: 'warning',
                  title: 'Some error',
               });
            }
         });
         
                 
         //display correct options by tick marks
         var x = document.getElementsByClassName("correct hidden");
         for(i=0; i<x.length; i++){
            x[i].style.display = 'inline';
         }

         
         //hide finsih button and show result link
         var finishBtn=document.getElementById('finish');
         finishBtn.style.display='none'
         var showrResultLink=document.getElementById('showResultLink');
         showrResultLink.style.display='inline'

         
      }  
   </script>
@endsection 