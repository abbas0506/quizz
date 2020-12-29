@extends("layout")
@section('header') 
   @include("./my-components/header")
@endsection
@section('page')   
   <div class="flex-container-centered h-80 p-4">
      <div class="w-30 auto-expand">
         <div class="icon-top-center"><i class="flaticon-user text-success"></i></div>
         <form action="./usertype">
            @csrf
            <label for="usertype">I am a</label>
            <select name="usertype" id="usertype" class="form-control mb-4">
               <option value='student'>Student</option>
               <option value='teacher'>Teacher</option>
            </select>
               
            <button type='submit' class="form-control text-light bg-success">Next</button>
            
         </form>
      </div>
   </div>
   
@endsection


