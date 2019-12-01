<?php

namespace App\Http\Controllers\backend;

use App\Model\Nation;
use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\MyController;

class NationController extends MyController
{

    public function nationlist(Request $request){
        if($request->isMethod('post')){

        }else{

            $nationArray = Nation::orderBy('id', 'asc')->paginate($this->backendPageNum);
            return view('backend.nationlist', ['datas' => $nationArray])->with('admin', session('admin'));
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
