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
         <!-- display most recent Subejct on top -->
         <form method="post" action="../subjects/{{$subject->id}}">
						   @csrf
						   <!-- Subejct name -->
                     <div class="txt-10 my-auto mb-4">Subject name</div>
                     <div class="mb-4"><input class="form-control" placeholder="Subejct name" required name='name' value="{{$subject->name}}"></div>
                     
                     <div class="text-right mb-2"><button type='submit' class="btn btn-success">Update</button></div>

                  </form>         
      </div>
      
   </div>

@endsection