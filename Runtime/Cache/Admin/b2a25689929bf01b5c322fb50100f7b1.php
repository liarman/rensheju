<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8"/>
    <title>用户组添加用户 - bjyadmin</title>
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
    后台管理
    &gt;
    车主列表
</div>
<ul id="myTab" class="nav nav-tabs">
    <li class="active">
        <a href="javascript:void(0);">车主列表</a>
    </li>
</ul>
<div class="row">
    <form class="navbar-form navbar-left" role="search" action="" method="post">
        <div class="form-group">
            <input type="text" class="form-control" placeholder="" name="name"/>
        </div>
        <div class="form-group">
            <input type="text" class="form-control" placeholder="" name="title"/>
        </div>
        <button type="submit" class="btn btn-default">搜索</button>
    </form>
</div>

<table class="table table-striped table-bordered table-hover table-condensed">
    <tr>
        <th width="10%">用户名</th>
        <th>用户组</th>
        <th>操作</th>
    </tr>
    <?php if(is_array($data['data'])): foreach($data['data'] as $key=>$v): ?><tr>
            <td><?php echo ($v['nickname']); ?></td>
            <td><?php echo ($v['title']); ?></td>
            <td>
                <a href="<?php echo U('Admin/Rule/edit_admin',array('id'=>$v['uid']));?>">修改权限或密码</a>
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