@extends('layout')
@section('header') 
   <div class="border-bottom text-center p-2 border-success bg-grey" id='header'>
      <div class="text-success txt-40"><i class="flaticon-man"></i></div>
      <div class="txt-b">We need following info before you start test.</div>
   </div>
@endsection
@section('page')
   <div class="flex-container-centered h-80 p-4">
         <div class="w-30 auto-expand ">
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
            <form action="{{url('/')}}/tests" method='post'>
               @csrf
               <label for="cboLevel">Your Name</label>
               <input name="sname" id="sname" class="form-control mb-2" placeholder="Your name" required>
               
               <label for="cboLevel">Course</label>
               <select name="levelId" id="levelId" name='levelId' class="form-control mb-2">
                  @foreach(session('levels') as $level)
                     <option value="{{$level->id}}">{{$level->name}}</option>
                  @endforeach
               </select>
               <label for="cboLevel">Semester</label>
               <input type="number" name="semesterNo" value="1" class="form-control pl-3 mb-2" min="1" max="8" placeholder="Semester No." required>
               
               <label for="rollNo">Roll No</label>
               <input type="number" name="rollNo" value="1" class="form-control pl-3 mb-4" min="1" max="100" placeholder="Roll No." required>
               
               <button type="submit" class="form-control bg-success text-light">Next</button>
               
            </form>
         </div>
         
      </div>   
@endsection


         
