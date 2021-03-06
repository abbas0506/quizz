@extends("layout")
@section('header') 
   
   <div class="border-bottom text-center p-2 border-success bg-grey" id='header'>
      <div class="text-success txt-40"><i class="flaticon-exam"></i></div>
      <div class="txt-b">{{$quiz->subject->name}} - {{$quiz->description}}</div>
   </div>

@endsection

@section('page')
   <div class="p-2 text-center"><button type="button" class="btn btn-info btn-lg text-light rounded-50" data-toggle="modal" data-target="#createQuizModal">+</button></div>
   <div class="flex-container-centered h-70" id='quizDetail'>
      <div class="w-70 auto-expand">
         
         <div class="txt-b ml-2">Instructions:</div>
         <div class="txt-10 ml-2">
            <ul>
               <li>Use <i class="flaticon-plus text-info"></i> to create new question </li>
               <li>Use <i class="flaticon-pencil text-success txt-10"></i> to edit a question </li>
               <li>Use <i class="flaticon-trash text-danger"></i> to delete a question </li>
            </ul>   

         </div>

         <!-- footer -->
         <div class="text-right p-2">
            <div id='finish' class='txt-10'>After adding all questions, click on finsh button <button class="btn btn-danger btn-sm" onclick="window.location.href='../quizzes'">Finish</button></div>
         </div>
         
         @if ($errors->any())
         <div class="alert alert-danger">
            <ul>
               @foreach ($errors->all() as $error)
               <li>{{ $error }}</li>
               @endforeach
            </ul>
         </div>
         <br />
         @elseif(session('success'))
         <script>
            Swal.fire({
               icon: 'success',
               text: "{{session('success')}}",
               showConfirmButton: false,
               timer:3000
            });
         </script>
         @endif
         
         @php 
            $sr=$quiz->questions->count();  
         @endphp
         
         <!-- display most recent question on top -->
         @foreach($quiz->questions->sortByDesc('id') as $question)
         <div class="m-2 bg-grey border p-2">
            <!-- question statment -->
            <div style='position:relative' >
               <span class='badge badge-primary rounded-50 top-left'>Q. {{$sr--}}</span>
               <div class="flex flex-row p-2">
                  <div class="w-5"></div>
                  <div class=" txt-b">{{$question->statement}}</div>
                  <div class="top-right-corner">
                     <a href="{{route('questions.edit', $question->id)}}" class="hyper"><i class="flaticon-pencil text-success txt-10"></i></a>
                     &nbsp
                     <i class="flaticon-trash text-danger txt-10 hyper" onclick="confirm('form{{$question->id}}')"></i>
                  </div>
               </div>
            </div>
            
            <form method='post' action="{{route('questions.destroy',$question->id)}}" id="form{{$question->id}}">
               @csrf
               @method('DELETE')
            </form> 
            <!-- option A -->
            <div class="flex flex-row mb-1">
               <div class="w-10 text-right pr-4"></div>
               <div class="w-90 @if($question->ans=='A') text-success txt-b @endif"> a. &nbsp {{$question->optionA}}</div>
            </div>
            
            <!-- option B -->
            <div class="flex flex-row mb-1">
               <div class="w-10 text-right pr-4"></div>
               <div class="w-90 @if($question->ans=='B') text-success txt-b @endif">b. &nbsp {{$question->optionB}}</div>
            </div>

            <!-- option C -->
            <div class="flex flex-row mb-1">
               <div class="w-10 text-right pr-4"></div>
               <div class="w-90 @if($question->ans=='C') text-success txt-b @endif">c. &nbsp {{$question->optionC}}</div>
            </div>

            <!-- option D -->
            <div class="flex flex-row mb-1">
               <div class="w-10 text-right pr-4"></div>
               <div class="w-90 @if($question->ans=='D') text-success txt-b @endif">d. &nbsp {{$question->optionD}}</div>            
            </div>

         </div>
         
         @endforeach
         
         
      </div>
      
   </div>

@endsection
@section('modal')
  <!----------------------------------------------------------------------------
									create question modal
	------------------------------------------------------------------------------>

	<div class="modal fade" id="createQuizModal" role="dialog" >
		<div class="modal-dialog">
			<div class="modal-content">
				<!-- Modal Header -->
				<div class="modal-header">
					<h4 class="modal-title">New Question</h4>
					<button type="button" class="close" data-dismiss="modal">&times;</button>
				</div>

				<!-- modal body -->
				<div class="modal-body">
					<div class="container">
					   <form method="post" action="../questions">
						   @csrf
                     <input type="text" id='quizId' name='quizId' value="{{$quiz->id}}" hidden>
                     <!-- Question statement -->
                     <div class="txt-b my-auto txt-20 mb-4">Q.</div>
                     <div class="mb-4"><textarea type="text" rows='3' class="form-control" placeholder="Question statement" required id='statement' name='statement'></textarea></div>
                     <div class="w-20 txt-b txt-20 my-auto mb-2" style="text-decoration:underline; text-decoration-color:green">Ans.</div>
                     
                     <!-- Option A -->
                     <div class="flex flex-row mb-2">
                        <div class="w-20 my-auto text-center"><input type="radio" name='ans' value="A" checked></div>
                        <div class="w-80"><input type="text" class="form-control" name='optionA' required></div>
                     </div>
                     
                     <!-- Option B -->
                     <div class="flex flex-row mb-2">
                        <div class="w-20 my-auto text-center"><input type="radio" name='ans' value="B"></div>
                        <div class="w-80"><input type="text" class="form-control" name='optionB' required></div>
                     </div>

                     <!-- Option C -->
                     <div class="flex flex-row mb-2">
                        <div class="w-20 my-auto text-center"><input type="radio" name='ans' value="C" ></div>
                        <div class="w-80"><input type="text" class="form-control" name='optionC' required></div>
                     </div>

                     <!-- Option D -->
                     <div class="flex flex-row mb-4">
                        <div class="w-20 my-auto text-center"><input type="radio" name='ans' value="D"></div>
                        <div class="w-80"><input type="text" class="form-control" name='optionD' required></div>
                     </div>

                     <div class="text-right mb-2"><button type='submit' class="btn btn-success">Submit</button></div>

                  </form>         
					</div>
				</div>
			</div>
		</div> 
	</div>
	
@endsection

@section('script')
   <script>
      function confirm(formId){
         event.preventDefault();
         Swal.fire({
                    title: 'Are you sure?',
                    text: "You won't be able to revert this!",
                    icon: 'warning',
                    showCancelButton: true,
                    confirmButtonColor: '#3085d6',
                    cancelButtonColor: '#d33',
                    confirmButtonText: 'Yes, delete it!',
                    closeOnConfirm: true,
                     closeOnCancel: true
                    }).then((result) => {
                        
                    if (result.value) {
                        //submit form 
                       $('#'+formId).submit();
                       
                     }

                  })
      }
   </script>
@endsection