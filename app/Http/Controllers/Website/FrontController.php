<?php

namespace App\Http\Controllers\Website;

use App\Events\SubjectLike;
use App\Events\FavoriteSubject;
use App\Http\Controllers\Controller;
use App\Providers\RouteServiceProvider;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use App\Notifications\LikeSubjectToOwnerNotify;
use Laravel\Socialite\Facades\Socialite;
use Illuminate\Http\Request;
use App\Notifications\MemberFollowed;
use App\Models\Member;
use App\Models\Subject;
use App\Models\UserFollow;
use App\Models\Favorite;
use App\Models\SubjectView;
use App\Models\LikeDislike;
use App\Models\Comment;
use App\Models\Message;
use App\Models\Notification;

use Auth;
use DB;
class FrontController extends Controller
{

  public function getUnreadMsg(){
    $html = "";
    // $unread = Message::where('to_id',Auth::id())->where('seen','0')->latest()->get()->unique('from_id');
        $unread = Message::where('to_id',Auth::id())->where('seen','0')->latest()->get();

    foreach ($unread as $msg) 
      $html .=  " <div class='chat item notSeenYet'> <div class='row'>  
    <div class='col-md-2 col-4'>
                          <div class='image'>
                            <img src=" . "{{asset('assets/website/images/profile/profile-image.png')}}" . ">
                            <img class='pos' src=" . "{{asset('assets/website/images/messenger/chat.png')}}" .">
                          </div>
                        </div>
                      <div class='col-md-6 col-8'>
                          <div class='content'>
                            <a href='profile.html'>" . $msg->from->fullname . "</a>
                            <a href='massenger.html'>" . $msg->body . "</a>
                          </div>
                        </div>                      
                        <div class='col-md-4 col-12'>
                          <div class='time'>
                            <span>" . $msg->readableDate."</span>
                            <i class='far fa-clock'></i>
                          </div>
                        </div>
                  
                      </div></div>";
    return $html;
   
  }

 public function notifications()
    {
        $notifications = auth()->user()->notifications()->get();
        $notification_count = $notifications->where('is_read',0)->count();
    }

public function comment(Request $request){
       $request->merge(['member_id'=>Auth::id()]);
        if(isset($request->parent_id))
          $request->merge(['parent_id'=>$request->parent_id]);
        Comment::create($request->all());
                        toast(__('front.Cooment added Successfully'),'success');
                        return redirect()->back();


}

    public function home(){
      $subjects = Subject::where('member_id','!=',Auth::id())->latest()->get();
        return view('website.home',compact('subjects'));
    }

    public function profile(){
            $subjects = Subject::where('member_id','=',Auth::id())->latest()->get();
                    return view('website.profile',compact('subjects'));


    }

public function showProfile($id){
 $subjects = Subject::where('member_id','=',$id)->latest()->get();
 $member = Member::find($id);
                    return view('website.show_profile',compact('subjects','member')); 
}

    public function listDoctors(Request $request){
    	  $doctors = Member::where('type','doctor')->withCount(['followings', 'followers'])->latest()->get();
    	  return view('website.doctors',compact('doctors'));
    }

     public function listPatients(Request $request){
    	  $users = Member::where('type','member')->withCount(['followings', 'followers'])->latest()->get();
    	  return view('website.users',compact('users'));
    }


        public function followToggole(Request $request){
       $user = Member::find($request->user_id) ;
       auth()->guard('member')->user()->toggleFollow($user);
        $follower = auth()->user();
        if ( ! $follower->isFollowing($request->user_id)) {
            Notification::create(['to_id'=>$request->user_id,'from_id'=>Auth::id(),'notifiable_id'=>$request->user_id , 'notifiable_type'=>'member','url'=>'show-profile/'. $request->user_id,'msg_ar'=> ' Follow ' , 'msg_en'=>'follow' ]);
        }
       return response()->json(['success'=>'success']);

    }
    public function shareSubject(Request $request){
        $is_shared = Subject::where('id',$request->subject_id)->where('member_id',Auth::id())->where('shared',1)->get();
        if(count($is_shared) == 0){
          $shared_subject = Subject::find($request->subject_id)->replicate();
          $shared_subject->member_id= Auth::id();
          $shared_subject->shared=1;
          $shared_subject->save();
        }
         $data = [
            'msg' => 'share success',
          ];
            return response()->json($data);

    }

    public function storeSubject(Request $request){
                $request->merge(['member_id'=>Auth::id()]);
                $subject = Subject::create($request->except(['audio','image','d_video','n_video']));
                if($request->hasFile('image'))
        {
            $path = base_path();
            $destinationPath = $path.'/uploads/subjects/image'; // upload path
            $image= $request->file('image');
            $extension = $image->getClientOriginalExtension(); // getting image extension
            $name = time().''.rand(11111,99999).'.'.$extension; // renameing image
            $image->move($destinationPath, $name); // uploading file to given path
            $subject->image='uploads/subjects/image/'.$name;
            $subject->save();
        }
                toast(__('front.Subject added Successfully'),'success');
                return redirect('/profile');

    }

    public function SubjectView(Request $request){
        $request->merge(['member_id'=>Auth::id(),'ip_address'=>request()->ip()]);
        SubjectView::create($request->all());
                    return response()->json(['success'=>'success']);

    }

    public function favouriteToggle(Request $request){
            $subject = Subject::find($request->subject_id);
            $subject->toggleFavorite(Auth::id());
             // if(auth()->id() != $subject->member_id)
             //   $subject->member->notify(new LikeSubjectToOwnerNotify($subject));

            return response()->json(['success'=>'success']);
    }


        function likeSubject(Request $request){
           $request->merge(['member_id'=>Auth::id() ,'like'=>1]);
           $check = LikeDislike::where('member_id',Auth::id())->where('subject_id',$request->subject_id)->where('like',1)->first();
           if($check)
              $check->delete();
            else
            LikeDislike::create($request->all());
          $data = [
            'msg' => 'success',
            'likes'  => Subject::find($request->subject_id)->likes()
          ];
            return response()->json($data);

    }

    function disLikeSubject(Request $request){
             $request->merge(['member_id'=>Auth::id() ,'dislike'=>1]);
           $check = LikeDislike::where('member_id',Auth::id())->where('subject_id',$request->subject_id)->where('dislike',1)->first();
           if($check)
              $check->delete();
            else
            LikeDislike::create($request->all());
           $data = [
            'msg' => 'success',
            'dislikes'  => Subject::find($request->subject_id)->dislikes()
          ];
            return response()->json($data);
    }

    /*Comments */
     
    /* End Comments */
}
