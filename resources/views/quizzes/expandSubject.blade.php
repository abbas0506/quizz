@extends("layout")
@section('header') 
   <div class="border-bottom text-center p-2 border-success bg-grey" id='header'>
      <div class="text-success txt-40"><i class="flaticon-open-magazine"></i></div>
      <div>{{$level->name}}, {{$subject->name}}</div>
    </div>
@endsection
@section('page')
        <div class="flex-container-centered h-70">
            <div class="auto-expand">
                <div class="flex flex-row flex-wrap">
                    <!-- create new quiz icon -->
                    <div class="p-5 m-2 auto-expand bg-success">
                        <a href="../create" class='hyper'>
                            <div class="txt-20 txt-b text-center text-light">+</div>
                            <div class="txt-s text-center text-light">Create Quiz</div>
                        </a>
                    </div>
                    <!-- show weekly quizzess -->
                    @foreach($quizzes as $quiz)
                        <div class="border m-2 auto-expand bg-grey">
                            <form method='post' action="{{url('/')}}/quizzes/{{$quiz->id}}" id='frmdel{{$quiz->id}}'>
                                @csrf
                                @method('DELETE')
                            </form>
                            <div style='position:relative'>
                                <i class="flaticon-trash text-danger txt-10 hyper" style="position:absolute;top:0px;right:0px" onclick="del('{{$quiz->id}}')"></i>
                                <i class="flaticon-gear text-success txt-10 hyper" style="position:absolute;top:0px;right:15px"></i>
                            </div>
                            <div class='p-5'>
                                <a href="{{url('/')}}/quizdetail/{{$quiz->id}}" class='hyper'>
                                    <div class="txt-20 text-center">Week {{$quiz->weekNo}}</div>
                                    <div class="txt-10 text-center">{{$quiz->description}} <span class="badge badge-primary">{{$quiz->questions->count()}}</span></div>
                                    <div class="txt-10 text-center">@if($quiz->created_at)Dated {{$quiz->created_at->format('d/m/y')}} @endif </div>
                                </a>
                            </div>
                            
                        </div>
                    @endforeach
                </div>
                      
            </div>
        </div>
    </div>
@endsection

@section('script')
   <script>
      function del(quizId){
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
                       document.getElementById('frmdel'+quizId).submit();
                       
                     }

                  })
      }
   </script>
@endsection