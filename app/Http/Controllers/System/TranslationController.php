<?php

namespace App\Http\Controllers\System;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Translation;

class TranslationController extends Controller
{
    public function getFrontKey(){
    	$locales = array('ar','en');
    	 $numChanged = Translation::where('group', 'front')->where('status', Translation::STATUS_CHANGED)->count();


        $allTranslations = Translation::where('group', 'front')->orderBy('key', 'asc')->get();
        $numTranslations = count($allTranslations);
        $translations = [];
        foreach($allTranslations as $translation){
            $translations[$translation->key][$translation->locale] = $translation;
        }
                $groups = array();
                $group = 'front';

         return view('dashboard.translations.front')
            ->with('translations', $translations)
            ->with('locales', $locales)
            ->with('groups', $groups)
            ->with('group', $group)
            ->with('numTranslations', $numTranslations)
            ->with('numChanged', $numChanged)
            ->with('editUrl', $group ? action('\Barryvdh\TranslationManager\Controller@postEdit', [$group]) : null)
                        ->with('deleteEnabled', 'true');
 
    }

     public function getBackKey(){
                $locales = array('ar','en');
$numChanged = Translation::where('group', 'back')->where('status', Translation::STATUS_CHANGED)->count();


        $allTranslations = Translation::where('group', 'back')->orderBy('key', 'asc')->get();
        $numTranslations = count($allTranslations);
        $translations = [];
        foreach($allTranslations as $translation){
            $translations[$translation->key][$translation->locale] = $translation;
        }

                $groups = array();
                $group = 'back';

         return view('dashboard.translations.back')
            ->with('translations', $translations)
            ->with('locales', $locales)
            ->with('groups', $groups)
            ->with('group', $group)
            ->with('numTranslations', $numTranslations)
            ->with('numChanged', $numChanged)
            ->with('editUrl', $group ? action('\Barryvdh\TranslationManager\Controller@postEdit', [$group]) : null)
            ->with('deleteEnabled', 'true'); 
    }

   public function postEdit($group = null){
            $name = request()->get('name');
            $value = request()->get('value');

            list($locale, $key) = explode('|', $name, 2);
            $translation = Translation::firstOrNew([
                'locale' => $locale,
                'group' => $group,
                'key' => $key,
            ]);
            $translation->value = (string) $value ?: null;
            $translation->status = Translation::STATUS_CHANGED;
            $translation->save();
            return array('status' => 'ok');
        
   }


}
