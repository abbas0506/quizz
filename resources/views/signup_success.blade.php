@extends("layout")
@section('page')
   <div class="home__background"></div>
   <div class="home__page flex-container-center justify-space-arround auto-col">
      <div class="w-50 auto-expand">
         
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
               <div class="border-bottom border-success mb-5 txt-teal txt-b"><h3>Congratulation!</h3></div>
               <div>
                  @if(session('role')=='student')
                     <div class="alert alert-success text-justify">Welcome! We have a big question bank containing almost 1000+ questions from every major subject upto FSc level. Certainly, you will gain amazing experience here.</div>
                     <a href='./students' class="btn btn-success rounded-50">Ok, I understand</a>
                  @elseif(session('role')=='teacher')
                     <div class="alert alert-success text-justify">Thanks for joining us! We have a big question bank containing almost 1000+ questions from every major subject upto FSc level. Your experience will definitely add value to our existing database.</div>
                     <div class="text-right"><a href='./teachers' class="btn btn-success rounded-50">Ok, I understand</a></div>
                  @endif
               </div>
            @endif
      </div>
   </div>
   @endsection
   