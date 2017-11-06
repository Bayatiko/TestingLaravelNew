<?php

namespace App\Http\Controllers;
use Request;
use App\Lesson;
use App\NewTest;


class indexController extends Controller
{
    public function test(){ 
        $lesson = Lesson::all();
        return view('index')->with('lesson', $lesson);

    }

    public function add(){
    	$lesson = new Lesson;

            $lesson->text = Request::input('text');
            
    	$lesson->save();

    	return redirect('/lesson');

    }
    public function delete($id){
        $lesson = Lesson::find($id);
    	if(!$lesson){
    		return redirect('/lesson');
    	}

        $lesson->delete();
        return redirect('/lesson');
    }

//    public function deletechecked(){
//        $lesson = new Lesson;
//        $lesson->id = Request::input('esiminch');
//        if(!$lesson){
//            return redirect('/lesson');
//        }
//
//        $lesson->delete();
//        return redirect('/lesson');
//    }


    public function change(){   
        $lesson = Lesson::find(Request::input('id'));
    	if(!$lesson){
    		return redirect('/lesson');
    	}
        
    	$lesson->text = Request::input('textarea');
        
    	$lesson->save();

    	return redirect('/lesson');
    }    



}

