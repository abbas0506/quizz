@php 
   $teacher=session('user')->profile
@endphp

@extends("layout")
@section('page')

   <x-app__header/>
   <x-teachers__sidebar/>
   <div class='page-content'>
      <div>
         <div class='flex flex-row p-1'>
            <div class='mr-auto my-auto txt-ml'>Question Bank</div>
            <div class="txt-s my-auto"><input type='checkbox' onchange="toggleView()"> &nbsp View All</div>
         </div>
         <div class="flex txt-s pl-1 mb-5 text-primary"><i class="flaticon-idea"></i> &nbsp Click on any subject to proceed</div>
         <!-- list of contribution subjects-->
         @foreach($teacher->contribution_subjects() as $subject)
            @php
               $widthPercent= $subject->myquestions()->count()/$subject->questions()->count()*100;  
            @endphp
         <div class="mt-2 bg-light border p-3 rounded hyper" onclick="listChapters('{{$subject->id}}')">
            <div class="flex flex-row" >
               <div class="my-auto mr-auto">{{$subject->name}}</div>
               <div class="progress w-25 my-auto"><div class="progress-bar" style="width:{{$widthPercent}}%" role="progressbar">{{$widthPercent}}</div></div>
               <div class="">{{$subject->myquestions()->count()}}/{{$subject->questions()->count()}}</div>
            </div>
         </div>
         @endforeach
      </div>

      <!-- list of no contribution subject -->
      <div id="noContributionSubjects" class="hidden">
         @foreach($teacher->nocontribution_subjects() as $subject)
         <div class="mt-2 bg-light border p-3 rounded hyper" onclick="listChapters('{{$subject->id}}')">
            <div class="flex flex-row" >
               <div class="my-auto mr-auto">{{$subject->name}}</div>
               <div class="txt-s my-auto">No contribution</div>
            </div>
         </div>
         @endforeach
         <!-- form to hold selected subject -->
         <form method='post' action="listChapters">
            @csrf
            <input type="text" value="" name="subject_id" id='subjectId' hidden>
         </form>
         
      </div>
   </div>

@endsection

@section('script')
   <script>
      function toggleView(){
         $('#noContributionSubjects').toggle();
      }
      function listChapters(sbj){
         $('#subjectId').val(sbj);
         $('form').submit();

      }
   </script>
@endsection