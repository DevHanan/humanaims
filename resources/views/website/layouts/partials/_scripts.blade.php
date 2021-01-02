

<script src="{{asset('assets/website/js/libs/jquery-3.5.1.min.js')}}"></script>
  <script src="{{asset('assets/website/js/libs/bootstrap.min.js')}}"></script>
  <script src="{{asset('assets/website/js/libs/video.min.js')}}"></script>
  <!-- Start Emojy -->
  <script src="{{asset('assets/website/lib/js/config.js')}}"></script>
  <script src="{{asset('assets/website/lib/js/util.js')}}"></script>
  <script src="{{asset('assets/website/lib/js/jquery.emojiarea.js')}}"></script>
  <script src="{{asset('assets/website/lib/js/emoji-picker.js')}}"></script>
  <!-- End Emojy -->
  <script src="{{asset('assets/website/js/main.js')}}"></script>
<!--   <script defer src="{{ mix('js/app.js') }}"></script>
 -->
    <script src="https://js.pusher.com/7.0/pusher.min.js"></script>
    <script src="{{ asset('/vendor/laravelLikeComment/js/script.js') }}" type="text/javascript"></script>

<script type="text/javascript">
  $('document').ready(function() {     


    $.ajaxSetup({

        headers: {

            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')

        }

    });


    $('.action-follow').click(function(){  

        var user_id = $(this).data('id');

        var cObj = $(this);

        var c = $(this).parent("div").find(".tl-follower").text();


        $.ajax({

           type:'POST',

           url:'/ajaxRequest',

           data:{user_id:user_id},

           success:function(data){

              console.log(data.success);

              if(jQuery.isEmptyObject(data.success.attached)){

                cObj.find("strong").text("Follow");

                cObj.parent("div").find(".tl-follower").text(parseInt(c)-1);

              }else{

                cObj.find("strong").text("UnFollow");

                cObj.parent("div").find(".tl-follower").text(parseInt(c)+1);

              }

           }

        });

    });   

    $(".homeContentTop .post .icons i:not(:last-of-type)").click(function () {
       var subject_id = $(this).data('id');
       $.ajax({

           type:'POST',

           url:'/favourite-unfavourite-subj',

           data:{subject_id:subject_id},

           success:function(data){

              console.log(data.success);

              }

           });

        });
   
$('.view-subject').click(function(){  

        var subject_id = $(this).data('id');

        var cObj = $(this);

        var c = $(this).parent("div").find(".tl-follower").text();


        $.ajax({

           type:'POST',

           url:'/subject-increment-view',

           data:{subject_id:subject_id},

           success:function(data){

              console.log(data.success);
           }

        });

    });

$(".subject-likedislike").click(function () {
       var subject_id = $(this).data('id');
      var type = $(this).data('type');

       $.ajax({

           type:'POST',

           url:'/save-likedislike',

           data:{subject_id:subject_id,type:type},

           success:function(data){

              console.log(data.success);

              }

           });

        });


}); 
</script>
<!-- 
<link rel="stylesheet" href="{{ mix('css/app.css') }}" />
<script defer src="{{ mix('js/app.js') }}"></script> -->
