<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\Schema;
use Illuminate\Support\Facades\View;
use App;
use Auth;
use Illuminate\Database\Eloquent\Relations\Relation;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        //
    }

    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
       
        Schema::defaultStringLength(191);
        // view::share('subjects',App\Models\Subject::where('member_id','!=',Auth::id())->latest()->get());
        view::share('allSubjects',App\Models\Subject::latest()->get());
         view::share('setting',App\Models\Setting::first());
         view::share('pages',App\Models\Page::all());
         view::share('about_page',App\Models\Page::where('type','about')->first());
         view::share('privacy_page',App\Models\Page::where('type','privacy')->first());
         view::share('starts',['1'=>'1','2'=>'2','3'=>'3','4'=>'4','5'=>'5']);
          view::share('countries',App\Models\Country::pluck('name_'.App::getLocale() , 'id')->ToArray());
        view::share('all_countries',App\Models\Country::latest()->get());
          view::share('specializations',App\Models\Specialization::pluck('name_'.App::getLocale() , 'id')->ToArray());
          view::share('categories',App\Models\Category::pluck('name_'.App::getLocale() , 'id')->ToArray());
         
          view::share('notifications',App\Models\Notification::all());
          View::share('not_seen',App\Models\Message::where('to_id',Auth::id())->where('seen','0')->count());
          View::share('messages',App\Models\Message::where('to_id',Auth::id())->orderBy('created_at','desc')->get());
          view::share('parentCategories',App\Models\Category::where('parent_id','0')->get());
          view::share('parentSpecialization',App\Models\Specialization::where('parent_id','0')->get());

          


    }
}
