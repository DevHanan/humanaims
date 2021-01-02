<?php

namespace App\Traits;

use App;

trait LocalizedTrait
{
    public function getLocaleValue($model, $field)
    {
        if (App::isLocale('ar')) {
            $arField = $field . '_ar';
            if (isset($model->$arField)) {
                return $model->$arField;
            }
        }
        if (App::isLocale('en')) {
            $enField = $field . '_en';
            if (isset($model->$enField)) {
                return $model->$enField;
            }
        }

        if (isset($model->$field)) {
            return $model->$field;
        }

        return null;
    }
    public function getTransValue($model,$field ,$value)
    {
        if (Language() =='ar') {
            $arField = __('main.'.$value);
            if (isset($model->$field)) {
                return $arField;
            }
        }else{
            return $value;
        }



        return null;
    }

}