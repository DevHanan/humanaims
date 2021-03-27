<?php

namespace App\Http\Controllers\Api;

use App\Models\Customer;
use App\Models\Token;
use Hash;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Validation\Rule;
use Illuminate\Support\Str;
use Mail;

class AuthController extends Controller
{

    function __construct()
    {
        //$this->middleware('Language');
    }

    public function register(Request $request)
    {
        $messages = [
            'name.required' => trans('api.name.required'),
            'email.required' => trans('api.email.required'),
	     'phone.required' =>trans('api.mobile.required'),	
            'email.unique' => trans('api.email.unique'),
            'password.required' => trans('api.password.required'),
            'password.confirmed' => trans('api.password.confirmed'),
        ];
        $validation = validator()->make($request->all(), [
            'name' => 'required',
	    'phone'  => 'required',	
            'email' => 'required|unique:customers,email',
            'password' => 'required|confirmed'
        ],$messages);

        if ($validation->fails()) {
            $data = $validation->errors();
 return response()->json([
'status'=> '0',
            'code' => '200',
            'data' => $validation->errors(),
            'message' => trans('api.data.load-complete'),
        ]);
        }

        $userToken = Str::random(60);
        $request->merge(array('api_token' => $userToken));
        $request->merge(array('password' => bcrypt($request->password)));
        $user = Customer::create($request->all());
        if ($user) {
            $data = [
                'api_token' => $userToken,
                'user' => $user
            ];
 return response()->json([
            'status' => '1',
		'code'=>'200',
            'data' => $data,
            'message' => trans('api.register.success'),
        ]);

        } else {

return response()->json([
            'status' => '0',
		'code'=>'200',
            'data' => '',
            'message' => trans('api.register.failed')
        ]);
        }
    }

    /**
     * @param Request $request
     * @return mixed
     */
    public function profile(Request $request)
    {
        $messages = [
            'email.unique' => trans('api.email.unique'),
            'password.confirmed' => trans('api.password.confirmed'),
        ];
        $validation = validator()->make($request->all(), [
            'password' => 'confirmed',
            'email' => Rule::unique('users')->ignore($request->user()->id),
        ],$messages);

        if ($validation->fails()) {
            $data = $validation->errors();
            return responseJson(0,$validation->errors()->first(),$data);
        }

        if ($request->has('name')) {
            $request->user()->update($request->only('name'));
        }
        if ($request->has('email')) {
            $request->user()->update($request->only('email'));
        }
        if ($request->has('password')) {
            $request->merge(array('password' => bcrypt($request->password)));
            $request->user()->update($request->only('password'));
        }

        if ($request->has('mobile')) {
            $request->user()->update($request->only('mobile'));
        }

        if ($request->has('city_id')) {
            $request->user()->update($request->only('city_id'));
        }

        if ($request->hasFile('logo'))
        {
            $image = $request->file('logo');
            $destinationPath = base_path() . '/uploads/clients';
            $extension = $image->getClientOriginalExtension(); // getting image extension
            $name = time() . '' . rand(11111, 99999) . '.' . $extension; // renameing image
            $image->move($destinationPath, $name); // uploading file to given
            $request->user()->update(['logo' => 'uploads/clients/' . $name]);
            fitImage('uploads/clients/' . $name,200);
        }

        $data = [
            'data' => [
                'user' => $request->user()
            ]
        ];
        return responseJson(1,trans('api.profile.updated'),$data);
    }

    /**
     * @param Request $request
     * @return mixed
     */
    public function login(Request $request)
    {
        $messages = [
            'email.required' => trans('api.email.required'),
            'password.required' => trans('api.password.required'),
        ];
        $validation = validator()->make($request->all(), [
            'email' => 'required',
            'password' => 'required'
        ],$messages);

        if ($validation->fails()) {
            $data = $validation->errors();
            return response()->json([
            'status'=> '0',
            'code' => '200',
            'data' => $data,
            'message' => trans('api.data.load-complete'),
        ]);
        }

        $user = Customer::where('email', $request->input('email'))->first();
        if ($user)
        {
            if ($user->approved == 0)
            {
	 return response()->json([
            'status'=> '0',
            'code' => '200',
            'data' => $user,
            'message' => trans('api.login.banned'),
        ]);
            }
            if (Hash::check($request->password, $user->password))
            {
                $data = [
                    'data' => [
                        'api_token' => $user->api_token,
                        'user' => $user
                    ]
                ];
	return response()->json([
            'status'=> '1',
            'code' => '200',
            'data' => $data,
            'message' => trans('api.login.success'),
        ]);

            }else{
			 return response()->json([
            'status'=> '0',
            'code' => '200',
            'data' => $data,
            'message' => trans('api.login.failed'),
        ]);

            }
        }else{
		 return response()->json([
            'status'=> '0',
            'code' => '200',
            'data' => $data,
            'message' => trans('api.login.failed'),
        ]);
        }
    }

    /**
     * @param Request $request
     * @return mixed
     */
    public function reset(Request $request)
    {
        $messages = [
            'email.required' => trans('api.email.required'),
        ];
        $validation = validator()->make($request->all(), [
            'email' => 'required'
        ],$messages);

        if ($validation->fails()) {
            $data = $validation->errors();
	return response()->json([
            'status'=> '0',
            'code' => '200',
            'data' => $data,
            'message' => trans('api.reset.failed'),
        ]);
        }

        $user = Customer::where('email',$request->email)->first();
        if ($user){
            $code = rand(111111,999999);
            $update = $user->update(['code' => $code]);
            if ($update)
            {
                // send email
                Mail::send('emails.reset', ['code' => $code], function ($mail) use($user) {
                    $mail->from('hanan.taha1993@gmail.com', 'تطبيق بيتال');

                    $mail->to($user->email, $user->name)->subject('إعادة تعيين كلمة المرور');
                });

             return response()->json([
            'status'=> '1',
            'code' => '200',
            'data' => $user,
            'message' => trans('api.reset.check_email'),
              ]);
            }else{

            return response()->json([
            'status'=> '0',
            'code' => '200',
            'data' => $user,
            'message' => trans('api.reset.error'),
              ]);
            }
        }else{
		 return response()->json([
            'status'=> '0',
            'code' => '200',
            'data' => $user,
            'message' => trans('api.reset.no_email_exist'),
              ]);

        }
    }

    /**
     * @param Request $request
     * @return mixed
     */
    public function password(Request $request)
    {
        $messages = [
            'code.required' => trans('api.code.required'),
            'password.confirmed' => trans('api.password.confirmed'),
        ];
        $validation = validator()->make($request->all(), [
            'code' => 'required',
            'password' => 'confirmed'
        ],$messages);

        if ($validation->fails()) {
            $data = $validation->errors();
            return response()->json([
            'status'=> '0',
            'code' => '200',
            'data' => $data,
            'message' => trans('api.reset.failed'),
        ]);
        }

        $user = Customer::where('code',$request->code)->where('code','!=',0)->first();

        if ($user)
        {
            $update = $user->update(['password' => bcrypt($request->password), 'code' => null]);
            if ($update)
            {
                  return response()->json([
            'status'=> '0',
            'code' => '200',
            'data' => $user,
            'message' => trans('api.reset.done'),
        ]);
            }else{
                  return response()->json([
            'status'=> '0',
            'code' => '200',
            'data' => $user,
            'message' => trans('api.reset.error'),
        ]);
            }
        }else{
               return response()->json([
            'status'=> '0',
            'code' => '200',
            'data' => $user,
            'message' => trans('api.reset.invaild_code'),
        ]);
        }
    }

    /**
     * @param Request $request
     * @return mixed
     */
    public function registerToken(Request $request)
    {
        $messages = [
            'type.required' => trans('api.type.required'),
            'token.required' => trans('api.token.required'),
            'token.in' => trans('api.token.in'),
        ];
        $validation = validator()->make($request->all(), [
            'type' => 'required|in:android,ios',
            'token' => 'required',
        ],$messages);

        if ($validation->fails()) {
            $data = $validation->errors();
            return responseJson(0,$validation->errors()->first(),$data);
        }

        Token::where('token',$request->token)->delete();

        auth()->user()->tokens()->create($request->all());

        $data = [
            'status' => 1,
            'msg' => 'تم التسجيل بنجاح',
        ];

        return response()->json($data);
    }

    /**
     * @param Request $request
     * @return mixed
     */
    public function removeToken(Request $request)
    {
        $validation = validator()->make($request->all(), [
            'token' => 'required',
        ]);

        if ($validation->fails()) {
            $data = $validation->errors();
            return responseJson(0,$validation->errors()->first(),$data);
        }

        Token::where('token',$request->token)->delete();

        $data = [
            'status' => 1,
            'msg' => 'تم  الحذف بنجاح بنجاح',
        ];

        return response()->json($data);
    }
}
