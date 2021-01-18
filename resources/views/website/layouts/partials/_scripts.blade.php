

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
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/limonte-sweetalert2/7.2.0/sweetalert2.min.css">
    <script src="https://cdnjs.cloudflare.com/ajax/libs/limonte-sweetalert2/7.2.0/sweetalert2.all.min.js"></script>

<script type="text/javascript">


     $(document).ready(function(){
         setInterval(function(){
            $.ajax({

           type:'GET',

           url:'/notifications',
           success:function(data){
              $('#notification_count').text(data.count);
              $('.notificationbody').empty();
              $('.notificationbody').html(data.notify);

           }

        });
                     
      }, 10000);
      });
 

$('document').ready(function(){

  $('.home-filter').click(function(){
      var category_id = $(this).data('id');
        $('#home_form').append("<input type='hidden' name='category_id'  value='" + category_id + "' />");    
        $('#home_form').submit();
});

  $('.doctor-filter').click(function(){
      var specialization_id = $(this).data('id');
        $('#doctor-form').append("<input type='hidden' name='specialization_id'  value='" + specialization_id + "' />");    
        $('#doctor-form').submit();
});

});

  $('document').ready(function() {  

     $("#txtMessage").on( "keypress", function(event) {
    if (event.which == 13 && !event.shiftKey) {
        event.preventDefault();
        $("#commentMessage").submit();
    }
    });

     $('#replaytxtMessage').on( "keypress", function(event) {
    if (event.which == 13 && !event.shiftKey) {
        event.preventDefault();
        $("#replayMessage").submit();
    }
    });

    $.ajaxSetup({

        headers: {

            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')

        }

    });


    $('.action-follow').click(function(){  

        var user_id = $(this).data('user');

        var cObj = $(this);

        var c = $(this).parent("div").find(".tl-follower").text();


        $.ajax({

           type:'POST',

           url:'/follow-unfollow',
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

    $('.rate_element').click(function(){

      var member_id = $(this).data('id');
      var rate = $(this).data('rate');
       $.ajax({

           type:'POST',

           url:'/rate',

           data:{member_id:member_id , rate:rate},

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

$(".subject-like").click(function () {
        var subject_id = $(this).data('id');
       $.ajax({

           type:'POST',

           url:'/like_subject',

           data:{subject_id:subject_id},

           success:function(data){

              $("#likeSubject"+ subject_id).text(data.likes);
              $('#likesubjecticon'+subject_id).toggleClass('active');


              }

           });

        });


  $(".subject-dislike").click(function () {
       var subject_id = $(this).data('subject');
       $.ajax({

           type:'POST',

           url:'/dislike_subject',

           data:{subject_id:subject_id},

           success:function(data){
              $("#dislikesubject"+ subject_id).text(data.dislikes);
              $('#dislikesubjecticon'+subject_id).toggleClass('active');
              }

           });

        });

$(".subject-fav-toggole").click(function(){
  var subject_id = $(this).data('id');
       $.ajax({

           type:'POST',

           url:'/favourite-unfavourite-subj',

           data:{subject_id:subject_id},

           success:function(data){
              $('#favsubjecticon'+subject_id).toggleClass('active');

           }
         });
});

  $(".subject-share").click(function () {
       var subject_id = $(this).data('id');
       $.ajax({

           type:'POST',

           url:'/share-subject',

           data:{subject_id:subject_id},

           success:function(data){
               swal({
  title: "Sweet!",
  text: data.msg,
  width: 300
});            }

           });

        });

  $('#chat_msg').click(function(){
    $.ajax({

           type:'GET',

           url:'/get-unread-msg',
           success:function(data){
            $('#chat_msg_boy').empty();
// Parse the returned json data
//var opts = $.parseJSON(data);//Remove comment if you are using JSON

// Use jQuery's each to iterate over the opts value
    // You will need to alter the below to get the right values from your data.
    $('#chat_msg_boy').append(data);

                  }

           });
  });

}); 

</script>
<!-- 
<link rel="stylesheet" href="{{ mix('css/app.css') }}" />
<script defer src="{{ mix('js/app.js') }}"></script> -->
