function opennewmanhua() {
    var index = layer.open({
        type: 2,
        title: "添加漫画",
        closeBtn: 0,
        area: ['700px', '500px'], //宽高
        shadeClose: true,
        resize:false,
        content: '/backend/manhua/addmanhua/'
    });
}

function addmanhuaprocess() {
    var name  = $.trim( $('#name').val() );
    var cid = $.trim( $('#cid').val() );
    var cover  = $.trim( $('#cover').val() );
    var finish  = $.trim( $('#finish').val() );

    if(name == '')
    {
        layer.msg('漫画标题不能为空');
        return false;
    }
    if(cid == '')
    {
        layer.msg('分类不能为空');
        return false;
    }
    if(cover == '')
    {
        layer.msg('图片不能为空');
        return false;
    }

    $.ajax({
        type:"post",
        url:"/backend/manhua/addmanhua",
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

function editmanhuaprocess(manhua_id) {
    var name  = $.trim( $('#name').val() );
    var cid = $.trim( $('#cid').val() );
    var cover  = $.trim( $('#cover').val() );
    var finish  = $.trim( $('#finish').val() );

    if(name == '')
    {
        layer.msg('漫画标题不能为空');
        return false;
    }
    if(cid == '')
    {
        layer.msg('分类不能为空');
        return false;
    }
    if(cover == '')
    {
        layer.msg('图片不能为空');
        return false;
    }

    $.ajax({
        type:"post",
        url:"/backend/manhua/editmanhua/"+manhua_id,
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

function editmanhua(manhua_id) {
    var index = layer.open({
        type: 2,
        title: "修改漫画",
        closeBtn: 0,
        area: ['700px', '600px'], //宽高
        shadeClose: true,
        resize:false,
        content: '/backend/manhua/editmanhua/'+manhua_id
    });
}