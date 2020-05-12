<?php

namespace App\Http\Controllers;

use App\Models\Course;
use App\Models\MainCater;
use App\Models\SubCater;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Artisan;
class HomeController extends Controller
{

    public function index()
    {
        //$exitCode = Artisan::call('cache:clear');
        $Main_Cater = MainCater::all();
        $subs = SubCater::all();
        $corses = Course::all();
        $collaction = Course::select('*')->inRandomOrder()->limit(24)->get();
        $times = DB::select('select SUM(all_length) as s FROM courses');
        return view('main.index',['cater'=>$Main_Cater,
                'all'=>[
            'Main'=>$Main_Cater,
            'subs'=>$subs,
            'cordse'=>$corses,
            'times' => $times[0]->s
        ],
        'Rand'=> $collaction
                ]
        );
    }
    public function index2()
    {
        $Main_Cater = MainCater::all();
        return view('main.index2',['cater'=>$Main_Cater]);
    }
}
