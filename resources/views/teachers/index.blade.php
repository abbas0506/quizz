@extends("layout")
@section('page')
   <div class="dashboard">
      <div class="dashboard__header">
         <div class="app-name">SoftQuizz</div>
         <div class="current-user">
            <span><i class="flaticon-bell"></i></span>
            <span class="badge-super">6</span>
            <span class="user-name" >Greetings, teacher</span>
            <span id='element'
               data-container="body" data-toggle="popover" data-placement="bottom" 
               data-content="
               <div>Profile</div><div><a href='#'>Signout</a></div>" data-html="true">
               <img class='user-image' src="/images/teacher.jpg" alt="">
            </span>

         </div>
      </div>

      <div class="dashboard__menu" id='menu'>
         <div class="menu-item active"><div class="icon"><i class="flaticon-browser"></i></div><div class="icon-desc">Home</div></div>
         <div class="menu-item"><div class="icon"><i class="flaticon-open-magazine"></i></div><div class="icon-desc">Subjects</div></div>
         <div class="menu-item"><div class="icon"><i class="flaticon-group"></i></div><div class="icon-desc">Groups</div></div>
         <div class="menu-item"><div class="icon"><i class="flaticon-exam"></i></div><div class="icon-desc">Test</div></div>
         <div class="menu-item"><div class="icon"><i class="flaticon-bar-chart"></i></div><div class="icon-desc">Analysis</div></div>
      </div>
      
      
      
      
      
      
      
      <div class="flex-container-center h-80">
         <div>Hello it is my div</div>
      </div>






   </div>
@endsection
@section('script')
   <script lang="">

$('#element').popover('show')
      // $('.menu-item').mouseover(function(){
      //    $('#menu').addClass('dashboard__menu-expanded');
      //    if(!$(this).hasClass('active')){
      //       $(this).addClass('menu-active');
      //    }
            
         
      // });

      // $('.menu-item').mouseout(function(){
      //    $('#menu').removeClass('dashboard__menu-expanded');
      //    if(!$(this).hasClass('active')){

      //       $(this).removeClass('menu-active');
      //    }
      // });


   </script>

@endsection