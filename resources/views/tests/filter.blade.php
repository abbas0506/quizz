@extends('layout')
@section('header') 
   <div class="border-bottom text-center p-2 border-success bg-grey" id='header'>
      <div class="text-success txt-40"><i class="flaticon-gear"></i></div>
      <div>Please provide following info before you start</div>
   </div>
@endsection
@section('page')
   <div class="flex-container-centered h-80">
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
               <label for="cboLevel">Your name</label>
               <input name="sname" id="sname" class="form-control mb-2" placeholder="Your name" required>
               
               <label for="cboLevel">Select a level</label>
               <select name="levelId" id="levelId" name='levelId' class="form-control mb-2">
                  <option value="1">Part I</option>
                  <option value="2">Part II</option>
               </select>
               <label for="rollNo">Roll No</label>
               <input type="number" name="rollNo" value="1" class="form-control pl-3 mb-2" min="1" max="70" placeholder="Roll No." required>
               
               <label for="weekNo">Select a week</label>
               <select name="weekNo" id="weekNo" class="form-control mb-4">
                  @for($i=1;$i<=6;$i++)
                     <option value="{{$i}}">{{$i}}</option>
                  @endfor
               </select>
               
               <button type="submit" class="form-control bg-success text-light">Next</button>
               
            </form>
         </div>
         
      </div>   
@endsection


         
