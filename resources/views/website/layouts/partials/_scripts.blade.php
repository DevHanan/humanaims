

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



  $(document).ready(function() {
    // check if there's a logged in user
    if(Laravel.userId) {
        $.get('/notifications', function (data) {
            addNotifications(data, "#notifications");
        });
    }

    function addNotifications(newNotifications, target) {
    notifications = _.concat(notifications, newNotifications);
    // show only last 5 notifications
    notifications.slice(0, 5);
    showNotifications(notifications, target);
}

function showNotifications(notifications, target) {
    if(notifications.length) {
        var htmlElements = notifications.map(function (notification) {
            return makeNotification(notification);
        });
        $(target + 'Menu').html(htmlElements.join(''));
        $(target).addClass('has-notifications')
    } else {
        $(target + 'Menu').html('<li class="dropdown-header">No notifications</li>');
        $(target).removeClass('has-notifications');
    }
}


function makeNotification(notification) {
    var to = routeNotification(notification);
    var notificationText = makeNotificationText(notification);
    return '<li><a href="' + to + '">' + notificationText + '</a></li>';
}

// get the notification route based on it's type
function routeNotification(notification) {
    var to = '?read=' + notification.id;
    if(notification.type === NOTIFICATION_TYPES.follow) {
        to = 'users' + to;
    }
    return '/' + to;
}

// get the notification text based on it's type
function makeNotificationText(notification) {
    var text = '';
    if(notification.type === NOTIFICATION_TYPES.follow) {
        const name = notification.data.follower_name;
        text += '<strong>' + name + '</strong> followed you';
    }
    return text;
}
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
