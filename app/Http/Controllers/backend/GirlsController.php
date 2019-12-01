<?php

namespace App\Http\Controllers\backend;

use App\Model\Girls;
use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\MyController;

class GirlsController extends MyController
{

    public function girllist(Request $request){
        if($request->isMethod('post')){

        }else{
            $girlsArray = Girls::select('girls.*','nation.nation','nation.flag')
                ->leftJoin('nation',function ($join){
                    $join->on('nation.id','=','girls.nation_id');
                })->orderBy('girls.id', 'desc')->paginate($this->backendPageNum);
            print_r($girlsArray);
            return view('backend.girllist', ['datas' => $girlsArray])->with('admin', session('admin'));
        }
    }






    public function nationadd(Request $request){
        if($request->isMethod('post'))
        {
            $input=$request->all();
            unset($input['_token']);
            $result = Nation::create($input);
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
            return view('backend.nationadd');
        }
    }

    public function delete($id)
    {

        $result = Nation::destroy($id);
        if ($result) {
            $data = array('status' => 1, 'msg' => "删除成功");
            return json_encode($data);
        } else {
            $data = array('status' => 0, 'msg' => "删除失败");
            return json_encode($data);
        }

    }

    public function nationedit(Request $request,$id){
        if($request->isMethod('post'))
        {
            $input=$request->all();
            unset($input['_token']);
            $result = Nation::where('id',$id)->update($input);
            if ($result) {
                $reData['status'] = 1;
                $reData['msg'] = "修改成功";
            } else {
                $reData['status'] = 0;
                $reData['msg'] = "修改失败";
            }
            echo json_encode($reData);
        }else{
            $Nation = Nation::find($id)->toArray();
            return view('backend.nationedit', compact('Nation'));
        }

    }







}
