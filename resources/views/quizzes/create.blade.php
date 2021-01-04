@extends('layout')
@section('header') 
   <div class="border-bottom text-center p-2 border-success bg-grey" id='header'>
      <div class="text-success txt-40"><i class="flaticon-question"></i></div>
      <div>Create Quiz</div>
   </div>
@endsection
@section('page')
   <div class="flex-container-centered h-70">
         <div class="w-30 auto-expand">
            @if ($errors->any())
                <div class="alert alert-danger">
                    <ul>
                        @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                    </div>
                    <br />
            @endif
            <!-- the url ../student/quizdetail goes 2 steps back and append student/quizdetail  -->
            <form action="../quizzes" method='post'>
               @csrf
               
               <label for="description" class='txt-10'>Subject Name</label>
               <select name="subjectId" class='form-control mb-2' required>
                  <option value="">Select a subject</option>
                  @foreach($subjects as $subject)
                     <option value="{{$subject->id}}">{{$subject->name}}</option>
                  @endforeach
               </select>
               
               <label for="description" class='txt-10'>Quiz Desc. / Title</label>
               <input type="text" class='form-control mb-4' name='description' placeholder="Weekly test" value="">
               
               <button type="submit" class="form-control bg-success text-light">Create</button>
               
            </form>
         </div>
         
      </div>   
@endsection


         
