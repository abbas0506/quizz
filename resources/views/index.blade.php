@extends("layout")
@section('page')
   <style>
      body {
         font-family: 'Nunito';
         opacity:0.75; 
         background-color:black;
      }

   </style>
   <div class="home__background"></div>
   <div class="home__page flex-container-center justify-space-arround auto-col">
      
      <!-- App mission -->
      <div class='flex flex-col w-60 auto-expand justify-center p-5'>
         <div class="app-name">Soft Quizz</div>
         <div class="app-desc">We wish to make our teacher's life full of comfort. Join us to adopt modern teaching where student assessment and performance analysis is under your single click.</div>
      </div>
      
      <!-- login section -->
      <div class='flex flex-row justify-center w-25 auto-expand' style="position:relative">
         <form method='post' class="w-80" action="./signin">
            @csrf
            <div class="fancyinput-dark mb-4">
               <input type="text" name="id" value="" required autocomplete="off" placeholder="User ID">
               <label>User ID</label>   
            </div>

            <div class="fancyinput-dark mb-4">
               <input type="password" name="password" value="" required autocomplete="off" placeholder="Password">
               <label>Password</label>
               <div class="error mt-2">{{session('error')}}</div>
            </div>
                  
            <div class="flex flex-row justify-end">
               <div class="w-70"><span class='btn btn-outline-info rounded-50' id="showOverlay">New user, signup</span></div>
               <div class="w-20" >
                  <button type="submit" class="btn btn-outline-success rounded-50">Login</button>
               </div>
            </div>
         </form>
      </div>


      <!-- Ovelay section containg 
      signup menu and signup forms -->
      
      <div class="flex-container-center overlay">
         <div class="close" onclick="closeOverlayPage()">X</div>
         <div class="flex-row" id='signup-menu'>
            <ul>
               <li onclick="showTeacherSignup()"><i class="flaticon-teacher"></i> &nbsp Signup as a teacher</li>
               <li onclick="showStudentSignup()"><i class="flaticon-user"></i> &nbsp Signup as a student</li>
            </ul>
         </div>
            
         <!-- teacher signup -->
         <div class="flex-col w-30 auto-expand" id='teacher-signup-form' style='display:none'> 
            <form method='post' action="./signup" onsubmit="validateTeacherSignup()">
               @csrf
               <div class="border-bottom border-success text-success mb-3" onclick="showSignupSuccessPage()"><h3><strong>Teacher Signup</strong></h3></div>
               <div class="text-light mb-3 text-center">* Phone No will be used as login ID</div>
               <input type="text" name='usertype' value="teacher" hidden>
               <div class="fancyinput-light mb-4">
                  <input type="text" name="name" value="" required placeholder="Name" autocomplete='off' pattern="[A-z ]+" autofocus>
                  <label>Your name</label>
               </div>
                  
               <div class="fancyinput-light mb-4">
                  <input type="text" name="phone" value="" required autocomplete="off" placeholder="Phone" pattern="0[0-9]{9,10}">
                  <label for="phone">Phone</label>
               </div>

               <div class="fancyinput-light mb-4">
                  <input type="email" name="email" value="" autocomplete="off" placeholder="Email">
                  <label for="email">Email</label>
               </div>

               <div class="fancyinput-light mb-4">
                  <input type="password" name="password" id="teacher_password" required autocomplete="current-password" placeholder="Password">
                  <label for="Password">Password</label>
               </div>
               <div class="fancyinput-light mb-4">
                  <input type="password" name="confirm" id="teacher_confirm" required autocomplete="current-password" placeholder="Confirm Password">
                  <label for="confirm">Confirm password</label>
               </div>

               <div class="flex flex-row mb-4 justify-center">
                  <div class="w-100 text-right ">
                     <button type="submit" class="btn btn-secondary rounded-50">Submit</button>
                  </div>
               </div>                       
            </form>
         </div>
            
         <!-- Student signup -->
         <div class="flex-col w-30 auto-expand" id='student-signup-form' style='display:none'>
            <form method='post' action="./signup" onsubmit="validateStudentSignup()">
               @csrf
               <div class="border-bottom border-success text-success mb-3"><h3><strong>Student Signup</strong></h3></div>
               <div class="text-light mb-3 text-center">* Phone No will be used as login ID</div>
               <input type="text" name='usertype' value="student" hidden>
                  
               <div class="fancyinput-light mb-4">
                  <input type="text" name="name" value="" required placeholder="Name" autocomplete='off' pattern="[A-z ]+" autofocus>
                  <label>Your name</label>
               </div>
               
               <div class="fancyinput-light mb-4">
                  <input type="text" name="phone" value="" required autocomplete="off" placeholder="Phone" pattern="0[0-9]{9,10}">
                  <label for="phone">Phone</label>
               </div>
               
               <div class="fancyinput-light mb-4">
                  <select name="grade_id" id="selectGrade">
                     <option value="-1">Select Grade</option>
                     @foreach($grades as $grade)
                     <option value='{{$grade->id}}'>{{$grade->name}}</option>
                     @endforeach
                  </select>
                  <label for="">Grade</label>
               </div>
               <div class="fancyinput-light mb-4">
                  <input type="password" name="password" id='student_password' required autocomplete="current-password" placeholder="Password">
                  <label for="Password">Password</label>
               </div>
                  
               <div class="fancyinput-light mb-4">
                  <input type="password" name="confirm" id='student_confirm' required autocomplete="current-password" placeholder="Confirm Password">
                  <label for="confirm">Confirm password</label>
               </div>
                  
               <div class="flex flex-row mb-4 justify-center">
                  <div class="w-100 text-right ">
                     <button type="submit" class="btn btn-secondary rounded-50">Submit</button>
                  </div>
               </div>
                        
            </form>

         </div>
      </div>
   </div>
@endsection
@section('script')
   <script lang="">
      $('#showOverlay').click(function(){
         $('.overlay').addClass('overlay-open');
      });
      
      function closeOverlayPage(){
         $('.overlay').removeClass('overlay-open');
         $('#student-signup-form').hide();
         $('#teacher-signup-form').hide();
         $('#signup-success-page').hide();
         $('#signup-menu').show();
      }
      
      $('#selectGrade').change(function(){
         if($(this).val()==-1)
            $(this).removeClass('selected');
         else
            $(this).addClass('selected');
      });
      
      function showStudentSignup(){
         $('#signup-menu').hide();
         $('#teacher-signup-form').hide();
         $('#signup-success-page').hide();
         $('#student-signup-form').toggle('slow');
      }
      function showTeacherSignup(){
         $('#signup-menu').hide();
         $('#student-signup-form').hide();
         $('#signup-success-page').hide();
         $('#teacher-signup-form').toggle('slow');
      }
      
      function validateTeacherSignup(){
         
         var password=$("#teacher_password").val();
         var confirm=$("#teacher_confirm").val();
         
         //if confirm password does not match
         if(password != confirm) {
            Toast.fire({
               icon: 'warning',
               title: 'Confirm password not matched',
            });
            event.preventDefault();
            
         }
      }

      function validateStudentSignup(){
         
         var password=$("#student_password").val();
         var confirm=$("#student_confirm").val();
         
         //if confirm password does not match
         if(password != confirm) {
            Toast.fire({
               icon: 'warning',
               title: 'Confirm password not matched',
            });
            event.preventDefault();
            
         }
      }
      
   </script>

@endsection