<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8"/>
    <title>添加会员等级</title>
        <meta http-equiv="Cache-Control" content="no-transform" />
    <meta http-equiv="Cache-Control" content="no-siteapp" />
    <link rel="stylesheet" href="/Public/statics/bootstrap-3.3.5/css/bootstrap.min.css" />
    <link rel="stylesheet" href="/Public/statics/bootstrap-3.3.5/css/bootstrap-theme.min.css" />
    <link rel="stylesheet" href="/Public/statics/font-awesome-4.4.0/css/font-awesome.min.css" />
    <link rel="stylesheet" href="/tpl/Public/css/base.css" />
    <link href="/Public/statics/css/common.css" rel="stylesheet" type="text/css">
    <script src="/Public/statics/js/jquery-1.10.2.min.js"></script>
    <script src="/Public/statics/layer/layer.js"></script>
<script src="/Public/statics/layer/extend/layer.ext.js"></script>        
        <link rel="stylesheet" href="/Public/statics/iCheck-1.0.2/skins/all.css">
    <script src="/Public/statics/validate/jquery.validate.js"></script>    
<script src="/Public/statics/validate/jquery.validate.extend.js"></script>    
<script src="/Public/statics/validate/additional-methods.js"></script>    
<script src="/Public/statics/validate/messages_zh.js"></script>    
    <script src="/Public/statics/My97DatePicker/WdatePicker.js"></script>    
</head>
<body>

<div class="bjy-admin-nav">
    <i class="fa fa-home"></i> 首页
    &gt;
    会员管理
    &gt;
    添加会员等级
</div>
<ul id="myTab" class="nav nav-tabs">
    <li>
        <a href="<?php echo U('Admin/CardGrade/index');?>">会员等级</a>
    </li>
    <li class="active">
        <a href="javascript:;">添加会员等级</a>
    </li>
</ul>
<form class="form-inline" method="post" id="addPromotion">
    <table class="table table-striped table-bordered table-hover table-condensed">
        <tr>
            <th width="120">等级名称<span class="red">*</span></th>
            <td width="200">
                <input class="form-control required"  type="text" name="name" tip="请输入等级名称">
            </td>
            <th width="120">售卡金额<span class="red">*</span></th>
            <td>
                <input class="form-control digits"  type="text" name="cardprice" value="0">
            </td>
        </tr>
        <tr>
            <th width="120">等级属性<span class="red">*</span></th>
            <td>
                <input class="xb-icheck"  type="checkbox" name="integral" value="1">积分卡
            </td>
            <th width="120">积分兑换比例<span class="red">*</span></th>
            <td>
                <input class="form-control required number" type="text" name="integralvalue" style="width:150px;" readonly value="0">
                <span class="blue">消费</span><input class="form-control  digits" type="text" name="consume" style="width:150px;" value="0">
                <span class="blue">元</span><span class=" blue ">获得</span>
                <input class="form-control  digits" type="text" name="score" style="width:150px;"value="0"><span class=" blue ">积分</span>
                消费金额和获得积分必须输入大于0的整数
            </td>
        </tr>
        <tr>
            <th width="100"></th>
            <td>
                <input class="xb-icheck"  type="checkbox" name="discount" value="1">折扣卡
            </td>
            <th width="100">折扣比例<span class="red">*</span></th>
            <td>
                <input class="form-control number"  type="text" name="discountvalue" value="0">提示：输入0.9表示打九折（请输入大于0小于1的数值）
            </td>
        </tr>
        <tr>
            <td colspan="4" align="left">
                <input class="btn btn-success" type="button" value="添加" id="btAdd">
            </td>
        </tr>
    </table>
</form>
<script src="/Public/statics/iCheck-1.0.2/icheck.min.js"></script>
<script>
$(document).ready(function(){
    $('.xb-icheck').iCheck({
        checkboxClass: "icheckbox_minimal-blue",
        radioClass: "iradio_minimal-blue",
        increaseArea: "20%"
    });
});
</script>
<script type="text/javascript">
    $(document).ready(function(){
        //$(".unit").empty().html("充值")
        $("#addPromotion").validate();
        $("#btAdd").click(function() {
            // $("#addstore").validate();
            $("#addPromotion").submit();
        });
        $("input[name='consume']").blur(function(){
            if($(this).val()>0 && $("input[name='score']").val()>0){
                var integralvalue=Math.floor($("input[name='score']").val()/$(this).val());
                $("input[name='integralvalue']").val(integralvalue);
            }
        });
        $("input[name='score']").blur(function(){
            if($(this).val()>0 && $("input[name='consume']").val()>0){
                var integralvalue=Math.floor($(this).val()/$("input[name='consume']").val());
                $("input[name='integralvalue']").val(integralvalue);
            }
        });
    });
</script>
</body>
</html>