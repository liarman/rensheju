<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html>
<html lang="zh-CN">
<head>
    <meta charset="UTF-8"/>
    <title>党建资讯列表</title>
    <meta name="viewport" content="width=device-width">
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no">
    <!-- head 中 -->
    <link rel="stylesheet" href="//cdn.bootcss.com/weui/1.1.1/style/weui.min.css">
    <link rel="stylesheet" href="//cdn.bootcss.com/jquery-weui/1.0.1/css/jquery-weui.min.css">
    <link rel="stylesheet" href="/Public/statics/css/mobile.css">
</head>
<body>
<header class="demos-header">
    <h1 class="demos-title"><?php echo ($catname); ?></h1>
</header>
<div class="weui-cells">
    <?php if(is_array($cats)): $i = 0; $__LIST__ = $cats;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$cat): $mod = ($i % 2 );++$i;?><a class="weui-cell weui-cell_access" href="<?php echo U('App/Index/village',array('id'=>$v['id']));?>">
        <div class="weui-cell__bd">
            <p><?php echo ($cat["name"]); ?></p>
        </div>
        <div class="weui-cell__ft">
        </div>
    </a><?php endforeach; endif; else: echo "" ;endif; ?>
</div>
<div class="weui-footer">
    <p class="weui-footer__text">Copyright © 启凡科技提供技术支持</p>
</div>

</body>
<!-- body 最后 -->
<script src="//cdn.bootcss.com/jquery/1.11.0/jquery.min.js"></script>
<script src="//cdn.bootcss.com/jquery-weui/1.0.1/js/jquery-weui.min.js"></script>
</html>