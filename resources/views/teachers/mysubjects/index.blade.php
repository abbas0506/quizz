@extends("layout")
@section('page')
   <x-app__header username="{{$teacher->name}}"/>
   <x-teachers__sidebar/>
   <div class='page-content'>
           
      <!-- display error msg if any -->
      @if ($errors->any())
      <div class='flex-container-center bg-light border rounded mt-5 p-3'>
         <div class="w-70 auto-expand">
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
                  timer:3000
               });
            </script>
            @elseif(session('error'))
            <script>
               Swal.fire({
                  icon: 'error',
                  text: "{{session('error')}}",
                  showConfirmButton: false,
                  timer:3000
               });
            </script>
         </div>
      </div>
      
      @endif
      <div id="ownedSubjects">
         <div class='flex flex-row p-3 txt-20 bg-light border rounded'>
            <div class='mr-auto my-auto'>Subjects</div>
            <div><i class='flaticon-plus text-info txt-l hyper' onclick="showOrHideOwnedSubjects()"></i></div>
         </div>
         <!-- display most recent subects on top -->
         @foreach($owned_subjects as $subject)
         <div class="mt-2 bg-light border p-3 rounded">
            <!-- Table body -->
            <div class="flex flex-row" >
               <div class="my-auto mr-auto"> 
                  <a href='#s-{{$subject->id}}' data-toggle='collapse'>{{$subject->name}}</a>
               </div>
               <div onclick="del('{{$subject->id}}')"><i class="flaticon-cancel text-danger txt-10"></i></div>
            </div>
                  
            <div class="flex-container-center mt-2 collapse justify-content-around" id='s-{{$subject->id}}' data-parent="#ownedSubjects">
               <div class='flex flex-col'>
                  <div class='txt-m txt-teal'><i class='flaticon-question'></i></div>
                  <div class="txt-s">2000</div>
               </div>
                     
               <div class='flex flex-col'>
                  <div class='txt-m txt-teal'><i class='flaticon-exam'></i></div>
                  <div class="txt-s">2000</div>
               </div>
               <div class='flex flex-col'>
                  <div class='txt-m txt-teal'><i class='flaticon-group'></i></div>
                  <div class="txt-s">2000</div>
               </div>
            </div> 
         </div>
         @endforeach
      </div>

      <!-- list of not owned subject -->
      <div id="notOwnedSubjects" class="hidden">
         <div class='flex flex-row p-3 txt-20 bg-light border rounded'>
            <div class='mr-auto my-auto'>Choose a subject</div>
            <div><i class='flaticon-cancel txt-grey hyper txt-m' onclick="showOrHideOwnedSubjects()"></i></div>
         </div>
         @foreach($notOwned_subjects as $subject)
         <div class="mt-2 border p-3 rounded hyper-dark" onclick="gotoSubjectQuestionsPage('{{$subject->id}}')">
            <div class="my-auto">{{$subject->name}}</div>
         </div>
         @endforeach
         
      </div>
   </div>
@endsection

@section('script')
   <script>
      function showOrHideOwnedSubjects(){
         
         $('#notOwnedSubjects').toggle();
         $('#ownedSubjects').toggle();
         
      }
      function gotoSubjectQuestionsPage(subjectId){
         alert(subjectId);
      }
      
      function del(id){
         var token = $("meta[name='csrf-token']").attr("content");
         
         //show sweet alert and confirm deletion
         Swal.fire({
            title: 'Are you sure?',
            text: "You won't be able to revert this!",
            icon: 'warning',
            showCancelButton: true,
            confirmButtonColor: '#3085d6',
            cancelButtonColor: '#d33',
            confirmButtonText: 'Yes, delete it!',
            closeOnConfirm: true,
            closeOnCancel: true
         }).then((result) => {   //if confirmed    
            if (result.value) {
               $.ajax({
                  type:'post',
                  url:"./subjects/"+id,
                  type: 'DELETE',
                  data: {
                     "id": id,
                     "_token": token,
                  },
                  success:function(response){
                     //
                     Toast.fire({
                     icon: 'success',
                     title: response.msg,
                  });
                  //refresh content after deletion
                  location.reload();
                  },
                  error: function(XMLHttpRequest, textStatus, errorThrown) {
                     Toast.fire({
                        icon: 'warning',
                        title: 'Some error',
                     });
                  }
               });   //ajax end
            }
         })
      }
   </script>
@endsection