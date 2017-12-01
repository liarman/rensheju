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
    优惠活动
    &gt;
    优惠活动
</div>
<ul id="myTab" class="nav nav-tabs">
    <li class="active">
        <a href="javascript:void(0);">优惠活动</a>
    </li>
    <li>
        <a href="<?php echo U('Admin/Promotion/add');?>">添加优惠活动</a>
    </li>
</ul>
<div class="row">
</div>

<table class="table table-striped table-bordered table-hover table-condensed">
    <tr>
        <th>类型</th>
        <th>名称</th>
        <th>开始时间</th>
        <th>结束时间</th>
        <th>备注</th>
        <th>操作</th>
    </tr>
    <?php if(is_array($data['data'])): foreach($data['data'] as $key=>$v): ?><tr>
            <td>
                <?php switch($v['type']): case "0": ?>充值送金额<?php break;?>
                    <?php case "1": ?>充值送积分<?php break;?>
                    <?php case "2": ?>消费满就减金额<?php break;?>
                    <?php case "3": ?>消费满就送余额<?php break;?>
                    <?php case "4": ?>消费满送积分<?php break; endswitch;?>
            </td>
            <td><?php echo ($v['name']); ?></td>
            <td><?php echo (date('Y-m-d',$v['starttime'])); ?></td>
            <td><?php echo (date('Y-m-d',$v['endtime'])); ?></td>
            <td><?php echo ($v['remark']); ?></td>
            <td>
                <a href="<?php echo U('Admin/Promotion/edit',array('id'=>$v['id']));?>">修改</a>
                <a  href="javascript:if(confirm('确定删除？'))location='<?php echo U('Admin/Promotion/delete',array('id'=>$v['id']));?>'">删除</a>
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