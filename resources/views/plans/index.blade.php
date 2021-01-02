@extends("layout")
@section('header') 
   
   <div class="border-bottom text-center p-2 border-success bg-grey" id='header'>
      <div class="text-success txt-40"><i class="flaticon-gear"></i></div>
      <div class="txt-b">Courses Plan</div>
   </div>

@endsection

@section('page')
   <div class="flex-container-centered h-70 p-4">
      <div class="w-70 auto-expand">
         
         <div class="txt-b ml-2">Instructions:</div>
         <div class="txt-10 ml-2">
            <ul>
               <li><i class="flaticon-plus text-info"></i> Allocate subjects to semester</li>
               <li><i class="flaticon-cancel text-danger txt-8"></i> De-allocate subject </li>
            </ul>   

         </div>

         @php
            $subjectId=session('subjectId');
         @endphp
         <!-- footer -->
         <div class="text-right p-2">
            <div id='finish' class='txt-10'>After finalizing course plan, click on finsh button. <button class="btn btn-danger btn-sm" onclick="window.location.href='#'">Finish</button></div>
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
         
         <!-- display levels and semester wiese subjects  -->
         @foreach($levels as $level)
         <div class="m-2 border">
            <!-- display level name -->
            <div class="flex flex-row bg-grey mb-2">
               <div class="w-100 txt-b p-2">{{$level->name}}</div>
            </div>
            
            <!-- display semesters at this level -->
            @for($i=1; $i<=$level->numOfSemesters;$i++)
            <div class="flex flex-row mb-2">   
               <div class="w-10"></div>   
               <div class="w-80">
                  <a href='{{$level->id}}-{{$i}}' data-toggle='collapse' data-target='#L{{$level->id}}-{{$i}}' role='button' aria-expanded="false" aria-controls="{{$level->name}}-{{$i}}">
                     Semester {{$i}}
                  </a>
                  &nbsp &nbsp ({{$level->plans($i)->count()}})
               </div>
               <div class="w-10 text-center"><i class="flaticon-plus text-success" onclick="showCreateModel('{{$level->id}}','{{$i}}')"></i></div>
            </div>
            
            <div class="flex flex-col mb-2 collapse border-bottom" id='L{{$level->id}}-{{$i}}'>   
               @foreach($level->plans($i) as $plan)
                  <div class="flex flex-row mb-1">
                     
                     <div class="w-20"></div>
                     <div class="w-50"> &#8226;  &nbsp {{$plan->subject->name}} </div>
                     <div class='w-30'> <i class="flaticon-cancel text-danger txt-10" onclick="del('{{$plan->id}}')"></i></div>
                  </div>
                  
               @endforeach
            </div>
            @endfor  
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
					<h4 class="modal-title">List of Subject</h4>
					<button type="button" class="close" data-dismiss="modal">&times;</button>
				</div>

				<!-- modal body -->
				<div class="modal-body">
					<div class="container">
                  <!-- list of unplanned subjects -->
                  <div class=" flex flex-col mb-4 mt-4" id='unplannedSubjectsList'></div>
                  <div class="text-right mb-2"><button class="btn btn-success" onclick="createPlan()">Submit</button></div>
                  
                  <form method="post" action="./plans" id='frmCreatePlan'>
                     @csrf
                     <input type='text' id='levelId' name='levelId' value='' hidden required>
                     <input type='text' id='semesterNo' name='semesterNo' value='' hidden required>
                     <input type='text' id='subjectIds' name='subjectIds' value='' hidden required>
                  </form>
                     
                        
					</div>
				</div>
			</div>
		</div> 
	</div>
	
@endsection

@section('script')
   <script>
      function showCreateModel(levelId, semesterNo){
         $('#levelId').val(levelId);
         $('#semesterNo').val(semesterNo);
         
         //fetch list of unplanned subjects
         $.ajax({
            type:'get',
            url:"./plans/"+levelId,   //two folder back
            data:{
               levelId:levelId,
            },
            success:function(response){
               //
               $('#unplannedSubjectsList').html(response.msg);
            },
            error: function(XMLHttpRequest, textStatus, errorThrown) {
               Toast.fire({
                  icon: 'warning',
                  title: 'Some error',
               });
            }
         });
                
         $('#createModal').modal('show');
      }
            
      function createPlan(){
         //get all dynamically loaded nodes containing subjects checkboxes
         var nodes=document.getElementById('unplannedSubjectsList');
         var subjectIds=[];
         //get ids of checked subjects
         for(i=0; i<nodes.children.length;i++){
            if(nodes.children[i].children[0].firstChild.checked)
               subjectIds.push(nodes.children[i].children[0].firstChild.value)
         }

         $('#subjectIds').val(subjectIds);
         
         // use ajax to add subjects to semester plan
         
         $('#frmCreatePlan').submit();

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
                  url:"./plans/"+id,
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