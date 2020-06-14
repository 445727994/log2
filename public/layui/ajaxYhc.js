function ajaxYhc(type,url,data,sfun,efun){
    var loading;
    layui.use('layer',function () {
        $.ajax({
            url:url,
            type:type,
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            },
            contentType:"application/x-www-form-urlencoded",
            data:data,
            async:true,
            dataType:'json',
            beforeSend: function(){
              loading=  layer.load(1);
            },
            success:function(result) {
                if(result.code==200){
                    if(sfun){
                        sfun(result);
                    }
                }else if(result.code==-200){
                    layer.msg('请先登录,3秒后自动跳转');
                    setTimeout('top.location.href="home/index";',3000);
                }else if(result.code==201){
                    layer.msg(result.msg);
                }else if(result.code==100){

                    layer.alert(result.msg, function () {
                        window.location.href=result.data;
                    });
                }else{
                    if(efun){
                        efun(result);
                    }
                }
            },complete:function(){
                layer.close(loading);
            },error:function(result){
                //layer.alert('请求失败，请重试');
                console.log("AJAX ERROR",result);
            }
        })
    });

}
