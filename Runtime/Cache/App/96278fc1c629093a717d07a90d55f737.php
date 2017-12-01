<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html>
<html>
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <title>信息绑定</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no">
    <meta name="apple-mobile-web-app-capable" content="yes">
    <meta name="apple-mobile-web-app-status-bar-style" content="black">

    <link rel="stylesheet" href="http://cdn.bootcss.com/bootstrap/3.3.2/css/bootstrap.min.css">

    <link rel="stylesheet" href="http://cdn.bootcss.com/bootstrap/3.3.2/css/bootstrap-theme.min.css">

    <script src="http://cdn.bootcss.com/jquery/1.11.2/jquery.min.js"></script>
    <script type="text/javascript" src="/Public/statics/jquery.cookie.js"></script>
    <script src="http://cdn.bootcss.com/bootstrap/3.3.2/js/bootstrap.min.js"></script>
    <meta content="authenticity_token" name="csrf-param">
    <meta content="zuyDL/lRX22RhwBFBoqRIYWCTJShLnrRjMebjfyDSrg=" name="csrf-token">

</head>
<body>
<br/>
<form method="post" action="" id="bindform">
    <input type="hidden" name="wecha_id" value="<?php echo ($wecha_id); ?>">
    <div class="panel panel-info"id="dibaoform">
        <div class="panel-heading">信息绑定</div>
        <input type="hidden" name="id" class="form-control"value="<?php echo ($user["id"]); ?>">
        <div class="panel-body">
            <div class="input-group">
                <span class="input-group-addon">秘钥</span>
                <input type="text" name="key" class="form-control"value="">
            </div>

        </div>
    </div>
</form>
<div class="alert alert-success" role="alert" style="display: none"></div>
<button type="button" class="btn btn-info" style="width:100%;" id="dibaosubmit">确定</button>
<script type="text/javascript">
    String.prototype.Trim = function () {
        var m = this.match(/^\s*(\S+(\s+\S+)*)\s*$/);
        return (m == null) ? "" : m[1];
    }
    String.prototype.isMobile = function () {
        return (/^(?:13\d|15[0123456789]||18[0123456789]|17[0123456789])-?\d{5}(\d{3}|\*{3})$/.test(this.Trim()));
    }
    String.prototype.isTel = function () {
        //"兼容格式: 国家代码(2到3位)-区号(2到3位)-电话号码(7到8位)-分机号(3位)"
        //return (/^(([0\+]\d{2,3}-)?(0\d{2,3})-)?(\d{7,8})(-(\d{3,}))?$/.test(this.Trim()));
        return (/^(([0\+]\d{2,3}-)?(0\d{2,3})-)(\d{7,8})(-(\d{3,}))?$/.test(this.Trim()));
    }
    $(document).ready(function () {
        var wecha_id="<?php echo ($wecha_id); ?>";
        $("#dibaosubmit").click(function () {
			//alert(1);
            var key=$("input[name='key']").val();
            if(key==""){
				alert("秘钥不能为空");
                return false;
            }
            $.post("<?php echo U('App/Bind/bind');?>", {key:$("input[name='key']").val(),wecha_id:$("input[name='wecha_id']").val()}, function(data){
                if(data.status==1){
					alert(data.message);
                }else {
                    alert(data.message);
                }
            });
        });
    });

</script>
</body>
</html>