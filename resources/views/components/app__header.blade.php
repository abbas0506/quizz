<div class="app-header">
   <div class="responsive-show my-auto"><i class="flaticon-menu mr-2"></i></div>
   <div class="app-name">SoftQuizz</div>
   <div class="current-user">
      <span><i class="flaticon-bell"></i></span>
      <span class="badge-super">6</span>
      <span class="user-name" >Greetings, {{session('user')->profile->name}}</span>
      <img class='user-image auto-shrink' src="/images/teacher.jpg" alt="">
   </div>
</div>

<!-- <span id='element'
      data-container="body" data-toggle="popover" data-placement="bottom" 
      data-content="
      <div>Profile</div><div><a href='#'>Signout</a></div>" data-html="true">
      </span> -->