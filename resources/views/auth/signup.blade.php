@extends("layout")
@section('page')
   <div class="flex-container-centered h-100">
      <div class="w-30 auto-expand">
         <!-- signup form -->
         <form method='post' action="./signup">
            @csrf
            <div class="border-bottom border-success mb-5"><h3>Sign Up</h3></div>
            
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
            @endif

            <!-- data entry fields -->
            <div class="flex flex-row mb-2">
               <div class="w-20 text-center"><i class="flaticon-user strong"></i></div>
               <div class="w-80">
                  <input type="text" class="form-control" name="name" value="" required placeholder="Name" autocomplete='off' pattern="[A-z ]+" oninvalid="invalidName(this);" oninput="invalidName(this);" autofocus>
               </div>
            </div>
            
            <div class="flex flex-row mb-2">
               <div class="w-20 text-center my-auto"><i class="flaticon-telephone strong"></i></div>
               <div class="w-80">
                  <input type="text" class="form-control" name="phone" value="" required autocomplete="off" placeholder="Phone" pattern="03[0-9]{9}" oninvalid="invalidPhone(this);" oninput="invalidPhone(this);">
               </div>
            </div>
            <div class="flex flex-row mb-4">
               <div class="w-20 text-center my-auto" style="transform: scaleX(-1)"><i class="flaticon-key strong"></i></div>
               <div class="w-80">
                  <div><input type="password" class="form-control" name="password" required autocomplete="current-password" placeholder="Password"></div>
                  <div class="text-danger txt-10">{{session('error')}}</div>
               </div>
            </div>
            <div class="flex flex-row mb-4 justify-center">
               <div class="w-70 text-right mt-auto"> Already a user, <a href='./'> cancel</a></div>
               <div class="w-30 text-right ">
                  <button type="submit" class="btn btn-success">Submit</button>
               </div>
            </div>
                  
         </form>
      </div>
   </div>
   @endsection
   @section('script')
      <script>
         function invalidName(textbox) {
    
            if(textbox.validity.patternMismatch){
               textbox.setCustomValidity('Use alphabets only');
            }    
            else {
               textbox.setCustomValidity('');
            }
            return true;
         }

         function invalidPhone(textbox) {
    
         if(textbox.validity.patternMismatch){
            textbox.setCustomValidity('e.g. 03001234567');
         }    
         else {
            textbox.setCustomValidity('');
         }
         return true;
      }
      </script>

   @endsection



