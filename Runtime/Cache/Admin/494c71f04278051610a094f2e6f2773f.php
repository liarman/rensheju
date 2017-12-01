<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8"/>
    <title>编辑门店</title>
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
<script src="/Public/statics/validate/messages_zh.js"></script>    
</head>
<body>

<div class="bjy-admin-nav">
    <i class="fa fa-home"></i> 首页
    &gt;
    门店管理
    &gt;
    编辑门店
</div>
<ul id="myTab" class="nav nav-tabs">
    <li>
        <a href="<?php echo U('Admin/Store/index');?>">门店列表</a>
    </li>
    <li class="active">
        <a href="javascript:;">编辑门店</a>
    </li>
</ul>
<form class="form-inline" method="post" id="addstore">
    <input type="hidden" name="id" value="<?php echo ($store["id"]); ?>"/>
    <table class="table table-striped table-bordered table-hover table-condensed">
        <tr>
            <th width="200">门店名称<span class="red">*</span></th>
            <td>
                <input class="form-control required"  type="text" name="name" tip="请输入用户名" value="<?php echo ($store["name"]); ?>">
            </td>
        </tr>
        <tr>
            <th>联系人</th>
            <td>
                <input class="form-control required" type="text" name="contact" tip="请输入联系人" value="<?php echo ($store["contact"]); ?>">
            </td>
        </tr>
        <tr>
            <th>地址</th>
            <td>
                <input class="form-control" type="text" name="address" value="<?php echo ($store["address"]); ?>">
            </td>
        </tr>
        <tr>
            <th>联系电话</th>
            <td>
                <input class="form-control " type="text" name="phone" value="<?php echo ($store["phone"]); ?>">
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
        $("#addstore").validate();
        $("#btAdd").click(function() {
            // $("#addstore").validate();
            $("#addstore").submit();
        });
    });
</script>
</body>
</html>