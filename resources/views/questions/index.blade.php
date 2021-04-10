@extends("layout")
@section('page')
   <x-app__header/>
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
      
      @if(isset($chapter))
      @php 
         $subject=$chapter->subject; 
         $shortQs=$chapter->questions->where('type',1);
         $longQs=$chapter->questions->where('type',2);
         $MCQs=$chapter->questions->where('type',3);
      @endphp
      <div class="flex mb-2 txt-l">{{$subject->name}}</div>
         <div id="ownedSubjects">
            <div class='flex bg-light border rounded auto-col'>
               <div class='flex w-60 my-auto auto-expand'>
                  <select class="form-control border-0" onchange="listQuestions()">
                     @foreach($subject->chapters as $ch)
                     <option value="{{$ch->id}}" @if($chapter->id==$ch->id) selected @endif>{{$ch->name}}</option>
                     @endforeach
                  </select>
                  </div>
                  <div class="flex flex-row ml-2 txt-xl mr-auto mx-auto">
                     <div class="text-center"><i class='flaticon-plus text-success hyper'></i></div>
                     <div class="text-center txt-s text-success my-auto"> &nbsp Add new Question</div>
                  </div>
               
               <div class="flex mx-auto">
                  <div class="menu-hz active my-auto" onclick="showShortOnly()">Short <span class="badge txt-s">{{$shortQs->count()}}</span></div>
                  <div class="menu-hz my-auto" onclick="showLongOnly()">Long<span class="badge txt-s">{{$longQs->count()}}</span></div>
                  <div class="menu-hz my-auto" onclick="showMCQsOnly()">MCQs<span class="badge txt-s">{{$MCQs->count()}}</span></div>
               </div>
            
         </div>

         <form method='post' action="listQuestions">
            @csrf
            <input type="text" name='chapter_id' id='chapter_id' hidden>
            <input type="text" name="type" value="1" hidden>
         </form>
         
         <!-- SHORT QUESTIONS  -->
         <div id='shortQs'>
            @foreach($shortQs as $question)
            <div class="mt-2 bg-light border p-3 rounded">
               <!-- question statement -->
               <div class="flex flex-row" >
                  <div class="flex rotate"><a href='#s1' data-toggle='collapse' class="hyper"><i class="flaticon-arrow"></i></a></div>
                  <div class="flex mx-2 mr-auto">{{$question->question}}</div>
                  <div class='mr-2 ml-2' onclick="del('')"><i class="flaticon-pencil text-success txt-10"></i></div>
                  <div onclick="del('')"><i class="flaticon-cancel text-danger txt-10"></i></div>
               </div>
                     
               <div class="flex-container-center mt-2 collapse justify-content-around" id='s1' data-parent="#ownedSubjects">
                  <div class='flex flex-col'>
                     <div class='txt-m txt-teal'><i class='flaticon-question'></i></div>
                     <div class="txt-s">2000</div>
                  </div>
               </div> 
            </div>
            @endforeach
         </div>   <!-- short questions ends here -->

         <!-- LONG QUESTIONS -->
         <div id='longQs' class="hidden">
            @foreach($longQs as $question)
            <div class="mt-2 bg-light border p-3 rounded">
               <!-- question statement -->
               <div class="flex flex-row" >
                  <div class="flex rotate"><a href='#s1' data-toggle='collapse' class="hyper"><i class="flaticon-arrow"></i></a></div>
                  <div class="flex mx-2 mr-auto">{{$question->question}}</div>
                  <div class='mr-2 ml-2' onclick="del('')"><i class="flaticon-pencil text-success txt-10"></i></div>
                  <div onclick="del('')"><i class="flaticon-cancel text-danger txt-10"></i></div>
               </div>
                     
               <div class="flex-container-center mt-2 collapse justify-content-around" id='s1' data-parent="#ownedSubjects">
                  <div class='flex flex-col'>
                     <div class='txt-m txt-teal'><i class='flaticon-question'></i></div>
                     <div class="txt-s">2000</div>
                  </div>
               </div> 
            </div>
            @endforeach
         </div>   <!-- long questions ends here -->

         <!-- MCQs -->
         <div id='MCQs' class="hidden">
            @foreach($MCQs as $question)
            <div class="mt-2 bg-light border p-3 rounded">
               <!-- question statement -->
               <div class="flex flex-row" >
                  <div class="flex rotate"><a href='#s1' data-toggle='collapse' class="hyper"><i class="flaticon-arrow"></i></a></div>
                  <div class="flex mx-2 mr-auto">{{$question->question}}</div>
                  <div class='mr-2 ml-2' onclick="del('')"><i class="flaticon-pencil text-success txt-10"></i></div>
                  <div onclick="del('')"><i class="flaticon-cancel text-danger txt-10"></i></div>
               </div>
                     
               <div class="flex-container-center mt-2 collapse justify-content-around" id='s1' data-parent="#ownedSubjects">
                  <div class='flex flex-col'>
                     <div class='txt-m txt-teal'><i class='flaticon-question'></i></div>
                     <div class="txt-s">2000</div>
                  </div>
               </div> 
            </div>
            @endforeach
         </div>   <!-- mcqs questions ends here -->

      </div>
      @else
               No chapter selected
      @endif
      
      
@endsection

@section('script')
   <script>

      function listQuestions(){
         $('#chapter_id').val(event.target.value);
         $('form').submit()
      }
      
      function showShortOnly(){
         $('#shortQs').show();
         $('#longQs').hide();
         $('#MCQs').hide();

      }
      function showLongOnly(){
         $('#shortQs').hide();
         $('#longQs').show();
         $('#MCQs').hide();

      }
      function showMCQsOnly(){
         $('#shortQs').hide();
         $('#longQs').hide();
         $('#MCQs').show();

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
      $('.menu-hz').click(function(){
         
         //foreach
         $('.menu-hz').each(function(){
            $(this).removeClass('active');
         });
         
            $(this).addClass('active');
      })

      $('.rotate').click(function(){
        $(this).toggleClass('rotated');
      })
     
   </script>
@endsection