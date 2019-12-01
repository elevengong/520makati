<?php

namespace App\Http\Controllers\backend;

use App\Model\Girls;
use App\Model\Nation;
use App\Model\Girlphotos;
use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\MyController;

class GirlsController extends MyController
{

    public function girllist(Request $request){
        $searchData = array();

        if($request->isMethod('post')){
            $searchData['searchword'] = request()->input('searchword');
            $searchData['status'] = request()->input('status');
            $result = Girls::select('girls.*','nation.nation','nation.flag')
                ->leftJoin('nation',function ($join){
                    $join->on('nation.id','=','girls.nation_id');
                });
            if(!empty($searchData['searchword']))
            {
                $result->where('girls.name','like','%'.$searchData['searchword'].'%');
            }
            if($searchData['status']!='')
            {
                $result->where('girls.status',$searchData['status']);
            }
            if($searchData['status']=='')
            {
                $result->where('girls.status','!=',9);
            }
            $girlsArray = $result->orderBy('girls.id', 'desc')->paginate($this->backendPageNum);
        }else{
            $girlsArray = Girls::select('girls.*','nation.nation','nation.flag')
                ->leftJoin('nation',function ($join){
                    $join->on('nation.id','=','girls.nation_id');
                })->where('girls.status','!=',9)
                ->orderBy('girls.id', 'desc')->paginate($this->backendPageNum);
        }
        $statusArray = array(
            '0' => '有空',
            '1' => '在上钟',
            '2' => '休息中',
            '3' => '下架',
            '9' => '已删除'
        );
        return view('backend.girllist', ['datas' => $girlsArray,'status' => $statusArray,'searchData' => $searchData])->with('admin', session('admin'));

    }

    public function girladd(Request $request){
        if($request->isMethod('post'))
        {
            $input=$request->all();
            unset($input['_token']);
            $result = Girls::create($input);
            if($result->id)
            {
                $reData['status'] = 1;
                $reData['msg'] = "添加成功";
            }else{
                $reData['status'] = 0;
                $reData['msg'] = "添加失败";
            }
            echo json_encode($reData);
        }else{
            $nationArray = Nation::select('id','nation')->orderBy('id','asc')->get()->toArray();
            return view('backend.girladd',['nations' => $nationArray]);
        }
    }

    public function girledit(Request $request,$id){
        if($request->isMethod('post'))
        {
            $input=$request->all();
            unset($input['_token']);
            $result = Girls::where('id',$id)->update($input);
            if ($result) {
                $reData['status'] = 1;
                $reData['msg'] = "修改成功";
            } else {
                $reData['status'] = 0;
                $reData['msg'] = "修改失败";
            }
            echo json_encode($reData);
        }else{
            $girlArray = Girls::find($id)->toArray();
//            $serviceString = $girlArray['service'];
//            $serviceArray = explode(PHP_EOL,trim($serviceString));
//            print_r($serviceArray);exit;

            $nationArray = Nation::select('id','nation')->orderBy('id','asc')->get()->toArray();
            return view('backend.girledit', ['girl' => $girlArray,'nations' => $nationArray]);
        }

    }

    public function girlphotolist($id)
    {
        $photos = Girlphotos::where('g_id',$id)->orderBy('id','asc')->get()->toArray();
        return view('backend.girlphotolist',['photos' => $photos]);
    }

    public function girlphotodelete($id){
        $result = Girlphotos::destroy($id);
        if ($result) {
            $data = array('status' => 1, 'msg' => "删除成功");
            return json_encode($data);
        } else {
            $data = array('status' => 0, 'msg' => "删除失败");
            return json_encode($data);
        }
    }

    public function delete($id)
    {
        $result = Girls::where('id',$id)->update(['status' => 9]);
        if ($result) {
            $data = array('status' => 1, 'msg' => "删除成功");
            return json_encode($data);
        } else {
            $data = array('status' => 0, 'msg' => "删除失败");
            return json_encode($data);
        }

    }









}
