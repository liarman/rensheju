<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8"/>
    <title>添加门店</title>
        <meta http-equiv="Cache-Control" content="no-transform" />
    <meta http-equiv="Cache-Control" content="no-siteapp" />
    <link rel="stylesheet" href="/Public/statics/bootstrap-3.3.5/css/bootstrap.min.css" />
    <link rel="stylesheet" href="/Public/statics/bootstrap-3.3.5/css/bootstrap-theme.min.css" />
    <link rel="stylesheet" href="/Public/statics/font-awesome-4.4.0/css/font-awesome.min.css" />
    <link rel="stylesheet" href="/tpl/Public/css/base.css" />
    <link href="/Public/statics/css/common.css" rel="stylesheet" type="text/css">
    <script src="/Public/statics/js/jquery-1.10.2.min.js"></script>
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
    优惠活动
    &gt;
    添加优惠活动
</div>
<ul id="myTab" class="nav nav-tabs">
    <li>
        <a href="<?php echo U('Admin/Promotion/index');?>">优惠活动</a>
    </li>
    <li class="active">
        <a href="javascript:;">添加优惠活动</a>
    </li>
</ul>
<form class="form-inline" method="post" id="addPromotion">
    <table class="table table-striped table-bordered table-hover table-condensed">
        <tr>
            <th width="200">活动名称<span class="red">*</span></th>
            <td>
                <input class="form-control required"  type="text" name="name" tip="请输入活动名称">
            </td>
        </tr>
        <tr>
            <th>类型</th>
            <td>
                <select class="form-control required" name="type" tip="请选择类型" id="type">
                    <option value="">请选择</option>
                    <option value="1">充值送金额</option>
                    <option value="2">充值送积分</option>
                    <option value="3">消费满就减金额</option>
                    <option value="4">消费满就送余额</option>
                    <option value="5">消费满送积分</option>
                </select>
            </td>
        </tr>
        <tr>
            <th>开始时间</th>
            <td>
                <input id="starttime" readonly class=" form-control required dateISO" type="text" name="starttime" tip="请选择开始时间" onClick="WdatePicker({dateFmt:'yyyy-MM-dd',maxDate:'#F<?php echo ($dp["$D('endtime')"]); ?>'})">
            </td>
        </tr>
        <tr>
            <th>结束时间</th>
            <td>
                <input id='endtime' readonly class=" form-control required dateISO" type="text" name="endtime" tip="请选择结束时间" onClick="WdatePicker({dateFmt:'yyyy-MM-dd',minDate:'#F<?php echo ($dp["$D('starttime')"]); ?>'})">
            </td>
        </tr>
        <tr>
            <th>优惠内容</th>
            <td>
                <span class="consume blue">充值</span><input class="form-control required digits" type="text" name="consume" style="width:150px;"><span class="blue">元</span><span class="promote blue red ">送</span>
                <input class="form-control required digits" type="text" name="promote" style="width:150px;"><span class="blue unit">元</span>
            </td>
        </tr>
        <tr>
            <th width="200">备注</th>
            <td>
                <input class="form-control"  type="text" name="remark">
            </td>
        </tr>
        <tr>
            <th></th>
            <td>
                <input class="btn btn-success" type="button" value="添加" id="btAdd">
            </td>
        </tr>
    </table>
</form>
<script type="text/javascript">
    $(document).ready(function(){
        //$(".unit").empty().html("充值")
        $("#addPromotion").validate();
        $("#btAdd").click(function() {
            // $("#addstore").validate();
            $("#addPromotion").submit();
        });
        $("#type").change(function(){
            if($(this).val()==1){
                $(".consume").empty().html("充值");
                $(".promote").empty().html("送");
                $(".unit").empty().html("元");
            }else if($(this).val()==2){
                $(".consume").empty().html("充值");
                $(".promote").empty().html("送");
                $(".unit").empty().html("积分");
            }else if($(this).val()==3){
                $(".consume").empty().html("消费满");
                $(".promote").empty().html("减");
                $(".unit").empty().html("金额");
            }else if($(this).val()==4){
                $(".consume").empty().html("消费满");
                $(".promote").empty().html("送");
                $(".unit").empty().html("余额");
            }else if($(this).val()==5){
                $(".consume").empty().html("消费满");
                $(".promote").empty().html("送");
                $(".unit").empty().html("积分");
            }else{
                $(".consume").empty().html("充值");
                $(".promote").empty().html("送");
                $(".unit").empty().html("元");
            }
        });
    });
</script>
</body>
</html>