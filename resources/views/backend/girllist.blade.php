@extends("backend.layout.layout")
@section("content")
    <script type="text/javascript" src="<?php echo asset( "/resources/views/backend/js/include/manhua.js?ver=1.0"); ?>"></script>
    <section class="Hui-article-box">
        <div class="Hui-article">
            <input type="hidden" id="hid_tid" value="0" />
            <article class="cl pd-20">
                <div class="text-c">
                    <form id="frm_admin" action="/backend/manhua/manhualist" method="post" >
                        {{csrf_field()}}
                        <input type="text" class="input-text" style="width:250px" placeholder="输入漫画" id="seach_uname" name="searchword" value="">
                        <button type="submit" class="btn btn-success radius" id="btn_seach" name="btn_seach">
                            <i class="Hui-iconfont">&#xe665;</i> 搜
                        </button>
                    </form>
                </div>

                <div class="cl pd-5 bg-1 bk-gray mt-20">
                <span class="l">
                    <a href="javascript:;" id="btn_add_category" class="btn btn-primary radius" onclick="opennewmanhua();">
                        <i class="Hui-iconfont">&#xe600;</i> 添加漫画
                    </a>
                </span>
                </div>

                <div class="mt-20">
                    <table class="table table-border table-bordered table-hover table-bg table-sort">
                        <thead>
                        <tr class="text-c">
                            <th width="80">ID</th>
                            <th width="100">名字</th>
                            <th width="100">封面</th>
                            <th width="100">国籍</th>
                            <th width="80">介绍</th>
                            <th width="70">服务</th>
                            <th width="70">观看数</th>
                            <th width="70">状态</th>
                            <th width="70">更新时间</th>
                            <th width="70">入库时间</th>
                            <th width="100">操作</th>
                        </tr>
                        </thead>
                        <tbody>

                        @foreach($datas as $data)
                            <tr class="text-c">
                                <td>{{$data['id']}}</td>
                                <td>{{$data['name']}}</td>
                                <td><img src="{{$data['cover']}}" style="width:50px;" /></td>
                                <td>{{$data['nation']}} &nbsp;&nbsp;<img src="{{$data['flag']}}" style="width:20px;" /></td>
                                <td>{{$data['intro']}}</td>
                                <td>{{$data['service']}}</td>
                                <td>{{$data['views']}}</td>
                                <td>{{$data['status']}}</td>
                                <td>{{$data['updated_time']}}</td>
                                <td>{{$data['created_at']}}</td>
                                <td class="td-manage">
                                    <a title="编辑" href="javascript:girledit({{$data['id']}})" class="ml-5"
                                       style="text-decoration:none">
                                        <i class="Hui-iconfont">&#xe6df;</i>

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