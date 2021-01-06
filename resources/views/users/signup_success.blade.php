@extends("layout")
@section('page')
   <div class="flex-container-centered h-100 p-4">
      <div class="w-30 auto-expand">
         
         <!-- print errors, if any -->
            @if ($errors->any())
               <div class="alert alert-danger">
                  <ul>
                     @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                     @endforeach
                  </ul>
               </div>
            <br />
            @else
               <div class="border-bottom border-success mb-5"><h3>Congratulation!</h3></div>
               <div class="alert alert-success">Successful signup</div>
               <div>
               @if(session('role')=='student')
                  <a href='./students' class="btn btn-success">Proceed</a>
               @elseif(session('role')=='teacher')
                  <a href='./teachers' class="btn btn-success">Proceed</a>
               @endif
               </div>
            @endif
      </div>
   </div>
   @endsection
   