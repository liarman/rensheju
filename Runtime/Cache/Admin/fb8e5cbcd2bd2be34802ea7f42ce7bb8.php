<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8"/>
    <title>修改管理员 - bjyadmin</title>
        <meta http-equiv="Cache-Control" content="no-transform" />
    <meta http-equiv="Cache-Control" content="no-siteapp" />
    <link rel="stylesheet" href="/Public/statics/bootstrap-3.3.5/css/bootstrap.min.css" />
    <link rel="stylesheet" href="/Public/statics/bootstrap-3.3.5/css/bootstrap-theme.min.css" />
    <link rel="stylesheet" href="/Public/statics/font-awesome-4.4.0/css/font-awesome.min.css" />
    <link rel="stylesheet" href="/tpl/Public/css/base.css" />
        <link rel="stylesheet" href="/Public/statics/iCheck-1.0.2/skins/all.css">
</head>
<body>

<!-- 导航栏开始 -->
<div class="bjy-admin-nav">
    <i class="fa fa-home"></i> 首页
    &gt;
    后台管理
    &gt;
    修改管理员
</div>
<!-- 导航栏结束 -->
<ul id="myTab" class="nav nav-tabs">
   <li>
         <a href="<?php echo U('Admin/Rule/admin_user_list');?>">管理员列表</a>
   </li>
   <li class="active">
        <a href="<?php echo U('Admin/Rule/add_admin');?>">修改管理员</a>
    </li>
</ul>
<form class="form-inline" method="post">
    <input type="hidden" name="id" value="<?php echo ($user_data['id']); ?>">
    <table class="table table-striped table-bordered table-hover table-condensed">
        <tr>
            <th>管理组</th>
            <td>
                <?php if(is_array($data)): foreach($data as $key=>$v): echo ($v['title']); ?>
                    <input class="xb-icheck" type="checkbox" name="group_ids[]" value="<?php echo ($v['id']); ?>" <?php if(in_array(($v['id']), is_array($group_data)?$group_data:explode(',',$group_data))): ?>checked="checked"<?php endif; ?> >
                    &emsp;<?php endforeach; endif; ?>
            </td>
        </tr>
        <tr>
            <th>姓名</th>
            <td>
                <input class="form-control" type="text" name="username" value="<?php echo ($user_data['username']); ?>">
            </td>
        </tr>
        <tr>
            <th>手机号</th>
            <td>
                <input class="form-control" type="text" name="phone" value="<?php echo ($user_data['phone']); ?>">
            </td>
        </tr>
        <tr>
            <th>邮箱</th>
            <td>
                <input class="form-control" type="text" name="email" value="<?php echo ($user_data['email']); ?>">
            </td>
        </tr>
        <tr>
            <th>初始密码</th>
            <td>
                <input class="form-control" type="text" name="password">如不改密码；留空即可
            </td>
        </tr>
        <tr>
            <th>状态</th>
            <td>
                <span class="inputword">允许登录</span>
                <input class="xb-icheck" type="radio" name="status" value="1" <?php if(($user_data['status']) == "1"): ?>checked="checked"<?php endif; ?> >
                &emsp;
                <span class="inputword">禁止登录</span>
                <input class="xb-icheck" type="radio" name="status" value="0" <?php if(($user_data['status']) == "0"): ?>checked="checked"<?php endif; ?> >
            </td>
        </tr>
        <tr>
            <th></th>
            <td>
                <input class="btn btn-success" type="submit" value="修改">
            </td>
        </tr>
    </table>
</form>
<!-- 引入bootstrjs部分开始 -->
<script src="/Public/statics/js/jquery-1.10.2.min.js"></script>
<script src="/Public/statics/bootstrap-3.3.5/js/bootstrap.min.js"></script>
<script src="/tpl/Public/js/base.js"></script>
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
</body>
</html>