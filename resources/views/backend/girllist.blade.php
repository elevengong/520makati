@extends("backend.layout.layout")
@section("content")
    <script type="text/javascript" src="<?php echo asset( "/resources/views/backend/js/include/girls.js?ver=1.0"); ?>"></script>
    <section class="Hui-article-box">
        <div class="Hui-article">
            <input type="hidden" id="hid_tid" value="0" />
            <article class="cl pd-20">
                <div class="text-c">
                    <form id="frm_admin" action="/backend/girls/girllist" method="post" >
                        {{csrf_field()}}
                        <input type="text" class="input-text" style="width:250px" placeholder="输入名字" id="seach_uname" name="searchword" value="{{isset($searchData['searchword'])?$searchData['searchword']:''}}">
                        <select name="status"  class="input-text" style="width:100px">
                            <option value="" @if(!isset($searchData['status']) or $searchData['status']=='')selected="selected"@endif>Available</option>
                            <option value="0" @if(isset($searchData['status']) and $searchData['status']=='0')selected="selected"@endif>有空</option>
                            <option value="1" @if(isset($searchData['status']) and $searchData['status']=='1')selected="selected"@endif>在上钟</option>
                            <option value="2" @if(isset($searchData['status']) and $searchData['status']=='2')selected="selected"@endif>休息</option>
                            <option value="3" @if(isset($searchData['status']) and $searchData['status']=='3')selected="selected"@endif>下架</option>
                            <option value="9" @if(isset($searchData['status']) and $searchData['status']=='9')selected="selected"@endif>已删除</option>
                        </select>
                        <button type="submit" class="btn btn-success radius" id="btn_seach" name="btn_seach">
                            <i class="Hui-iconfont">&#xe665;</i> 搜
                        </button>
                    </form>
                </div>

                <div class="cl pd-5 bg-1 bk-gray mt-20">
                <span class="l">
                    <a href="javascript:;" id="btn_add_category" class="btn btn-primary radius" onclick="opennewgirl();">
                        <i class="Hui-iconfont">&#xe600;</i> 添加贵妃
                    </a>
                </span>
                </div>

                <div class="mt-20">
                    <table class="table table-border table-bordered table-hover table-bg table-sort">
                        <thead>
                        <tr class="text-c">
                            <th width="20">ID</th>
                            <th width="50">名字</th>
                            <th width="60">封面</th>
                            <th width="50">国籍</th>
                            <th width="80">介绍</th>
                            <th width="80">服务</th>
                            <th width="80">视频地址</th>
                            <th width="50">浏览次数</th>
                            <th width="50">状态</th>
                            <th width="50">更新时间</th>
                            <th width="50">入库时间</th>
                            <th width="50">操作</th>
                        </tr>
                        </thead>
                        <tbody>

                        @foreach($datas as $data)
                            <tr class="text-c">
                                <td>{{$data['id']}}</td>
                                <td><a style="color: green;" href="/backend/girls/girlphotolist/{{$data['id']}}">{{$data['name']}}</a></td>
                                <td><a href="{{$data['cover']}}" target="_blank"><img src="{{$data['cover']}}" style="width:50px;" /></a></td>
                                <td>{{$data['nation']}} &nbsp;&nbsp;<img src="{{$data['flag']}}" style="width:20px;" /></td>
                                <td>{{$data['intro']}}</td>
                                <td>{{$data['service']}}</td>
                                <td>{{$data['videolist']}}</td>
                                <td>{{$data['views']}}</td>
                                <td>{{$status[$data['status']]}}</td>
                                <td>{{$data['updated_at']}}</td>
                                <td>{{$data['created_at']}}</td>
                                <td class="td-manage">
                                    <a title="编辑" href="javascript:girledit({{$data['id']}})" class="ml-5"
                                       style="text-decoration:none">
                                        <i class="Hui-iconfont">&#xe6df;</i>
                                    </a>
                                    @if($data['status']!=9)
                                    <a title="删除" href="javascript:girldel('{{$data['id']}}')" class="ml-5"
                                       style="text-decoration:none">
                                        <i class="Hui-iconfont">&#xe6e2;</i>
                                    </a>
                                        @endif
                                </td>
                            </tr>
                        @endforeach

                        </tbody>
                    </table>
                </div>

                <div class="ml-12" style="text-align: center;">
                    {{ $datas->links() }}
                </div>


            </article>
        </div>

        <hr />

    </section>
    <script>

    </script>



@endsection