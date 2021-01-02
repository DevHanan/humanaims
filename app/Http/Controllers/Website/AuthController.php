<?php
namespace App\Http\Controllers\Website;

use App\Http\Controllers\Controller;
use App\Providers\RouteServiceProvider;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Laravel\Socialite\Facades\Socialite;
use Illuminate\Http\Request;
use App\Models\TempUser;
use App\Models\Member;
use App\Mail\VerifyMail;
use App\Http\Requests\RegisterationRequest;
use Illuminate\Support\Facades\Mail;
use Hash;
use Carbon\Carbon;
use App\Models\Setting;
use App\Models\Specialization;

use Auth;
class AuthController extends Controller
{
    use AuthenticatesUsers;
    
    protected $redirectTo = '/home'; //Redirect after authenticate

    

	  public function Login(Request $request)
    {

        $this->validate($request, [
            'email'   => 'required|email',
            'password' => 'required|min:6'
        ]);
        if (Auth::guard('member')->attempt(['email' => $request->email, 'password' => $request->password], $request->get('remember'))){
            toast(__('front.Login Successfully'),'success');
        	 return redirect()->intended('/home');
        }
        else
        toast(__('front.Login Failed'),'error');
        return redirect()->back()->withInput($request->only('email', 'remember'));
    }

     public function getRegister(){
    return view('website.auth.register');
    }
      public function postRegister(RegisterationRequest $request)
    {
        $setting = Setting::first();
          $temp = TempUser::create([
            'fullname' => $request->fullname,
            'email' => $request->email,
            'password' => Hash::make($request->password),
            'verify_code'    => substr(number_format(time() * rand(),0,'',''),0,6),
            'time'        => Carbon::now(),
            'expire_time'  => Carbon::now()->addMinutes($setting->verify_expire_time),
            'trail_number'=> 1

        ]);
        // Mail::to($temp->email)->send(new VerifyMail($temp));
            toast(__('front.please Check email for verification step'),'success');
           return view('website.auth.verification_code',compact('temp'));
    }

    public function ResendCode(Request $request){
        $setting = Setting::first();
        $temp = TempUser::where('email',$request->email)->first();
        $verify_code = substr(number_format(time() * rand(),0,'',''),0,6);
        $trail_number = $temp->trail_number + 1;
        $expire = Carbon::now()->addMinutes($setting->verify_expire_time);
        $temp->update(['verify_code'=>$verify_code ,  '$trail_number' => $$trail_number ,
            'expire_time'=>$expire]);
        Mail::to($request->email)->send(new VerifyMail($temp));
        toast(__('front.Verification Code has been sent Successfully'),'success');
        return view('website.auth.verification_code',compact('temp'));

    }

    public function verifyAccount(Request $request){
        $temp = TempUser::where('email',$request->email)->first();
        $code = $request->num6 .$request->num5 . $request->num4 . $request->num3 . $request->num2 .$request->num1;
        // return $code;
         if($temp->verify_code ==   $code && $temp->expire_time >= Carbon::now()){
            $temp->update(['verified'=>'1']);
             toast(__('front.User has been verified successfully , please choice Membership'),'success');
        return view('website.auth.memberShip',compact('temp'));
         }else{
                       toast(__('front.Error when try to activate your account'),'warning');
                               return view('website.auth.verification_code',compact('temp'));

  
         }

        
    }

    public function userMembership(Request $request){
        $temp = TempUser::where('email',$request->email)->first();
            if($request->membership == 'doctors')
                $request->merge(['type'=>'doctor']);
                else
                    $request->merge(['type'=>'member']);

            //         Doctor::create([
            //             'fullname'  => $temp->fullname,
            //             'email'     => $temp->email,
            //             'age'      => $request->age,
            //             'password'  => $temp->password
            //         ]);
            // else  
            //  Patient::create([
            //             'fullname'  => $temp->fullname,
            //             'email'     => $temp->email,
            //             'age'      => $request->age,
            //             'password'  => $temp->password,
            //             'membership'  => $request->membership
            //         ]);  
                Member::create([
                        'fullname'  => $temp->fullname,
                        'email'     => $temp->email,
                        'age'      => $request->age,
                        'password'  => $temp->password,
                        'type'  => $request->type
                    ]); 

 toast(__('front.Data has been done successfully'),'success');
        return redirect('/');
    }



 public function logout(Request $request)
    {
        if(Auth::guard('member')->check())
            auth('member')->logout();
          return redirect('/');
    }

    public function profile(Request $request){
       
       // return $request->all();
        $data = Member::findOrFail(Auth::id());
        if($request->fullname)
            $data->update(['fullname'=>$request->fullname]);
        if($request->email)
            $data->update(['email'=>$request->email]);
        if($request->country_id)
            $data->update(['country_id'=>$request->country_id]);
        if($request->gender)
            $data->update(['gender'=>$request->gender]);
         if($request->specialization_id){
            $specialization = Specialization::where('name_ar',$request->specialization_id)->orwhere('name_en',$request->specialization_id)->first();
            $data->update(['specialization_id'=>$specialization->id]);  
         }

        if($request->hasFile('image'))
        {
            $path = base_path();
            $destinationPath = $path.'/uploads/members/image'; // upload path
            $image= $request->file('image');
            $extension = $image->getClientOriginalExtension(); // getting image extension
            $name = time().''.rand(11111,99999).'.'.$extension; // renameing image
            $image->move($destinationPath, $name); // uploading file to given path
            $data->image='uploads/members/image/'.$name;
            $data->save();
        }

         if($request->hasFile('background'))
        {
            $path = base_path();
            $destinationPath = $path.'/uploads/members/background'; // upload path
            $image= $request->file('background');
            $extension = $image->getClientOriginalExtension(); // getting image extension
            $name = time().''.rand(11111,99999).'.'.$extension; // renameing image
            $image->move($destinationPath, $name); // uploading file to given path
            $data->background='uploads/members/background/'.$name;
            $data->save();
        }
         if($request->hasFile('cv'))
        {
            $path = base_path();
            $destinationPath = $path.'/uploads/members/cvs'; // upload path
            $cv= $request->file('cv');
            $extension = $cv->getClientOriginalExtension(); // getting image extension
            $name = time().''.rand(11111,99999).'.'.$extension; // renameing image
            $cv->move($destinationPath, $name); // uploading file to given path
            $data->cv='uploads/members/cvs/'.$name;
            $data->save();
        }

 toast(__('front.Data has been done successfully'),'success');
 return redirect()->back();
    }

     public function changePassword(Request $request)
    {
        $this->validate($request, [
            'old_password' => 'required',
            'password' => 'required|confirmed',
        ]);
        
        $user = Auth::user();
        
        if (Hash::check($request->input('old_password'), $user->password)) {
            // The passwords match...
            $user->password = bcrypt($request->input('password'));
            $user->save();
            toast(__('front.Data has been done successfully'),'success');
                    return redirect('/settings');

            
        }else{
            toast(__('front.Error when try to change password '),'error');
                    return redirect('/settings');

        }
        
    }
    
}