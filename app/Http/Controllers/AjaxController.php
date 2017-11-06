<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Lesson;

class AjaxController extends Controller
{
    public function permission(){
        $json = [];

        $text = Request::input('text');
        $connect = Lesson::where('text', $text)->first();
        if(!$connect){
            $text = Lesson::find($text);
            $json['test'] = 'yes';
        }else{
            $json['test'] = 'no';
        }


        return $json;
    }
}
