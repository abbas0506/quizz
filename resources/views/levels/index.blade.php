@extends("layout")
@section('header') 
   
   <div class="border-bottom text-center p-2 border-success bg-grey" id='header'>
      <div class="text-success txt-40"><i class="flaticon-open-magazine"></i></div>
      <div class="txt-b">Courses</div>
   </div>

@endsection

@section('page')
   <div class="p-2 text-center"><button type="button" class="btn btn-info btn-lg text-light rounded-50" data-toggle="modal" data-target="#createModal">+</button></div>
   <div class="flex-container-centered h-70 p-4">
      <div class="w-70 auto-expand">
         
         <div class="txt-b ml-2">How to use?</div>
         <div class="txt-10 ml-2">
            <ul>
               <li><i class="flaticon-plus text-info"></i> Create new level </li>
               <li><i class="flaticon-pencil text-success txt-10"></i> Edit level </li>
               <li><i class="flaticon-trash text-danger"></i> Delete level </li>
            </ul>   

         </div>

         <!-- footer -->
         <div class="text-right p-2">
            <div id='finish' class='txt-10'>After adding all levels, click on finsh button <button class="btn btn-danger btn-sm" onclick="window.location.href='./home'">Finish</button></div>
         </div>
         
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
         
         <!-- Table Header -->
         <div class="m-2 bg-primary text-light p-2">
         <div class="flex flex-row">
               <div class="w-60 txt-b my-auto">Course</div>
               <div class="w-30 txt-b my-auto text-center">Semesters</div>
               <div class="w-10 text-center"><i class="flaticon-menu text-success txt-10"></i></div>
         </div>
         </div>
         
         <!-- display most recent subects on top -->
         @foreach($levels as $level)
         <div class="m-2 bg-grey p-2">
            <!-- Table body -->
            <div class="flex flex-row">
               <div class="w-60 my-auto">{{$level->name}}</div>
               <div class="w-30 my-auto text-center">{{$level->numOfSemesters}}</div>
               <div class="w-10">
                  <div class="flex flex-row justify-space-around">
                     <div><a href="{{route('levels.edit', $level->id)}}" class="hyper" ><i class="flaticon-pencil text-success txt-10"></i></a></div>
                     <div onclick="del('{{$level->id}}')"><i class="flaticon-trash text-danger txt-10"></i></div>
                  </div>
               </div>
            </div> 
            
         </div>
         
         @endforeach
         
         
      </div>
      
   </div>

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
					<h4 class="modal-title">New level</h4>
					<button type="button" class="close" data-dismiss="modal">&times;</button>
				</div>

				<!-- modal body -->
				<div class="modal-body">
					<div class="container">
					   <form method="post" action="{{route('levels.store')}}">
						   @csrf
                     
                     <div class="txt-10 my-auto mb-2 mt-4">level Name</div>
                     <div class="mb-4"><input type="text" class="form-control" placeholder="level name" required id='name' name='name'></div>
                     
                     <div class="txt-10 my-auto mb-4">Number of total Semesters</div>
                     <div class="mb-4"><input type="number" class="form-control" placeholder="number of semesters" required name='numOfSemesters' min='1' max='8' value="4"></div>
                     
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
                  url:"./levels/"+id,
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