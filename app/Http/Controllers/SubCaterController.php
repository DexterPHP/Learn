<?php

namespace App\Http\Controllers;

use App\Models\MainCater;
use App\Models\SubCater;
use Illuminate\Http\Request;

class SubCaterController extends Controller
{

    public function getAllCorces(Request $request,$title)
    {
        if($request->isMethod('post')){
            abort('401','Stop Wlaaaaa');
        }else{
            $title_are = htmlspecialchars($title);
            $Get_Main_cater_id = MainCater::where('title_en',$title_are)->get();
            if(count($Get_Main_cater_id) > 0 ){
                $Sub =$Get_Main_cater_id[0];
                $all = $Sub->GetMainCater()->get();
                $cater = MainCater::all();
                return view('viewSub',['datacater'=>$all,'cater'=>$cater,'Sub'=>$Sub]);


            }else{
                return view('main.Error_page');
            }


        }

    }


}
