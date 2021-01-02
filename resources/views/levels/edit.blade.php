@extends("layout")
@section('header') 
   
   <div class="border-bottom text-center p-2 border-success bg-grey" id='header'>
      <div class="text-success txt-30"><i class="flaticon-pencil"></i></div>
      <div>Edit Level</div>
   </div>

@endsection

@section('page')
      
   <div class="flex-container-centered h-80 p-4">
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
         @php
           
         @endphp
         <!-- display most recent Subejct on top -->
         <form method="post" action="{{route('levels.update', $level->id)}}">
                     @csrf
                     @method('PUT')
						   <!-- Subejct name -->
                     <div class="txt-10 my-auto mb-4">Level name</div>
                     <div class="mb-4"><input class="form-control" placeholder="Level name" required name='name' value="{{$level->name}}"></div>
                     
                     <div class="txt-10 my-auto mb-4">Number of total Semesters</div>
                     <div class="mb-4"><input type="number" class="form-control" placeholder="number of semesters" required name='numOfSemesters' min='1' max='8' value="{{$level->numOfSemesters}}" readonly></div>
                     <div class="text-right mb-2">
                        <a href="{{route('levels.index')}}" class="btn btn-primary">Cancel</a>
                        <button type='submit' class="btn btn-success">Update</button>
                     </div>

                  </form>         
      </div>
      
   </div>

@endsection