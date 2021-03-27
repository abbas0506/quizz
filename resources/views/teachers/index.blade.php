@extends("layout")
@section('page')
   <div class='w-100 h-100'>
      <x-app__header/>
      <x-teachers__sidebar/>
      <div class='page-content'>
         <div class='p-3 txt-20 bg-light border rounded'>Profile</div>
         <div class='flex-container-center bg-light border rounded mt-5 p-3 has-relative-icon auto-col'>
            <i class="flaticon-pencil top-right txt-m txt-teal"></i>
            
            <div class="flex flex-row w-30 auto-expand justify-center">
               <img src="/images/teacher.jpg" alt="" class="rounded-circle img-l auto-shrink">
            </div>
               
               <div class='flex flex-col w-70 auto-expand'>
                  
                     <div class='lbl-s txt-teal'>Name</div>
                     <div class='txt-m mb-2' >Muhammad Abbas</div>
                     <div class='lbl-s'>Designation</div>
                     <div class='txt-m mb-2' >Subject Specialist</div>
                     <div class='lbl-s'>Phone</div>
                     <div class='txt-m mb-2' >03424930066</div>
                     <div class='lbl-s'>Email</div>
                     <div class='txt-m mb-2' >abbas.sscs@gmail.com</div>
                     <div class='lbl-s'>Address</div>
                     <div class='txt-m mb-2' >Govt. Higher Secondary School Chak Bedi, Pakpattan</div>
                  
               </div>
            
            </div>
               
      </div>
      
   </div>
@endsection
