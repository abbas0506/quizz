@extends("layout")
@section('header') 
   
   <div class="border-bottom text-center p-2 border-success bg-grey" id='header'>
      <div class="text-success txt-30"><i class="flaticon-pencil"></i></div>
      <div>Edit Subejct</div>
   </div>

@endsection

@section('page')
   
   <div class="flex-container-centered h-80 p-4" id='quizDetail'>
      <div class="w-50 auto-expand">
         <div class="txt-b ml-2">How to use?</div>
         <div class="txt-10 ml-2">
            <ul>
               <li>Update button: save changes </li>
               <li>Cancel button: go back without changes</li>
               
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
               timer:2000
            });
         </script>
         @endif
         
         <form method="post" action="{{route('subjects.update',$subject->id)}}">
                     @csrf
                     @method('PUT')
						   <!-- Subejct name -->
                     <div class="txt-10 my-auto mb-4">Subject name</div>
                     <div class="mb-4"><input class="form-control" placeholder="Subejct name" required name='name' value="{{$subject->name}}"></div>
                     
                     <div class="text-right mb-2">
                        <a href="{{route('subjects.index')}}" class="btn btn-primary">Cancel</a>
                        <button type='submit' class="btn btn-success">Update</button>
                     </div>

                  </form>         
      </div>
      
   </div>

@endsection