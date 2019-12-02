function opennewgirl() {
    var index = layer.open({
        type: 2,
        title: "添加贵妃",
        closeBtn: 0,
        area: ['700px', '750px'], //宽高
        shadeClose: true,
        resize:false,
        content: '/backend/girls/girladd/'
    });
}

function girladdprocess() {
    var name  = $.trim( $('#name').val() );
    var cover = $.trim( $('#cover').val() );
    var nation_id  = $.trim( $('#nation_id').val() );
    var intro  = $.trim( $('#intro').val() );
    var service  = $.trim( $('#service').val() );
    var videolist  = $.trim( $('#videolist').val() );
    var status  = $.trim( $('#status').val() );

    if(name == '')
    {
        layer.msg('名字不能为空');
        return false;
    }
    if(cover == '')
    {
        layer.msg('封面不能为空');
        return false;
    }
    if(nation_id == '')
    {
        layer.msg('国籍不能为空');
        return false;
    }
    if(intro == '')
    {
        layer.msg('贵妃介绍不能为空');
        return false;
    }
    if(status == '')
    {
        layer.msg('状态不能为空');
        return false;
    }

    $.ajax({
        type:"post",
        url:"/backend/girls/girladd",
        dataType:'json',
        headers:{'X-CSRF-TOKEN':$('input[name="_token"]').val()},
        data:$("#form1").serialize(),
        success:function(data){
            if(data.status == 0)
            {
                layer.msg( data.msg );
            }else{
                layer.msg( data.msg ,function () {
                    window.parent.location.reload();
                    window.location.close();
                });
            }
        },
        error:function (data) {
            layer.msg(data.msg);
        }
    });


}

function girledit(id) {
    var index = layer.open({
        type: 2,
        title: "修改贵妃",
        closeBtn: 0,
        area: ['700px', '750px'], //宽高
        shadeClose: true,
        resize:false,
        content: '/backend/girls/girledit/'+id
    });
}

function girleditprocess(id) {
    var name  = $.trim( $('#name').val() );
    var cover = $.trim( $('#cover').val() );
    var nation_id  = $.trim( $('#nation_id').val() );
    var intro  = $.trim( $('#intro').val() );
    var service  = $.trim( $('#service').val() );
    var videolist  = $.trim( $('#videolist').val() );
    var status  = $.trim( $('#status').val() );

    if(name == '')
    {
        layer.msg('名字不能为空');
        return false;
    }
    if(cover == '')
    {
        layer.msg('封面不能为空');
        return false;
    }
    if(nation_id == '')
    {
        layer.msg('国籍不能为空');
        return false;
    }
    if(intro == '')
    {
        layer.msg('贵妃介绍不能为空');
        return false;
    }
    if(status == '')
    {
        layer.msg('状态不能为空');
        return false;
    }

    $.ajax({
        type:"post",
        url:"/backend/girls/girledit/"+id,
        dataType:'json',
        headers:{'X-CSRF-TOKEN':$('input[name="_token"]').val()},
        data:$("#form1").serialize(),
        success:function(data){
            if(data.status == 0)
            {
                layer.msg( data.msg );
            }else{
                layer.msg( data.msg ,function () {
                    window.parent.location.reload();
                    window.location.close();
                });
            }
        },
        error:function (data) {
            layer.msg(data.msg);
        }
    });


}

function girldel(id){
    layer.confirm("是否真的删除该妹子？", function() {
        $.ajax({
            type: "delete",
            url: "/backend/girls/delete/" + id,
            dataType: 'json',
            headers: {'X-CSRF-TOKEN': $('input[name="_token"]').val()},
            success: function (data) {
                if (data.status == 0) {
                    layer.msg(data.msg);

                } else {
                    layer.msg( data.msg ,function () {
                        window.location.reload();
                    });
                }
                return false;
            },
            error: function (data) {
                layer.msg(data.msg);
                return false;
            }
        });
    });
}


function upload(obj){
    var id = $(obj).attr("id");
    var animateimg = $(obj).val();//获取上传的图片名 带//
    var imgarr=animateimg.split('\\'); //分割
    var myimg=imgarr[imgarr.length-1]; //去掉 // 获取图片名
    var houzui = myimg.lastIndexOf('.'); //获取 . 出现的位置
    var ext = myimg.substring(houzui, myimg.length).toUpperCase();  //切割 . 获取文件后缀

    var file = $(obj).get(0).files[0]; //获取上传的文件
    var fileSize = file.size;           //获取上传的文件大小
    var maxSize = 1048576;              //最大1MB
    if(ext !='.PNG' && ext !='.GIF' && ext !='.JPG' && ext !='.JPEG' && ext !='.BMP'){
        layer.msg('文件类型错误,请上传图片类型');
        return false;
    }else if(parseInt(fileSize) >= parseInt(maxSize)){
        layer.msg('上传的文件不能超过1MB');
        return false;
    }else{
        var data = new FormData($('#form1')[0]);

        $.ajax({
            headers:{'X-CSRF-TOKEN':$('input[name="_token"]').val()},
            url: "/backend/uploadphoto/"+id,
            type: 'POST',
            data: data,
            //data:{'data':data, 'id':id},
            dataType: 'JSON',
            cache: false,
            processData: false,
            contentType: false,
            success:function(data){
                if(data.status == 0)
                {
                    layer.msg( data.msg );

                }else{
                    //window.location.reload();
                    var result = '<img id="img" src="'+data.pic+'" width="80">';
                    $('#show').html(result);
                    $('#cover').val(data.pic);

                }

            },
            error:function (data) {
                layer.msg(data.msg);

            }
        });
        return false;
    }
}

function girlphotodel(id) {
    layer.confirm("是否真的删除该妹子？", function() {
        $.ajax({
            type: "delete",
            url: "/backend/girls/girlphotodelete/" + id,
            dataType: 'json',
            headers: {'X-CSRF-TOKEN': $('input[name="_token"]').val()},
            success: function (data) {
                if (data.status == 0) {
                    layer.msg(data.msg);

                } else {
                    layer.msg( data.msg ,function () {
                        window.location.reload();
                    });
                }
                return false;
            },
            error: function (data) {
                layer.msg(data.msg);
                return false;
            }
        });
    });
}

function opennewgirlphoto(id) {
    var index = layer.open({
        type: 2,
        title: "添加图片",
        closeBtn: 0,
        area: ['700px', '500px'], //宽高
        shadeClose: true,
        resize:false,
        content: '/backend/girls/girlphotoadd/'+ id
    });
}

function girlphotoaddprocess() {
    var g_id  = $.trim( $('#g_id').val() );
    var photo = $.trim( $('#photo').val() );

    if(g_id == '')
    {
        layer.msg('没有ID，出错');
        return false;
    }
    if(photo == '')
    {
        layer.msg('图片不能为空');
        return false;
    }

    $.ajax({
        type:"post",
        url:"/backend/girls/girlphotoadd/"+ g_id,
        dataType:'json',
        headers:{'X-CSRF-TOKEN':$('input[name="_token"]').val()},
        data:$("#form1").serialize(),
        success:function(data){
            if(data.status == 0)
            {
                layer.msg( data.msg );
            }else{
                layer.msg( data.msg ,function () {
                    window.parent.location.reload();
                    window.location.close();
                });
            }
        },
        error:function (data) {
            layer.msg(data.msg);
        }
    });


}


function uploadphoto(obj){
    var id = $(obj).attr("id");
    var animateimg = $(obj).val();//获取上传的图片名 带//
    var imgarr=animateimg.split('\\'); //分割
    var myimg=imgarr[imgarr.length-1]; //去掉 // 获取图片名
    var houzui = myimg.lastIndexOf('.'); //获取 . 出现的位置
    var ext = myimg.substring(houzui, myimg.length).toUpperCase();  //切割 . 获取文件后缀

    var file = $(obj).get(0).files[0]; //获取上传的文件
    var fileSize = file.size;           //获取上传的文件大小
    var maxSize = 1048576;              //最大1MB
    if(ext !='.PNG' && ext !='.GIF' && ext !='.JPG' && ext !='.JPEG' && ext !='.BMP'){
        layer.msg('文件类型错误,请上传图片类型');
        return false;
    }else if(parseInt(fileSize) >= parseInt(maxSize)){
        layer.msg('上传的文件不能超过1MB');
        return false;
    }else{
        var data = new FormData($('#form1')[0]);

        $.ajax({
            headers:{'X-CSRF-TOKEN':$('input[name="_token"]').val()},
            url: "/backend/uploadphoto/"+id,
            type: 'POST',
            data: data,
            //data:{'data':data, 'id':id},
            dataType: 'JSON',
            cache: false,
            processData: false,
            contentType: false,
            success:function(data){
                if(data.status == 0)
                {
                    layer.msg( data.msg );

                }else{
                    //window.location.reload();
                    var result = '<img id="img" src="'+data.pic+'" width="300">';
                    $('#show').html(result);
                    $('#photo').val(data.pic);

                }

            },
            error:function (data) {
                layer.msg(data.msg);

            }
        });
        return false;
    }
}