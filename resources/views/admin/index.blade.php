@extends("layout")
@section('header') 
   
   <div class="border-bottom text-center p-2 border-success bg-grey" id='header'>
      <div class="text-success txt-40"><i class="flaticon-gear"></i></div>
      <div class="txt-b">Admin Panel</div>
   </div>

@endsection

@section('page')
   <div class="flex-container-centered h-70 p-4">
      <div class="w-70 auto-expand">
         <div class="txt-b ml-2">How to use?</div>
         <div class='ml-2 txt-10'>      
            <ol type="i">
               <li>Feed all courses (preferably short names)</li>
               <li>Feed all subjects (preferably short names)</li>
               <li>Create semester wise subject plan for each course</li>
            </ol>
         </div>

         <div class="flex flex-row flex-wrap justify-content-center">
            <!-- show subjects, levels and course plan links here -->
            <div class="p-5 border m-2 auto-expand bg-grey">
               <a href="./levels" class='hyper'>
                  <div class="text-center">Courses</div>
               </a>
            </div>
            <div class="p-5 border m-2 auto-expand bg-grey">
               <a href="./subjects" class='hyper'>
                  <div class="text-center">Subjects</div>
               </a>
            </div>

            <div class="p-5 border m-2 auto-expand bg-grey">
               <a href="./plans" class='hyper'>
                  <div class="text-center">Course Plan</div>
               </a>
            </div>
            <div class="p-5 border m-2 auto-expand bg-grey">
               <a href="#" class='hyper'>
                  <div class="text-center">Enrollment</div>
               </a>
            </div>
                    
         </div>
                
      </div>
      
   </div>

@endsection
