<?php

namespace App\Http\Controllers\frontend;

use App\Model\Girls;
use App\Model\Girlphotos;
use App\Model\Attribute;
use Illuminate\Http\Request;
use App\Http\Controllers\MyController;
use App\Http\Requests;
use Crypt;


class IndexController extends MyController{

    private $attribute;
    private $number;
    private $telegram;
    private $weixin;
    private $statusArray;

    public function __construct()
    {
        date_default_timezone_set('Asia/Shanghai');
        $this->attribute = Attribute::orderBy('id','asc')->get()->toArray();

        foreach ($this->attribute as $item)
        {
            if($item['key'] == 'number')
            {
                $this->number[] = $item['value'];
            }
            if($item['key'] == 'telegram')
            {
                $this->telegram[] = $item['value'];
            }
            if($item['key'] == 'weixin')
            {
                $this->weixin[] = $item['value'];
            }
        }
        $this->statusArray = array(
            '0' => '现在有空哦',
            '1' => '正在上钟,请老板耐心等候',
            '2' => '今天休息，请等待通知',
            '3' => '已下架',
            '9' => '已删除'
        );

    }

    public function index(Request $request){

        $girls = Girls::select('girls.id','girls.cover','girls.name','nation.nation','nation.flag')
            ->leftJoin('nation',function ($join){
                $join->on('nation.id','=','girls.nation_id');
            })->where('girls.status','!=',9)->orderBy('girls.id', 'desc')->get()->toArray();
//        print_r($girlsArray);exit;
        return view('frontend.index',['girls' => $girls,'number' => $this->number,'telegram' => $this->telegram,'weixin' => $this->weixin]);
    }



    public function beauty($id){
        $girl = Girls::select('girls.*','nation.nation','nation.flag')
            ->leftJoin('nation',function ($join){
                $join->on('nation.id','=','girls.nation_id');
            })->where('girls.id',$id)->get()->toArray();
        if(empty($girl))
        {
            return redirect("/");
        }
        $introArray = explode(PHP_EOL,trim($girl[0]['intro']));
        $service = trim($girl[0]['service']);
        if(empty($service))
        {
            $serviceArray = '';
        }else{
            $serviceArray = explode(PHP_EOL,$service);
        }
        $videos = trim($girl[0]['videolist']);
        if(empty($videos))
        {
            $videosArray = '';
        }else{
            $videosArray = explode(PHP_EOL,$videos);
        }

        $photos = Girlphotos::where('g_id',$id)->get()->toArray();

        //获取当前的页的上一个和一下
        $preData = Girls::select('girls.id','girls.name','girls.cover','nation.nation','nation.flag')
            ->leftJoin('nation',function ($join){
                $join->on('nation.id','=','girls.nation_id');
            })->where('girls.id','<',$id)->where('girls.status','!=',9)->orderBy('id','desc')->get(1)->toArray();

        $nextData = Girls::select('girls.id','girls.name','girls.cover','nation.nation','nation.flag')
            ->leftJoin('nation',function ($join){
                $join->on('nation.id','=','girls.nation_id');
            })->where('girls.id','>',$id)->where('girls.status','!=',9)->orderBy('id','asc')->get(1)->toArray();



        return view('frontend.beautyview',
            ['girl'=> $girl[0],'statusArray' => $this->statusArray,'introArray' => $introArray,
                'serviceArray' => $serviceArray,'photos' => $photos,'videosArray' => $videosArray,'attribute' => $this->attribute,
                'number' => $this->number,'telegram' => $this->telegram,'weixin' => $this->weixin, 'preData' => $preData, 'nextData' => $nextData]
        );
    }

    public function contact(){
        return view('frontend.contactus',['number' => $this->number,'telegram' => $this->telegram,'weixin' => $this->weixin]);
    }



}
