@extends("layout")
@section('header') 
   
   <div class="border-bottom text-center p-2 border-success bg-grey" id='header'>
      <div class="text-success txt-40"><i class="flaticon-exam"></i></div>
      <div class="txt-b">{{$quiz->subject->name}} - {{$quiz->level->name}},  Week No. {{session('weekNo')}}</div>
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
               <li>Once you are done, click on <span class='text-danger'>finish</span> button at the end of page</li>
            </ul>   

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
         <div class="m-2 bg-grey p-2">
            <!-- question statment -->
            <div class="flex flex-row mb-3">
               <div class="w-20 text-center txt-b">Q-{{$sr--}}.</div>
               <div class="w-70 txt-b">{{$question->statement}}</div>
               <div class="w-10">
                  <div class="flex flex-row justify-end">
                     <div><a href="../questions/{{$question->id}}" ><i class="flaticon-pencil text-success txt-10"></i></a></div>
                     <div>
                        <form method='post' action="../questions/{{$question->id}}" id="form{{$question->id}}" onsubmit="confirm('form{{$question->id}}')">
                           @csrf
                           @method('DELETE')
                           <button class="btn btn-sm btn-link text-danger txt-10" type="submit"><i class="flaticon-trash text-danger"></i></i></button>
                        </form>
                     </div>
                  </div>
               </div>
            </div> 
            
            <ol type="a" class='pl-3'>
            
               <!-- option A -->
               <div class="flex flex-row mb-2">
                  <div class="w-20 text-center">
                  @if($question->ans=='A')
                     <i class="flaticon-tick text-success txt-b correct"></i>
                  @endif
                  </div>
                  <div class="w-80"><li class='pl-2'>{{$question->optionA}}</li></div>
               </div>
               
               <!-- option B -->
               <div class="flex flex-row mb-2">
                  <div class="w-20 text-center">
                  @if($question->ans=='B')
                     <i class="flaticon-tick text-success txt-b"></i>
                  @endif
                  </div>
                  <div class="w-80"><li class='pl-2'>{{$question->optionB}}</li></div>
               </div>

               <!-- option C -->
               <div class="flex flex-row mb-2">
                  <div class="w-20 text-center">
                  @if($question->ans=='C')
                     <i class="flaticon-tick text-success txt-b"></i>
                  @endif
                  </div>
                  <div class="w-80"><li class='pl-2'>{{$question->optionC}}</li></div>
               </div>

               <!-- option D -->
               <div class="flex flex-row mb-2">
                  <div class="w-20 text-center">
                  @if($question->ans=='D')
                     <i class="flaticon-tick text-success txt-b"></i>
                  @endif
                  </div>
                  <div class="w-80"><li class='pl-2'>{{$question->optionD}}</li></div>
               </div>

            </ol>

         </div>
         
         @endforeach

         <!-- footer -->
         <div class="text-center p-2">
            <div id='finish'><button class="btn btn-danger" onclick="window.location.href='../quizzes'">Finish</button></div>
         </div>
         
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
                       document.getElementById(formId).submit();
                       
                     }

                  })
      }
   </script>
@endsection