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
         @elseif(session('failure'))
         <script>
            Swal.fire({
               icon: 'warning',
               text: "{{session('failure')}}",
               showConfirmButton: false,
               timer:3000
            });
         </script>
         @endif
         
         
         
         <div id="signup" class="border border-success bg-grey rounded">
            <div class="p-4 alert-success">  I am a 
               <a href='#frmSignupStudent' data-toggle='collapse'>
            student
               </a> |
               <a href='#frmSignupTeacher' data-toggle='collapse' >
            teacher
               </a>
            </div>
            
            <div class="collapse p-4" id='frmSignupStudent' data-parent='#signup'>
               <!-- signup student form -->
               <form method='post' action="./signup">
                  @csrf
                  <div class="border-bottom border-success mb-5"><h3>Sign Up</h3></div>
                  <!-- data entry fields -->
                  <input type="text" name='usertype' value="student" hidden>
                  <div class="mb-2">
                     <div class="txt-10">Your name</div>
                     <div>
                        <input type="text" class="form-control" name="name" value="" required placeholder="Name" autocomplete='off' pattern="[A-z ]+" oninvalid="invalidName(this);" oninput="invalidName(this);" autofocus>
                     </div>
                  </div>
                  <div class="mb-2">
                     <div class="txt-10">Phone (will be used for login purpose)</div>
                     <div>
                        <input type="text" class="form-control" name="phone" value="" required autocomplete="off" placeholder="Phone" pattern="03[0-9]{9}" oninvalid="invalidPhone(this);" oninput="invalidPhone(this);">
                     </div>
                  </div>

                  <div class="mb-2">
                     <div class="txt-10">Password</div>
                     <div>
                        <input type="password" class="form-control" name="password" required autocomplete="current-password" placeholder="Password">
                     </div>
                  </div>

                  <div class="mb-2">
                     <div class="txt-10">Course</div>
                     <div>
                     <select name="levelId" id="levelId" name='levelId' class="form-control mb-2">
                           @foreach($levels as $level)
                              <option value="{{$level->id}}">{{$level->name}}</option>
                           @endforeach
                        </select>
                     </div>
                  </div>
                  <div class="flex flex-row">
                  <div class="flex flex-col mb-2 w-50 pr-1">
                     <div class="txt-10">Semester No.</div>
                     <div>
                     <input type="number" name="semesterNo" value="1" class="form-control pl-3 mb-2" min="1" max="8" placeholder="Semester No." required>
                     </div>
                  </div>
                  
                  <div class="mb-2 w-50 flex-col pl-1">
                     <div class="txt-10">Roll No.</div>
                     <div>
                     <input type="number" name="rollNo" value="1" class="form-control pl-3 mb-4" min="1" max="100" placeholder="Roll No." required>
                     </div>
                  </div>
                  
                  </div>
                  
                  <div class="flex flex-row mb-4 justify-center">
                     <div class="w-70 text-right mt-auto"> Already a user, <a href='../signin'> cancel</a></div>
                     <div class="w-30 text-right ">
                        <button type="submit" class="btn btn-success">Submit</button>
                     </div>
                  </div>
                        
               </form>

            </div>
            
            <div class="collapse p-4" id='frmSignupTeacher' data-parent="#signup">
               <!-- teacher signup form -->
               <form method='post' action="./signup">
                  @csrf
                  <div class="border-bottom border-success mb-5"><h3>Sign Up</h3></div>
                  <input type="text" name='usertype' value="teacher" hidden>
                  <!-- data entry fields -->
                  <div class="flex flex-row mb-2">
                     <div class="w-20 text-center"><i class="flaticon-user strong"></i></div>
                     <div class="w-80">
                        <input type="text" class="form-control" name="name" value="" required placeholder="like Mr Ahmad" autocomplete='off' pattern="[A-z ]+" oninvalid="invalidName(this);" oninput="invalidName(this);" autofocus>
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
                     <div class="w-70 text-right mt-auto"> Already a user, <a href='../signin'> cancel</a></div>
                     <div class="w-30 text-right ">
                        <button type="submit" class="btn btn-success">Submit</button>
                     </div>
                  </div>
                        
               </form>
            </div>
         </div>
      <div>
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



