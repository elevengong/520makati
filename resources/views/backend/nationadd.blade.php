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

    <title>添加国家</title>
    <meta name="keywords" content="添加国家">
    <meta name="description" content="添加国家">
</head>
<body>
<script type="text/javascript" src="<?php echo asset( "/resources/views/backend/js/jquery.min.1.9.1.js") ?>"></script>
<script type="text/javascript" src="<?php echo asset( "/resources/views/backend/js/My97DatePicker/4.8/WdatePicker.js"); ?>"></script>
<script type="text/javascript" src="<?php echo asset( "/resources/views/backend/js/layer/layer.js") ?>"></script>

<script type="text/javascript" src="<?php echo asset( "/resources/views/backend/js/include/nation.js?ver=1.1"); ?>"></script>
<div id="frm_account" class="col-xs-12" style="text-align: center;">
    <form class="form form-horizontal" id="form1">
        {{csrf_field()}}
        <div class="col-xs-12 row cl">
            <label class="form-label col-xs-3 col-sm-3">国家：</label>
            <div class="col-xs-9 col-sm-9">
                <input type="text" class="input-text" value="" id="nation" name="nation" />
            </div>
        </div>

        <div class="col-xs-12 row cl">
            <label class="form-label col-xs-3 col-sm-3">国旗：</label>
            <div class="col-xs-9 col-sm-9">
                <input type="button" value="上传图片" onclick="photo1.click()" style="float:left;margin-top:10px;" class="btn_mouseout"/>
                <p><input type="file" id="photo1" name="photo1" onchange="upload(this);" style="display:none" /></p>
                <div id="show" style="float:left;padding-left:7px;">
                </div>
                <input type="hidden" id="flag" name="flag" value="">
            </div>
        </div>
        <div class="col-xs-12 row cl" style="text-align: center;">
            <div class="formControls col-xs-12 col-sm-12">
                <input type="button" onclick="nationaddprocess()" class="btn btn-primary" value="添加" id="btn_add_ok" />
            </div>
        </div>

    </form>
</div>

<script>

</script>



</body>
</html>
