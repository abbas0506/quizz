@extends("layout")
@section('header') 
   <div class="border-bottom text-center p-2 border-success bg-grey" id='header'>
      <div class="text-success txt-40"><i class="flaticon-write-letter"></i></div>
      <div>Your Quizzes </div>
   </div>
@endsection
@section('page')
    <div class="p-2 text-center"><button type="button" class="btn btn-info btn-lg text-light rounded-50" onclick="window.location.href='./quizzes/create'">+</button></div>
    <div class="flex-container-centered h-70">
       <div class="w-70 auto-expand">
        <div class="txt-b ml-2">How to use?</div>
            <div class="txt-10 ml-2">
                <ul>
                    <li><i class="flaticon-plus text-info"></i> Create new quiz </li>
                    <li><i class="flaticon-bar-chart text-primary txt-10"></i> Student performance analysis</li>
                    <li><i class="flaticon-gear text-success txt-10"></i> Edit quiz setting </li>
                    <li><i class="flaticon-cancel text-danger txt-8"></i> Remove quiz permanantly</li>
                </ul>   

            </div>

            <!-- finish button -->
            <div class="text-right p-2">
                <div id='finish' class='txt-10'> Click me to go back <button class="btn btn-primary btn-sm" onclick="window.location.href='./teachers'">Home</button></div>
            </div>
            <!-- display most recent subects on top -->
            @foreach($subjects as $subject)
            <div class="flex flex-col border mb-2">
                <div class="flex flex-row bg-grey p-2">   
                    <a href='#' data-toggle='collapse' data-target='#s{{$subject->id}}' role='button' aria-expanded="false" aria-controls="s{{$subject->id}}">
                        {{$subject->name}}
                    </a>
                    &nbsp &nbsp ({{$subject->quizzes->count()}})
                
                </div>
            
                <div class="flex flex-col collapse p-2" id='s{{$subject->id}}'>   
                    @foreach($subject->quizzes as $quiz)
                        <div class="flex flex-row">
                            <div class="w-10"></div>
                            <div class="w-45"> &#8226;  &nbsp <a href="./quizzes/{{$quiz->id}}">{{$quiz->description}} </a></div>
                            <div class="w-10 my-auto txt-10">({{$quiz->questions->count()}})</div>
                            <div class="w-20 my-auto txt-10">{{$quiz->created_at->format('d-m-Y')}}</div>
                            <div class="w-15">
                                <div class="flex flex-row justify-center">
                                    <div><a href="#" class="hyper" ><i class="flaticon-bar-chart text-primary txt-10"></i></a></div>
                                    &nbsp &nbsp
                                    <div><a href="#" class="hyper" ><i class="flaticon-gear text-success txt-10"></i></a></div>
                                    &nbsp &nbsp
                                    <div><i class="flaticon-cancel text-danger txt-8" onclick="del('{{$quiz->id}}')"></i></div>
                                </div>
                            </div>
                        </div>
                        
                    @endforeach
                </div>
            </div>                
            @endforeach
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
                  url:"./quizzes/"+id,
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