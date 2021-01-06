@extends("layout")
@section('page')
   <div class="flex-container-centered h-100 p-4">
      <div class="w-30 auto-expand">
         <form method='post' action="./signin">
            @csrf
            <div class="border-bottom border-success mb-5"><h3>Login</h3></div>
            <div class="flex flex-row mb-2">
               <div class="w-20 text-center my-auto"><i class="flaticon-user strong"></i></div>
               <div class="w-80">
                  <input type="text" class="form-control" name="phone" value="" required autocomplete="off" placeholder="Phone" autofocus>
               </div>
            </div>
            <div class="flex flex-row mb-4">
               <div class="w-20 text-center my-auto" style="transform: scaleX(-1)"><i class="flaticon-key strong"></i></div>
               <div class="w-80">
                  <div><input type="password" class="form-control" name="password" required autocomplete="current-password" placeholder="Password"></div>
                  <div class="text-danger">{{session('error')}}</div>
               </div>
            </div>
            <div class="flex flex-row mb-4 justify-end">
               <div class="text-right ">
                  <button type="submit" class="btn btn-success">Submit</button>
               </div>
            </div>
                  
         </form>
      </div>
   </div>
   @endsection



