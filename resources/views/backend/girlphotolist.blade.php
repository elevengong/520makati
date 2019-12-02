@extends("backend.layout.layout")
@section("content")
    <script type="text/javascript" src="<?php echo asset( "/resources/views/backend/js/include/girls.js?ver=1.0"); ?>"></script>
    <section class="Hui-article-box">
        <div class="Hui-article">
            <input type="hidden" id="hid_tid" value="0" />
            <article class="cl pd-20">


                <div class="cl pd-5 bg-1 bk-gray mt-20">
                <span class="l">
                    <a href="javascript:history.go(-1)" id="btn_add_category" class="btn btn-primary radius">
                         返回上一页
                    </a>
                </span>
                    <span class="l" style="margin-left: 30px;">
                    <a href="javascript:;" id="btn_add_category" class="btn btn-primary radius" onclick="opennewgirlphoto({{$id}});">
                        <i class="Hui-iconfont">&#xe600;</i> 添加图片
                    </a>
                </span>
                </div>

                <div class="mt-20">
                    <table class="table table-border table-bordered table-hover table-bg table-sort">
                        <thead>
                        <tr class="text-c">
                            <th width="20">ID</th>
                            <th width="200">图片</th>
                            <th width="20">操作</th>
                        </tr>
                        </thead>
                        <tbody>
                        @foreach($photos as $photo)
                        <tr class="text-c">
                            <th>{{$photo['id']}}</th>
                            <th><a href="{{$photo['photo']}}" target="_blank"><img src="{{$photo['photo']}}" style="width:100px;" /></a></th>
                            <th>
                                <a title="删除" href="javascript:girlphotodel('{{$photo['id']}}')" class="ml-5"
                                   style="text-decoration:none">
                                    删除
                                </a>
                            </th>
                        </tr>
                        @endforeach

                        </tbody>
                    </table>
                </div>



            </article>
        </div>

        <hr />

    </section>
    <script>

    </script>



@endsection