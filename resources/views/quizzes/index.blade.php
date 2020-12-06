@extends("layout")
@section('header') 
   <div class="border-bottom text-center p-2 border-success bg-grey" id='header'>
      <div class="text-success txt-40"><i class="flaticon-write-letter"></i></div>
      <div>Create / Edit / Delete Quiz </div>
   </div>
@endsection
@section('page')
    <div class="flex-container-centered h-70">
       <div class="auto-expand">
           <div class="flex flex-row flex-wrap">
                <!-- create new quiz icon -->
                <a href="./quizzes/create" class="hyper auto-expand">
                    <div class="p-5 text-center m-2 bg-success txt-30 text-light">+</div>
                </a>
                
                <!-- display previous quizzes -->
                @foreach($quizzes as $quiz)
                    <div class="border m-2 auto-expand bg-grey">
                        
                        <div style="position:relative; top:-2px; right:0px">
                        
                            <form method='post' action="./quizzes/{{$quiz->id}}" id="form{{$quiz->id}}" onsubmit="confirm('form{{$quiz->id}}')">
                            @csrf
                            @method('DELETE')
                            <button class="btn btn-sm btn-link text-danger txt-10" type="submit"><i class="flaticon-trash text-danger"></i></i></button>
                            </form>
                        </div>

                        <div class='p-4'>
                            <a href="./quizzes/{{$quiz->id}}">
                                <div class="txt-20 txt-b text-center">{{$quiz->subject->name}}</div>
                                <div class="txt-10 text-center">{{$quiz->teacher->name}}</div>
                            </a>
                        </div>
                    </div>
                    
                @endforeach
                
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