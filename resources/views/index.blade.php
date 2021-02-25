@extends("layout")
@section('page')
   
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
               <input type="text" name="phone" value="" required autocomplete="off" placeholder="Phone">
               <label>Phone</label>   
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
            <form method='post' action="./signup">
            @csrf
               <div class="border-bottom border-success mb-5" onclick="showSignupSuccessPage()"><h3><strong>Teacher Signup</strong></h3></div>
               
               <input type="text" name='usertype' value="teacher" hidden>
                  
               <div class="fancyinput-light mb-4">
                  <input type="text" name="name" value="" required placeholder="Name" autocomplete='off' pattern="[A-z ]+" oninvalid="invalidName(this);" oninput="invalidName(this);" autofocus>
                  <label>Your name</label>
               </div>
                  
               <div class="fancyinput-light mb-4">
                  <input type="text" name="phone" value="" required autocomplete="off" placeholder="Phone" pattern="03[0-9]{9}" oninvalid="invalidPhone(this);" oninput="invalidPhone(this);">
                  <label for="phone">Phone</label>
               </div>

               <div class="fancyinput-light mb-4">
                  <input type="password" name="password" required autocomplete="current-password" placeholder="Password">
                  <label for="Password">Password</label>
               </div>

               <div class="flex flex-row mb-4 justify-center">
                  <div class="w-100 text-right ">
                     <button type="submit" class="btn btn-secondary">Submit</button>
                  </div>
               </div>                       
            </form>
         </div>
            
         <!-- Student signup -->
         <div class="flex-col w-30 auto-expand" id='student-signup-form' style='display:none'>
            <form method='post' action="./signup">
            @csrf
               <div class="border-bottom border-success mb-5"><h3><strong>Student Signup</strong></h3></div>
                  
               <input type="text" name='usertype' value="student" hidden>
                  
               <div class="fancyinput-light mb-4">
                  <input type="text" name="name" value="" required placeholder="Name" autocomplete='off' pattern="[A-z ]+" oninvalid="invalidName(this);" oninput="invalidName(this);" autofocus>
                  <label>Your name</label>
               </div>
               <div class="fancyinput-light mb-4">
                  <input type="text" name="phone" value="" required autocomplete="off" placeholder="Phone" pattern="03[0-9]{9}" oninvalid="invalidPhone(this);" oninput="invalidPhone(this);">
                  <label for="phone">Phone</label>
               </div>

                  <div class="fancyinput-light mb-4">
                     <input type="password" name="password" required autocomplete="current-password" placeholder="Password">
                     <label for="Password">Password</label>
                     
                  </div>

                  <div class="fancyinput-light mb-4">
                     <select name="" id="selectCourse">
                        <option value="-1">Select Course</option>
                        <option value="0">0</option>
                        <option value="1">1</option>
                     </select>
                     <label for="">Course</label>
                  </div>
                  
                  <div class="flex flex-row mb-4">
                     <div class="fancyinput-light w-50 flex-col mb-2  pr-2">
                        <input type="number" name="semesterNo" value="" class="mb-2" min="1" max="8" placeholder="Semester" required>
                        <label for="Semester">Semester</label>
                     </div>
                     
                     <div class="fancyinput-light w-50 flex-col pl-2">
                        <input type="number" name="rollNo" value="" min="1" max="100" placeholder="Roll No." required>
                        <label for="rollNo">Roll No</label>
                     </div>
                     
                  </div>
                  
                  <div class="flex flex-row mb-4 justify-center">
                     <div class="w-100 text-right ">
                        <button type="submit" class="btn btn-secondary">Submit</button>
                     </div>
                  </div>
                        
               </form>

            </div>

            <!-- Signup Success Message -->
            <div class="flex-col w-50 auto-expand" id='signup-success-page' style='display:none'>
               
               <div class="text-teal txt-30 text-light">Congratulation! <span class="txt-12"> (successful signup) </span></div>
               <div class="p-2">
                  <div class="text-justify mb-2 txt-16">Thanks for joining us! We have a big question bank containing almost 1000+ questions from every major subject upto FSc level. Your experience will definitely add value to our existing database.</div>
                  <div class="text-right"><button class="btn btn-teal rounded-50" onclick="closeOverlayPage()">Ok, I understand</button></div>
            </div>

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
      
      $('#selectCourse').change(function(){
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
      function showSignupSuccessPage(){
         $('#signup-menu').hide();
         $('#student-signup-form').hide();
         $('#teacher-signup-form').hide();
         $('#signup-success-page').toggle('slow');
      }


   </script>

@endsection