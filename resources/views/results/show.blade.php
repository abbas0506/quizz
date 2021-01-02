@extends("layout")
@php
   $percent=$obtained/$total*100;
   
@endphp

@section('header') 
   <div class="border-bottom text-center p-2 border-success bg-grey" id='header'>
      <div class="text-success txt-40"><i class="flaticon-bar-chart"></i></div>
      <div class="txt-b">Test Result</div>
      
   </div>
@endsection

@section('page')
   <div class="flex-container-centered h-70">
      <div class="text-center txt-b rounded">
         @if($percent>=40)
            <div class="text-success txt-40"><i class="flaticon-like"></i></div>
         @else
            <div class="text-success txt-40"><i class="flaticon-dislike"></i></div>
         @endif
         <div class="p-2 text-warning txt-30 bg-success rounded-50">{{$obtained}} / {{$total}}</div>
         <div class="txt- txt-20 mt-5">{{$percent}} %</div>
         <div class="p-2 mt-5"><a href="../" class="text-primary">Click here to go back</a></div>
      </div>
   </div>
@endsection