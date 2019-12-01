<?php

namespace App\Http\Controllers\frontend;

use App\Model\Girls;


use Illuminate\Http\Request;
use App\Http\Controllers\MyController;
use App\Http\Requests;
use Crypt;


class IndexController extends MyController
{
    public function index(Request $request){

        $girlsArray = Girls::select('girls.*','girlphotos.photo')
            ->leftJoin('girlphotos',function ($join){
                $join->on('girlphotos.g_id','=','girls.id');
            })->orderBy('girls.id', 'desc')->paginate($this->backendPageNum);

        return view('frontend.index',['datas' => $girlsArray]);
    }



}
