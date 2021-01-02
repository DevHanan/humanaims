<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class CountrySeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('countries')->delete();
        $countries = array(
            array('id' => 1 ,'name_ar' => "Afghanistan", 'name_en' => "Afghanistan"),
            array('id' => 2,'name_ar' => "Albania", 'name_en' => "Albania"),
            array('id' => 3,'name_ar' => "Algeria" , 'name_en' => "Algeria"),
            array('id' => 4 ,'name_ar' => "American Samoa", 'name_en' => "American Samoa")
           
        );
        DB::table('countries')->insert($countries);
    }
}
