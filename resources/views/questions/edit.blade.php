@extends("layout")
@section('header') 
   
   <div class="border-bottom text-center p-2 border-success bg-grey" id='header'>
      <div class="text-success txt-30"><i class="flaticon-pencil"></i></div>
      <div>Edit Question</div>
   </div>

@endsection

@section('page')
   
   <div class="flex-container-centered h-80" id='quizDetail'>
      <div class="w-50 auto-expand">
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
               timer:2000
            });
         </script>
         @endif
         @php
           
         @endphp
         <!-- display most recent question on top -->
         <form method="post" action="{{route('questions.update',$question->id)}}">
						   @csrf
                     @method('PUT')
						   <!-- Question statement -->
                     <div class="txt-b my-auto txt-20 mb-4">Q.</div>
                     <div class="mb-4"><textarea rows='3' class="form-control" placeholder="Question statement" required name='statement' value="{{$question->statement}}">{{$question->statement}}</textarea></div>
                     <div class="w-20 txt-b txt-20 my-auto mb-2" style="text-decoration:underline; text-decoration-color:green">Ans.</div>
                     
                     <!-- Option A -->
                     <div class="flex flex-row mb-2">
                        <div class="w-20 my-auto text-center"><input type="radio" name='ans' value="A" @if($question->ans=='A') checked @endif></div>
                        <div class="w-80"><input type="text" class="form-control" name='optionA' required value="{{$question->optionA}}"></div>
                     </div>
                     
                     <!-- Option B -->
                     <div class="flex flex-row mb-2">
                        <div class="w-20 my-auto text-center"><input type="radio" name='ans' value="B" @if($question->ans=='B') checked @endif></div>
                        <div class="w-80"><input type="text" class="form-control" name='optionB' required value="{{$question->optionB}}"></div>
                     </div>

                     <!-- Option C -->
                     <div class="flex flex-row mb-2">
                        <div class="w-20 my-auto text-center"><input type="radio" name='ans' value="C" @if($question->ans=='C') checked @endif ></div>
                        <div class="w-80"><input type="text" class="form-control" name='optionC' required value="{{$question->optionC}}"></div>
                     </div>

                     <!-- Option D -->
                     <div class="flex flex-row mb-4">
                        <div class="w-20 my-auto text-center"><input type="radio" name='ans' value="D" @if($question->ans=='D') checked @endif></div>
                        <div class="w-80"><input type="text" class="form-control" name='optionD' required value="{{$question->optionD}}"></div>
                     </div>

                     <div class="text-right mb-2"><button type='submit' class="btn btn-success">Submit</button></div>

                  </form>         
      </div>
      
   </div>

@endsection