<?php

namespace App\Util;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Form extends Model{
    use HasFactory;	
   
    static function statusSelect($selectedVal = ''){
        
        return view('Form.status_select',['selectedVal' => $selectedVal]);
    }


    static function select($name, $list=[], $selectedVal = '', $attribute=''){
        return view('Form.select',['name' => $name, 'list' => $list, 'selectedVal' => $selectedVal, 'attribute' => $attribute]);
    }


    static function citySelect($name,  $selectedVal = '', $attribute=''){

        $list = \App\Models\Location::where('type', 'CI')->get()->pluck('name','id');

        return view('Form.select',['name' => $name, 'list' => $list, 'selectedVal' => $selectedVal, 'attribute' => $attribute]);
    }








}