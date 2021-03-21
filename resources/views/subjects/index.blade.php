@extends("layout")
@section('page')
   <x-app__header/>
   <x-sidebar__teacher/>
   <div class='page-content'>
      <div class='flex flex-row p-3 txt-20 bg-light border rounded sticky'>
         <div class='mr-auto my-auto'>Subjects</div>
         <div data-toggle="modal" data-target="#createModal"><i class='flaticon-plus text-info txt-l'></i></div>
      </div>
      
      <!-- <div class='flex-container-center bg-light border rounded mt-5 p-3'>
         <div class="w-70 auto-expand"> -->
            
            @if ($errors->any())
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
            @endif
            
            <!-- display most recent subects on top -->
            @foreach($subjects as $subject)
            <div class="mt-2 bg-light border p-3 rounded">
               <!-- Table body -->
               <div class="flex flex-row">
                  <div class="my-auto mr-auto">{{$subject->name}}</div>
                  <div class='w-8'>
                     <div class="flex justify-space-around">
                        <div><a href="{{route('subjects.edit', $subject->id)}}" class="hyper" ><i class="flaticon-pencil text-success txt-10"></i></a></div>
                        <div onclick="del('{{$subject->id}}')"><i class="flaticon-trash text-danger txt-10"></i></div>
                     </div>
                  </div>
               </div>
               <div class="flex mt-2">
                  <div class='flex flex-col align-items-center w-20 '>
                     <div class='txt-s txt-teal'>Total</div>
                     <div>2000</div>
                  </div>
                  <div class='flex flex-col align-items-center w-20 '>
                     <div class='txt-s txt-teal'>Your Q.</div>
                     <div>2000</div>
                  </div>
                  <div class='flex flex-col align-items-center w-20 '>
                     <div class='txt-s txt-teal'>Quizzes</div>
                     <div>2000</div>
                  </div>
                  <div class='flex flex-col align-items-center w-20 '>
                     <div class='txt-s txt-teal'>Emrollment</div>
                     <div>2000</div>
                  </div>
                  
               </div> 
               
            </div>
            
            @endforeach
            
            
         </div>
         
      <!-- </div>
   </div> -->
@endsection
@section('modal')
   <!----------------------------------------------------------------------------
									create modal
	------------------------------------------------------------------------------>

	<div class="modal fade" id="createModal" role="dialog" >
		<div class="modal-dialog">
			<div class="modal-content">
				<!-- Modal Header -->
				<div class="modal-header">
					<h4 class="modal-title">New subject</h4>
					<button type="button" class="close" data-dismiss="modal">&times;</button>
				</div>

				<!-- modal body -->
				<div class="modal-body">
					<div class="container">
					   <form method="post" action="{{route('subjects.store')}}">
						   @csrf
                     
                     <div class="txt-10 my-auto mb-2 mt-4">Subject Name</div>
                     <div class="mb-4"><input type="text" class="form-control" placeholder="subject name" required id='name' name='name'></div>
                     
                     <div class="text-right mb-2"><button type='submit' class="btn btn-success">Submit</button></div>

                  </form>         
					</div>
				</div>
			</div>
		</div> 
   </div>
   
@endsection

@section('script')
   <script>
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