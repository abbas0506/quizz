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
               <div class="border-bottom border-danger mb-5"><h3>Some Error!</h3></div>
               <div class="alert alert-danger">Signup not successfull, contact admin</div>
               <div><a href='../' class="btn btn-danger">Ok</a></div>
            @endif
      </div>
   </div>
   @endsection
   