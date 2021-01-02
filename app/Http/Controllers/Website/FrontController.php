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
use App\Models\Member;
use App\Models\Subject;
use App\Models\UserFollow;
use App\Models\Favorite;
use App\Models\SubjectView;
use App\Models\LikeDislike;

use Auth;
use DB;
class FrontController extends Controller
{

  // public function notifications()
  //   {
  //       return auth()->user()->unreadNotifications()->limit(5)->get()->toArray();
  //   }
    public function home(){
        return view('website.home');
    }

    public function listDoctors(Request $request){
    	  $doctors = Member::where('type','doctor')->withCount(['followings', 'followers'])->latest()->get();
    	  return view('website.doctors',compact('doctors'));
    }

     public function listPatients(Request $request){
    	  $users = Member::where('type','member')->withCount(['followings', 'followers'])->latest()->get();
    	  return view('website.users',compact('users'));
    }


        public function ajaxRequest(Request $request){
       $user = Member::find($request->user_id) ;
       if(auth()->guard('member')->user()->isFollowing($user))
       auth()->guard('member')->user()->toggleFollow($user);
       return response()->json(['success'=>'success']);

    }

    public function storeSubject(Request $request){
                $request->merge(['member_id'=>auth()->guard('member')->user()->id]);
                Subject::create($request->except(['audio','image','d_video','n_video']));
                toast(__('front.Subject added Successfully'),'success');
                return redirect('/home');

    }

    public function SubjectView(Request $request){
        $request->merge(['member_id'=>Auth::id(),'ip_address'=>request()->ip()]);
        SubjectView::create($request->all());
                    return response()->json(['success'=>'success']);

    }

    public function favouriteToggle(Request $request){

            $subject = Subject::find($request->subject_id);
            $subject->toggleFavorite(Auth::id());
             if(auth()->id() != $subject->member_id)
               $subject->member->notify(new LikeSubjectToOwnerNotify($subject));

            return response()->json(['success'=>'success']);
    }


        function save_likedislike(Request $request){
           $request->merge(['member_id'=>Auth::id()]);
           $subject = Subject::find($request->subject_id);
        if($request->type=='like'){
            $request->merge(['like'=>1]);
          LikeDislike::where(['subject_id'=>$request->subject_id , 'member_id'=>Auth::id(),'dislike'=>1])->delete();
        }else{
            $request->merge(['dislike'=>1]);
            LikeDislike::where(['subject_id'=>$request->subject_id , 'member_id'=>Auth::id(),'like'=>1])->delete();
        }
       $obj =  LikeDislike::create($request->all());
       // if(auth()->id != $subject->member_id){
                   $subject->member->notify(new LikeSubjectToOwnerNotify($obj));
         // }

        return response()->json(['success'=>'success']);


       

    }

    /*Comments */
     
    /* End Comments */
}
