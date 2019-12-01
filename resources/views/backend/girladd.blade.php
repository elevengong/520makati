<!DOCTYPE HTML>
<html>
<head>
    <meta charset="utf-8">
    <meta name="renderer" content="webkit|ie-comp|ie-stand">
    <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
    <meta name="viewport" content="width=device-width,initial-scale=1,minimum-scale=1.0,maximum-scale=1.0,user-scalable=no" />
    <meta http-equiv="Cache-Control" content="no-siteapp" />

    <link href="<?php echo asset( "/resources/views/backend/static/h-ui/css/H-ui.min.css") ?>" rel="stylesheet" type="text/css" />
    <link href="<?php echo asset( "/resources/views/backend/static/h-ui.admin/css/H-ui.login.css") ?>" rel="stylesheet" type="text/css" />
    <link href="<?php echo asset( "/resources/views/backend/static/h-ui.admin/css/style.css") ?>" rel="stylesheet" type="text/css" />
    <link href="<?php echo asset( "/resources/views/backend/static/Hui-iconfont/1.0.8/iconfont.css") ?>" rel="stylesheet" type="text/css" />

    <title>添加分类</title>
    <meta name="keywords" content="添加">
    <meta name="description" content="添加分类">
</head>
<body>
<script type="text/javascript" src="<?php echo asset( "/resources/views/backend/js/jquery.min.1.9.1.js") ?>"></script>
<script type="text/javascript" src="<?php echo asset( "/resources/views/backend/js/My97DatePicker/4.8/WdatePicker.js"); ?>"></script>
<script type="text/javascript" src="<?php echo asset( "/resources/views/backend/js/layer/layer.js") ?>"></script>

<script type="text/javascript" src="<?php echo asset( "/resources/views/backend/js/include/girls.js?ver=1.1"); ?>"></script>
<div id="frm_account" class="col-xs-12" style="text-align: center;">
    <form class="form form-horizontal" id="form1">
        {{csrf_field()}}
        <div class="col-xs-12 row cl">
            <label class="form-label col-xs-3 col-sm-3">名字：</label>
            <div class="col-xs-9 col-sm-9">
                <input type="text" class="input-text" value="" id="name" name="name" />
            </div>
        </div>

        <div class="col-xs-12 row cl">
            <label class="form-label col-xs-3 col-sm-3">封面：</label>
            <div class="col-xs-9 col-sm-9">
                <input type="button" value="上传图片" onclick="photo1.click()" style="float:left;margin-top:10px;" class="btn_mouseout"/>
                <p><input type="file" id="photo1" name="photo1" onchange="upload(this);" style="display:none" /></p>
                <div id="show" style="float:left;padding-left:7px;">
                </div>
                <input type="hidden" id="cover" name="cover" value="">
            </div>
        </div>

        <div class="col-xs-12 row cl">
            <label class="form-label col-xs-3 col-sm-3">国籍：</label>
            <div class="col-xs-9 col-sm-9">
                <select name="nation_id" style="float:left;" id="nation_id">
                    @foreach($nations as $nation)
                        <option value="{{$nation['id']}}">{{$nation['nation']}}</option>
                    @endforeach
                </select>
            </div>
        </div>

        <div class="col-xs-12 row cl">
            <label class="form-label col-xs-3 col-sm-3">介绍：</label>
            <div class="col-xs-9 col-sm-9">
                <textarea rows="10" cols="60" name="intro" id="intro" style="float: left;"></textarea>
            </div>
        </div>

        <div class="col-xs-12 row cl">
            <label class="form-label col-xs-3 col-sm-3">服务：</label>
            <div class="col-xs-9 col-sm-9">
                <textarea rows="10" cols="60" name="service" id="service" style="float: left;"></textarea>
            </div>
        </div>

        <div class="col-xs-12 row cl">
            <label class="form-label col-xs-3 col-sm-3">视频地址：</label>
            <div class="col-xs-9 col-sm-9">
                <textarea rows="10" cols="60" name="videolist" id="videolist" style="float: left;"></textarea>
            </div>
        </div>

        <div class="col-xs-12 row cl">
            <label class="form-label col-xs-3 col-sm-3">状态：</label>
            <div class="col-xs-9 col-sm-9">
                <select name="status" style="float:left;" id="status">
                    <option value="0" selected="selected">有空</option>
                    <option value="1">在上钟</option>
                    <option value="2">休息</option>
                    <option value="3">下架</option>
                </select>
            </div>
        </div>



        <div class="col-xs-12 row cl" style="text-align: center;">
            <div class="formControls col-xs-12 col-sm-12">
                <input type="button" onclick="girladdprocess()" class="btn btn-primary" value="添加" id="btn_add_ok" />
            </div>
        </div>

    </form>
</div>

<script>

</script>



</body>
</html>
