@extends("layout")
@section('page')
   <div class="flex-container-centered h-100 p-4">
      <div class="w-30 auto-expand">
         
         <!-- print errors, if any -->
            @if ($errors->any())
               <div class="alert alert-danger">
                  <ul>
                     @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                     @endforeach
                  </ul>
               </div>
            <br />
            @else
               
               @if($attempt->percentage()>=80)
                  <div class="border-bottom border-success mb-5"><h3> Genius!</h3></div>
                  <div class="alert alert-success"><i class='flaticon-like'></i> &nbsp You have scored {{$attempt->marks}} out of {{$attempt->total()}} &nbsp ({{$attempt->percentage()}}%)</div>
                  <div><a href='../students' class="btn btn-success">Proceed</a></div>
               @elseif($attempt->percentage()>=60)
                  <div class="border-bottom border-primary mb-5"><h3>Good!</h3></div>
                  <div class="alert alert-primary"><i class='flaticon-like'></i> &nbspYou have scored {{$attempt->marks}} out of {{$attempt->total()}} &nbsp ({{$attempt->percentage()}}%)</div>
                  <div><a href='../students' class="btn btn-primary">Proceed</a></div>
               @elseif($attempt->percentage()>=40)
                  <div class="border-bottom border-info mb-5"><h3>Satisfactory!</h3></div>
                  <div class="alert alert-info"><i class='flaticon-like'></i> &nbsp You have scored {{$attempt->marks}} out of {{$attempt->total()}} &nbsp ({{$attempt->percentage()}}%)</div>
                  <div><a href='../students' class="btn btn-info">Proceed</a></div>
               @else
                  <div class="border-bottom border-danger mb-5"><h3>Improve!</h3></div>
                  <div class="alert alert-danger">You have scored {{$attempt->marks}} out of {{$attempt->total()}} &nbsp ({{$attempt->percentage()}}%)</div>
                  <div><a href='../students' class="btn btn-danger">Proceed</a></div>
               @endif
               
            @endif
      </div>
   </div>
   @endsection
   