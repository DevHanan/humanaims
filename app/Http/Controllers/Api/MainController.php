<?php

namespace App\Http\Controllers\Api;

use App\Models\Setting;
use App\Models\Page;
use App\Models\Line;
use App\Models\Region;
use App\Models\Category;
use App\Models\Slider;
use App\Models\ContactMsgType;
use DB;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class MainController extends Controller
{

    public function categories(Request $request)
    {
        $data = Category::all();
        return response()->json([
	    'status'=> '1',	
            'code' => '200',
            'data' => $data,
            'message' => trans('api.data.load-complete'),
        ]);
    }

   public function regions(Request $request)
    {
        $data = Region::with('parent')->get();
        return response()->json([
            'status'=> '1',
            'code' => '200',
            'data' => $data,
            'message' => trans('api.data.load-complete'),
        ]);
    }

   public function trafficLines(Request $request){
       $data = Line::with('region')->get();
        return response()->json([
            'status'=> '1',
            'code' => '200',
            'data' => $data,
            'message' => trans('api.data.load-complete'),
        ]); 
   }

	public function aboutUs(Request $request){
       $data = Page::where('type','about')->get();
        return response()->json([
            'status'=> '1',
            'code' => '200',
            'data' => $data,
            'message' => trans('api.data.load-complete'),
        ]); 
   }

	public function privacy(Request $request){
       $data = Page::where('type','privacy')->get();
        return response()->json([
            'status'=> '1',
            'code' => '200',
            'data' => $data,
            'message' => trans('api.data.load-complete'),
        ]); 
   }
	public function termsConditions(Request $request){
       $data = Setting::find(1)->select('terms_desc_ar','terms_desc_en')->get();
        return response()->json([
            'status'=> '1',
            'code' => '200',
            'data' => $data,
            'message' => trans('api.data.load-complete'),
        ]); 
   }


	public function sliders(Request $request){
       $data = Slider::latest()->get();
        return response()->json([
            'status'=> '1',
            'code' => '200',
            'data' => $data,
            'message' => trans('api.data.load-complete'),
        ]); 
   }

	public function contactTypes(Request $request){

		 $data = ContactMsgType::latest()->get();
        return response()->json([
            'status'=> '1',
            'code' => '200',
            'data' => $data,
            'message' => trans('api.data.load-complete'),
        ]); 
	
	}
}
