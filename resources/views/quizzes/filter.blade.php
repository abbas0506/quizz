@extends('layout')
@section('header') 
   <div class="border-bottom text-center p-2 border-success bg-grey" id='header'>
      <div class="text-success txt-40"><i class="flaticon-gear"></i></div>
      <div>Please provide following quiz info</div>
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
            <form action="../quizzes/storeFilter" method='post'>
               @csrf
               <label for="cboLevel">Select a level</label>
               <select name="levelId" id="levelId" name='levelId' class="form-control mb-2">
                  <option value="1">Part I</option>
                  <option value="2">Part II</option>
               </select>
               
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


         
