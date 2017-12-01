<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8"/>
    <title>门店列表</title>
        <meta http-equiv="Cache-Control" content="no-transform" />
    <meta http-equiv="Cache-Control" content="no-siteapp" />
    <link rel="stylesheet" href="/Public/statics/bootstrap-3.3.5/css/bootstrap.min.css" />
    <link rel="stylesheet" href="/Public/statics/bootstrap-3.3.5/css/bootstrap-theme.min.css" />
    <link rel="stylesheet" href="/Public/statics/font-awesome-4.4.0/css/font-awesome.min.css" />
    <link rel="stylesheet" href="/tpl/Public/css/base.css" />
    <link rel="stylesheet" href="/Public/statics/css/mobile.css">
</head>
<body>
<div class="bjy-admin-nav">
    <i class="fa fa-home"></i> 首页
    &gt;
    门店管理
    &gt;
    门店列表
</div>
<ul id="myTab" class="nav nav-tabs">
    <li class="active">
        <a href="javascript:void(0);">门店列表</a>
    </li>
    <li>
        <a href="<?php echo U('Admin/Store/add');?>">添加门店</a>
    </li>
</ul>
<div class="row">
</div>

<table class="table table-striped table-bordered table-hover table-condensed">
    <tr>
        <th>分店名称</th>
        <th>联系人</th>
        <th>地址</th>
        <th>联系电话</th>
        <th>操作</th>
    </tr>
    <?php if(is_array($data)): foreach($data as $key=>$v): ?><tr>
            <td><?php echo ($v['name']); ?></td>
            <td><?php echo ($v['contact']); ?></td>
            <td><?php echo ($v['address']); ?></td>
            <td><?php echo ($v['phone']); ?></td>
            <td>
                <a href="<?php echo U('Admin/Store/edit',array('id'=>$v['id']));?>">修改</a>
                <a  href="javascript:if(confirm('确定删除？'))location='<?php echo U('Admin/Store/delete',array('id'=>$v['id']));?>'">删除</a>
            </td>
        </tr><?php endforeach; endif; ?>
</table>
 <?php echo ($data['page']); ?>

<!-- 引入bootstrjs部分开始 -->
<script src="/Public/statics/js/jquery-1.10.2.min.js"></script>
<script src="/Public/statics/bootstrap-3.3.5/js/bootstrap.min.js"></script>
<script src="/tpl/Public/js/base.js"></script>
</body>
</html>