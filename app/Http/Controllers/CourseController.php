<?php

namespace App\Http\Controllers;

use Alaouy\Youtube\Facades\Youtube;
use App\Models\Course;
use App\Models\MainCater;
use App\Models\SubCater;

use Illuminate\Support\Facades\Redirect;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use App\Http\Controllers\MyFunction;

class CourseController extends Controller
{
    public function select($cater,$title)
    {
        $cat =trim(htmlspecialchars($cater));
        $tit= trim(htmlspecialchars($title));
        $Main = MainCater::where('title_en',$cat)->get();
        if(count($Main) > 0){
            $sub = SubCater::where('title_en',$tit)->get();
            if(count($sub) > 0){
                $All = SubCater::with('GetAllCourse')->get()[0];
                $courses = $All->GetAllCourse;
                $cater = MainCater::all();
                $myfun = new MyFunction();
                $courses = Course::with('subCat')->where('sub_cater',$sub[0]->id)->get();

                return view('course',
                    [
                        'courses'=>$courses,
                        'cater'=>$cater,
                        'Sub'=>$sub[0]->title,
                        'SubEn'=>$sub[0]->title_en,
                        "Main"=>$Main[0]
                    ]
                );


            }

        }else{
            return view('main.Error_page');
        }
    }

    public function Course($cater,$title,$course){

        $Cors = trim(htmlspecialchars($course));
        $removeDash = trim(htmlspecialchars($course));
        $Course = Course::where('title_en',$removeDash)->get();
        if(count($Course) > 0){
            $theCourse = $Course[0];
            $main = MainCater::where('title_en',htmlspecialchars($cater))->get();
            if(count($main) > 0){
                $subm = SubCater::where('title_en',htmlspecialchars($title))->get();
                if(count($subm) > 0){
                    $cater = MainCater::all();
                    //$collesc = Course::where('sub_cater',$theCourse['sub_cater'])->limit(5)->get()->random();
                    $collesc = Course::select('*')->where('sub_cater',$theCourse['sub_cater'])->inRandomOrder()->limit(5)->get();
                    return view('view_course',[
                        'cater' => $cater,
                        'Main'=>$main[0],
                        'Sub'=>$subm[0],
                        'course'=>json_decode($theCourse)->fulldata,
                        'data'=>$theCourse,
                        'collect' =>$collesc
                    ]);
                }

            }else{
                return view('main.Error_page');
            }


        }
        else{
            return view('main.Error_page');
        }


    }

    public function OldCourse($cater,$title,$course){

        $Cors = trim(htmlspecialchars($course));
        $removeDash = str_replace('-',' ',$Cors);
        $Course = Course::where('title',$removeDash)->get();
        if(count($Course) > 0){
            $theCourse = $Course[0];
            $main = MainCater::where('title_en',htmlspecialchars($cater))->get();
            if(count($main) > 0){
                $subm = SubCater::where('title_en',htmlspecialchars($title))->get();
                if(count($subm) > 0){
                    $cater = MainCater::all();
                    return view('view_course',[
                        'cater' => $cater,
                        'Main'=>$main[0],
                        'Sub'=>$subm[0],
                        'course'=>json_decode($theCourse)->fulldata,
                        'data'=>$theCourse
                    ]);
                }

            }


        }


    }

    public function getcourse($cater,$title,$course){

        $PlayLlstData =[];
        $Main = trim(htmlspecialchars($cater));
        $Subc = trim(htmlspecialchars($title));
        $Cors = trim(htmlspecialchars($course));
        $removeDash = str_replace('-',' ',$Cors);
        $Course = Course::where('title',$removeDash)->get();
        if(count($Course) > 0){
            $Course = $Course[0];
            $link = $Course->playlist_link;
            try {
                $playlistid = explode('?list=',$link);
                $video = Youtube::getPlaylistItemsByPlaylistId($playlistid[1]);
                if(count($video['info']) > 0){
                    $chaneelid = $video['results'][0]->snippet->channelId;
                    $chaneel   = Youtube::getChannelById($chaneelid);
                    $playlist_info = Youtube::getPlaylistById($playlistid[1])->snippet;
                    $chaneeldata = [
                        'title'=> $chaneel->snippet->title,
                        'chanid'=> $chaneel->id,
                        'description'=> $chaneel->snippet->description,
                        'customUrl'=> 'https://youtube.com/c/'.$chaneel->snippet->customUrl,
                        'Careatedat'=> Youtube::covtimedate($chaneel->snippet->publishedAt),
                        'chaneelogo'=> $chaneel->snippet->thumbnails,
                        'playlisinfo'=> $playlist_info,
                    ];
                    $AllVideos = [];
                    $i=1;
                    foreach ($video['results'] as $videos){
                        $title       = $videos->snippet->title;
                        $publishedAt = Youtube::covtimedate($videos->snippet->publishedAt);
                        $description = $videos->snippet->description;
                        $thumbnails  = $videos->snippet->thumbnails;
                        $videoId     = $videos->snippet->resourceId->videoId;
                        $addVideos = [
                            'Number'=> $i,
                            'VedioData' => [
                                'title'=> $title,
                                'publishTime'=> $publishedAt,
                                'description'=> $description,
                                'videoid'=> $videoId,
                                //'duration'=> file_get_contents('https://cliprz.org/php/getYoutubeDuration.php?vid='.$videoId),
                                'thumbnails'=>$thumbnails
                            ]
                        ];
                        $i = $i+1;
                        array_push($AllVideos,$addVideos);
                    }
                    $PlayLlstData =['Channel'=>$chaneeldata,'info'=>$video['info'],'videos'=>$AllVideos];
                    // Youtube::GetDownloadLinks('link') [To Get Download Links ]
                    // $code = Youtube::getVideoInfo('eopAkVXP_U4'); ['Get Videos From id']
                    // $time = Youtube::getYoutubeDuration('eopAkVXP_U4'); [' Get YouTube Duration from video id']
                    $FullData = json_encode($PlayLlstData);
                    echo $FullData;
                    /*
                     echo "<pre>";
                    print_r(json_decode($FullData));
                    echo "</pre>";
                     * */

                    //echo $PlayLlstData;



                }
            }catch(\Exception $e){
                return view('main.Error_page');

            }



        }


    }

    public function viewvideo($cater,$title,$course,$vidindex){
        $caters = trim(htmlspecialchars($cater));
        $title = trim(htmlspecialchars($title));
        $course = trim(htmlspecialchars($course));
        $vidindexs = ($vidindex);
        $vidindex = intval($vidindexs)-1;
        $getplaylist = Course::where('title_en',$course)->get();
        if(count($getplaylist) > 0){
            $getplaylist = $getplaylist[0];
            $subcat = $getplaylist->sub_cater;
            $getsubM = SubCater::find($subcat);
            $all_lesson = json_decode($getplaylist->fulldata);
            if(isset($all_lesson->lessons[$vidindex])){
                $cater = MainCater::all();
                $collect = Course::select('*')->inRandomOrder()->limit(5)->get();
                return view('view_lesson',[
                    'cater' => $cater,
                    'getplaylist'=> json_decode($getplaylist),
                    'Main' => $caters,
                    'SubMain' => $getsubM->title_en,
                    'id'=>$vidindex,
                    'collect' => $collect
                ]);
            }else{
                return view('main.Error_page');
            }


        }else{
            return view('main.Error_page');
        }
    }

    public function shourtCourse($id){
        $getid = intval($id);
        $getCourse = Course::find($getid);
        if(isset($getCourse) > 0){
            $getsub = SubCater::find($getCourse->sub_cater);
            $mainCat = MainCater::find($getsub->cater_id);
            return Redirect::to('Courses/'.trim($mainCat->title_en).'/'.trim($getsub->title_en).'/'.trim($getCourse->title_en).'');
        }else{
            return Redirect::to('./');
        }

    }

    public function search(Request $request){
            $title = trim($request->get('query'));
           /* $search = Course::where('title','like','%'.$title.'%')->paginate(1);
            $m = $search->getOptions()['pageName'] = 'Dexter';
            $page = $search->currentPage();
            dd($m,$search->items()[0]->title,$search->url($page));*/
           $catr = MainCater::all();
          $search = Course::where('title','like','%'.$title.'%')
            ->orWhere('auther','like','%'.$title.'%')
            ->orWhere('desc','like','%'.$title.'%')
            ->orWhere('fulldata','like','%'.$title.'%')
            ->orWhere('tags','like','%'.$title.'%')
            ->orWhere('title_en','like','%'.$title.'%')
            ->limit(50)
            ->get();
        if(count($search) > 0){
            return view('search_index',['search_title'=>$title,'search_data'=>$search,'is_data'=>1,'cater'=>$catr]);
        }else{
            return view('main.Error_page');
        }

    }
}
